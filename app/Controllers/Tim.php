<?php

namespace App\Controllers;

use App\Models\TimM;
use App\Models\UsersM;

class Tim extends BaseController
{
    protected $timm;
    function __construct()
    {
        $this->timm = new TimM();
        $this->usersm = new UsersM();
    }
    public function index()
    {
        $this->data = array('title' => 'Tim | Admin', 'breadcome' => 'Tim', 'url' => 'tim/', 'm_tim' => 'active', 'session' => $this->session);

        echo view('App\Views\tim\tim_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->timm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = $rows->nama;
            $row['thn_didirikan'] = $rows->thn_didirikan;
            $row['no_telp'] = $rows->no_telp;
            $row['alamat'] = $rows->alamat;
            $row['pelatih'] = $rows->nama_pelatih;
            $row['manager'] = $rows->nama_manager;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->timm->total(),
            "totalNotFiltered" => $this->timm->countAllResults(),
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
            $data['pelatih'] = $this->usersm->pelatih()->findAll();
            $data['manager'] = $this->usersm->manager()->findAll();
            $this->data['form_input'][] = view('App\Views\tim\form_input', $data);
        }
        $status['html']         = view('App\Views\tim\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Tim';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->timm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
                'pelatih' => $this->usersm->pelatih()->findAll(),
                'manager' => $this->usersm->manager()->findAll(),
            );
            $this->data['form_input'][] = view('App\Views\tim\form_input', $data);
        }
        $status['html']         = view('App\Views\tim\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Tim';
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
                        'nama' => $this->request->getPost('nama')[$key],
                        'thn_didirikan' => $this->request->getPost('thn_didirikan')[$key],
                        'no_telp' => $this->request->getPost('no_telp')[$key],
                        'alamat' => $this->request->getPost('alamat')[$key],
                        'pelatih' => $this->request->getPost('pelatih')[$key],
                        'manager' => $this->request->getPost('manager')[$key],
                    ));
                }
                if ($this->timm->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Tim Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->timm->errors();
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'nama' => $this->request->getPost('nama')[$key],
                        'thn_didirikan' => $this->request->getPost('thn_didirikan')[$key],
                        'no_telp' => $this->request->getPost('no_telp')[$key],
                        'alamat' => $this->request->getPost('alamat')[$key],
                        'pelatih' => $this->request->getPost('pelatih')[$key],
                        'manager' => $this->request->getPost('manager')[$key],
                    ));
                }
                if ($this->timm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Tim Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->timm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                if ($this->timm->delete($this->request->getPost('id'))) {
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

/* End of file Tim.php */
/* Location: ./app/controllers/Tim.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 05:22:56 */
/* http://harviacode.com */