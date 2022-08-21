<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\KriteriaM;

class Kriteria extends BaseController
{
    protected $kriteriam;
    function __construct()
    {
        $this->kriteriam = new KriteriaM();
        $this->aspekm = new AspekM();
    }
    public function index()
    {
        $this->data = array('title' => 'Kriteria | Admin', 'breadcome' => 'Kriteria', 'url' => 'kriteria/', 'm_kriteria' => 'active', 'session' => $this->session);

        echo view('App\Views\kriteria\kriteria_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->kriteriam->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_aspek'] = $rows->aspek_penilaian;
            $row['kriteria_penilaian'] = $rows->kriteria_penilaian;
            $row['target'] = $rows->target;
            $row['type'] = $rows->type;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->kriteriam->total(),
            "totalNotFiltered" => $this->kriteriam->countAllResults(),
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
            $data['aspek'] = $this->aspekm->findAll();
            $this->data['form_input'][] = view('App\Views\kriteria\form_input', $data);
        }
        $status['html']         = view('App\Views\kriteria\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Kriteria';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->kriteriam->find($ids);
            $data = array(
                'nama' => '<b>' . $get->kriteria_penilaian . '</b>',
                'get' => $get,
                'aspek' => $this->aspekm->findAll()
            );
            $this->data['form_input'][] = view('App\Views\kriteria\form_input', $data);
        }
        $status['html']         = view('App\Views\kriteria\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Kriteria';
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
                        'id_aspek' => $this->request->getPost('id_aspek')[$key],
                        'kriteria_penilaian' => $this->request->getPost('kriteria_penilaian')[$key],
                        'target' => $this->request->getPost('target')[$key],
                        'type' => $this->request->getPost('type')[$key],
                    ));
                }
                if ($this->kriteriam->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kriteria Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->kriteriam->errors();
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
                        'kriteria_penilaian' => $this->request->getPost('kriteria_penilaian')[$key],
                        'target' => $this->request->getPost('target')[$key],
                        'type' => $this->request->getPost('type')[$key],
                    ));
                }
                if ($this->kriteriam->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Kriteria Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->kriteriam->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->kriteriam->delete($this->request->getPost('id'))) {
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

/* End of file Kriteria.php */
/* Location: ./app/controllers/Kriteria.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 08:10:49 */
/* http://harviacode.com */