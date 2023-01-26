<?php

namespace App\Controllers;

use App\Models\RecycleM;

class Recycle extends BaseController
{
    protected $recyclem, $data, $session;
    function __construct()
    {
        $this->recyclem = new RecycleM();
    }
    public function index()
    {
        $this->data = array('title' => 'Recycle | Admin', 'breadcome' => 'Recycle', 'url' => 'recycle/', 'm_recycle' => 'active', 'session' => $this->session);

        echo view('App\Views\recycle\nilai_gap_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->recyclem->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_aspek'] = $rows->aspek_penilaian;
            $row['id_kriteria'] = $rows->kriteria_penilaian;
            $row['id_posisi'] = $rows->nama_posisi;
            $row['id_pemain'] = $rows->nama;
            $row['nilai_kriteria'] = $rows->nilai_kriteria;
            $row['tgl'] = $rows->deleted_at;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->recyclem->total(),
            "totalNotFiltered" => $this->recyclem->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\recycle\form_input', $data);
        }
        $status['html']         = view('App\Views\recycle\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Recycle';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->recyclem->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\recycle\form_input', $data);
        }
        $status['html']         = view('App\Views\recycle\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Recycle';
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
                        'id_posisi' => $this->request->getPost('id_posisi')[$key],
                        'id_pemain' => $this->request->getPost('id_pemain')[$key],
                        'id_pelatih' => $this->request->getPost('id_pelatih')[$key],
                        'nilai_kriteria' => $this->request->getPost('nilai_kriteria')[$key],
                    ));
                }
                if ($this->recyclem->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Recycle Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->recyclem->errors();
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
                        'id_posisi' => $this->request->getPost('id_posisi')[$key],
                        'id_pemain' => $this->request->getPost('id_pemain')[$key],
                        'id_pelatih' => $this->request->getPost('id_pelatih')[$key],
                        'nilai_kriteria' => $this->request->getPost('nilai_kriteria')[$key],
                    ));
                }
                if ($this->recyclem->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Recycle Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->recyclem->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->recyclem->delete($this->request->getPost('id'))) {
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
}

/* End of file Recycle.php */
/* Location: ./app/controllers/Recycle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-26 05:41:40 */
/* http://harviacode.com */