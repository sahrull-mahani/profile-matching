<?php

namespace App\Controllers;

use App\Models\AspekM;

class Aspek extends BaseController
{
    protected $aspekm;
    function __construct()
    {
        $this->aspekm = new AspekM();
    }
    public function index()
    {
        $this->data = array('title' => 'Aspek | Admin', 'breadcome' => 'Aspek', 'url' => 'aspek/', 'm_aspek' => 'active', 'session' => $this->session);

        echo view('App\Views\aspek\aspek_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->aspekm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['aspek_penilaian'] = $rows->aspek_penilaian;
            $row['persentase'] = "$rows->persentase%";
            $row['core'] = $rows->core;
            $row['secondary'] = $rows->secondary;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->aspekm->total(),
            "totalNotFiltered" => $this->aspekm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\aspek\form_input', $data);
        }
        $status['html']         = view('App\Views\aspek\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Aspek';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->aspekm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->aspek_penilaian . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\aspek\form_input', $data);
        }
        $status['html']         = view('App\Views\aspek\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Aspek';
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
                        'aspek_penilaian' => $this->request->getPost('aspek_penilaian')[$key],
                        'persentase' => $this->request->getPost('persentase')[$key],
                        'core' => $this->request->getPost('core')[$key],
                        'secondary' => $this->request->getPost('secondary')[$key],
                    ));
                }
                if ($this->aspekm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Aspek Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->aspekm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'aspek_penilaian' => $this->request->getPost('aspek_penilaian')[$key],
                        'persentase' => $this->request->getPost('persentase')[$key],
                        'core' => $this->request->getPost('core')[$key],
                        'secondary' => $this->request->getPost('secondary')[$key],
                    ));
                }
                if ($this->aspekm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Aspek Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->aspekm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->aspekm->delete($this->request->getPost('id'))) {
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

/* End of file Aspek.php */
/* Location: ./app/controllers/Aspek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 08:03:25 */
/* http://harviacode.com */