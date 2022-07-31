<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\KriteriaM;
use App\Models\Nilai_gapM;
use App\Models\PemainM;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Nilai_gap extends BaseController
{
    protected $nilai_gapm;
    function __construct()
    {
        $this->nilai_gapm = new Nilai_gapM();
        $this->aspekm = new AspekM();
        $this->kriteriam = new KriteriaM();
        $this->pemainm = new PemainM();
    }
    public function index()
    {
        $this->data = array('title' => 'GAP Seslisih | Admin', 'breadcome' => 'Nilai gap', 'url' => 'nilai_gap/', 'm_nilai_gap' => 'active', 'session' => $this->session, 'aspek' => $this->aspekm->findAll());

        echo view('App\Views\nilai_gap\nilai_gap_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->nilai_gapm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_aspek'] = $rows->id_aspek;
            $row['id_kriteria'] = $rows->id_kriteria;
            $row['id_pemain'] = $rows->id_pemain;
            $row['id_manager'] = $rows->id_manager;
            $row['nilai_kriteria'] = $rows->nilai_kriteria;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->nilai_gapm->total(),
            "totalNotFiltered" => $this->nilai_gapm->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function create()
    {
        $this->data = array('action' => 'insert', 'btn' => '<i class="fas fa-save"></i> Save');
        $num_of_row = $this->request->getPost('num_of_row');
        for ($x = 1; $x <= $num_of_row; $x++) {
            $data['nama'] = 'Data ' . $x;
            $this->data['form_input'][] = view('App\Views\nilai_gap\form_input', $data);
        }
        $status['html']         = view('App\Views\nilai_gap\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Nilai_gap';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->nilai_gapm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\nilai_gap\form_input', $data);
        }
        $status['html']         = view('App\Views\nilai_gap\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Nilai_gap';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('nama');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'id_aspek' => $this->request->getPost('id_aspek')[$key],
                        'id_kriteria' => $this->request->getPost('id_kriteria')[$key],
                        'id_pemain' => $this->request->getPost('id_pemain')[$key],
                        'id_manager' => $this->request->getPost('id_manager')[$key],
                        'nilai_kriteria' => $this->request->getPost('nilai_kriteria')[$key],
                    ));
                }
                if ($this->nilai_gapm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Nilai_gap Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->nilai_gapm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'id_aspek' => $this->request->getPost('id_aspek')[$key],
                        'id_kriteria' => $this->request->getPost('id_kriteria')[$key],
                        'id_pemain' => $this->request->getPost('id_pemain')[$key],
                        'id_manager' => $this->request->getPost('id_manager')[$key],
                        'nilai_kriteria' => $this->request->getPost('nilai_kriteria')[$key],
                    ));
                }
                if ($this->nilai_gapm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Nilai_gap Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->nilai_gapm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->nilai_gapm->delete($this->request->getPost('id'))) {
                    $status['type'] = 'success';
                    $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                }
                echo json_encode($status);
                break;
        }
    }

    public function dataGap()
    {
        $aspek = $this->request->getVar('value');
        $kriteria = $this->kriteriam->where('id_aspek', $aspek)->findAll();
        $pemain = $this->pemainm->findAll();
        $data = [
            'kriteria'  => $kriteria,
            'pemain'    => $pemain,
            'aspek'     => $aspek
        ];
        $html = view('App\Views\nilai_gap\data-gap', $data);
        return json_encode(['nilai' => $html]);
    }

    public function simpanGap()
    {
        $pemain = $this->pemainm->findAll();
        $data = $this->request->getVar('data');
        $id_aspek = $this->request->getVar('id_aspek');
        $kriteria = $this->kriteriam->where('id_aspek', $id_aspek)->findAll();
        $exp = explode('&', $data);
        $nilai = count($exp) / count($pemain); // 3
        $nilai2 = count($exp) / count($kriteria); // 12
        $hasil = [];
        foreach ($exp as $key => $row) {
            $key++;
            $row = explode('=', $row);
            $val[] = end($row);

            array_push($hasil, [
                'id_aspek' => $id_aspek,
                'id_kriteria' => $kriteria[ceil($key / $nilai2) - 1]->id,
                'id_pemain' => $pemain[ceil($key / $nilai) - 1]->id,
                'id_manager' => session('user_id'),
                'nilai_kriteria' => end($row)
            ]);
        }

        if ($this->nilai_gapm->insertBatch($hasil)) {
            $status['title'] = 'success';
            $status['type'] = 'success';
            $status['text'] = '<strong>Done..!</strong>Berhasil ditambahkan';
        } else {
            $status['title'] = 'gagal';
            $status['type'] = 'error';
            $status['text'] = '<strong>Oh snap!</strong> Proses gagal.';
        }
        return json_encode($status);
    }
}

/* End of file Nilai_gap.php */
/* Location: ./app/controllers/Nilai_gap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 10:19:59 */
/* http://harviacode.com */