<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\KriteriaM;
use App\Models\Nilai_bobotM;
use App\Models\PemainM;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Nilai_bobot extends BaseController
{
    protected $nilai_bobotm;
    function __construct()
    {
        $this->nilai_bobotm = new Nilai_bobotM();
        $this->aspekm = new AspekM();
        $this->kriteriam = new KriteriaM();
        $this->pemainm = new PemainM();
    }
    public function index()
    {
        $this->data = array('title' => 'Nilai Bobot | Admin', 'breadcome' => 'Nilai bobot', 'url' => 'nilai_bobot/', 'm_nilai_bobot' => 'active', 'session' => $this->session, 'aspek' => $this->aspekm->findAll());

        echo view('App\Views\nilai_bobot\nilai_bobot_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->nilai_bobotm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['selisih'] = $rows->selisih;
            $row['bobot_nilai'] = $rows->bobot_nilai;
            $row['ket'] = $rows->ket;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->nilai_bobotm->total(),
            "totalNotFiltered" => $this->nilai_bobotm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\nilai_bobot\form_input', $data);
        }
        $status['html']         = view('App\Views\nilai_bobot\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Nilai Bobot';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->nilai_bobotm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->selisih . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\nilai_bobot\form_input', $data);
        }
        $status['html']         = view('App\Views\nilai_bobot\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Nilai Bobot';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    array_push($data, array(
                        'selisih' => $this->request->getPost('selisih')[$key],
                        'bobot_nilai' => $this->request->getPost('bobot_nilai')[$key],
                        'ket' => $this->request->getPost('ket')[$key],
                    ));
                }
                if ($this->nilai_bobotm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data nilai bobot Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->nilai_bobotm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'selisih' => $this->request->getPost('selisih')[$key],
                        'bobot_nilai' => $this->request->getPost('bobot_nilai')[$key],
                        'ket' => $this->request->getPost('ket')[$key],
                    ));
                }
                if ($this->nilai_bobotm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data nilai bobot Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->nilai_bobotm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->nilai_bobotm->delete($this->request->getPost('id'))) {
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

/* End of file nilai_bobot.php */
/* Location: ./app/controllers/Nilai_gap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 10:19:59 */
/* http://harviacode.com */