<?php

namespace App\Controllers;

use App\Models\PemainM;

class Pemain extends BaseController
{
    protected $pemainm;
    function __construct()
    {
        $this->pemainm = new PemainM();
    }
    public function index()
    {
        $this->data = array('title' => 'Pemain | Admin', 'breadcome' => 'Pemain', 'url' => 'pemain/', 'm_pemain' => 'active', 'session' => $this->session);

        echo view('App\Views\pemain\pemain_list', $this->data);
    }

    public function ajax_request()
    {
        $list = $this->pemainm->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['nama'] = ucwords($rows->nama);
            $row['ttl'] = get_format_date($rows->ttl);
            $row['no_hp'] = $rows->no_hp;
            $row['alamat'] = $rows->alamat;
            $row['foto'] = '<img width="150" alt="Foto pemain" src="' . site_url("Berita/img_thumb/" . $rows->foto) . '" class="mb-3 img-responsive" />';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->pemainm->total(),
            "totalNotFiltered" => $this->pemainm->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\pemain\form_input', $data);
        }
        $status['html']         = view('App\Views\pemain\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Pemain';
        $status['modal_size']   = 'modal-lg';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->pemainm->find($ids);
            $data = array(
                'nama' => '<b>' . $get->nama . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\pemain\form_input', $data);
        }
        $status['html']         = view('App\Views\pemain\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Pemain';
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
                    $files = $this->request->getFiles('foto')['foto'][$key];
                    $file_name = $files->getRandomName();
                    if ($this->upload_img($file_name, $files)) {
                        array_push($data, array(
                            'nama' => $this->request->getPost('nama')[$key],
                            'ttl' => get_format_date_sql($this->request->getPost('ttl')[$key]),
                            'no_hp' => $this->request->getPost('no_hp')[$key],
                            'alamat' => $this->request->getPost('alamat')[$key],
                            'foto' => $file_name,
                        ));
                    }
                }
                if (!empty($data)) {
                    if ($this->pemainm->insertBatch($data)) {
                        $status['type'] = 'success';
                        $status['text'] = 'Data Pemain Tersimpan';
                    } else {
                        $status['type'] = 'error';
                        $status['text'] = $this->pemainm->errors();
                    }
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->validator->getError('foto');
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $files = $this->request->getFiles('foto')['foto'][$key];
                    $file_name = $files->getRandomName();
                    $filesold = $this->request->getPost('gambar_lama')[$key];

                    if ($files->getError() != 4) {
                        if ($this->upload_img($file_name, $files)) {
                            array_push($data, array(
                                'id' => $val,
                                'nama' => $this->request->getPost('nama')[$key],
                                'ttl' => get_format_date_sql($this->request->getPost('ttl')[$key]),
                                'no_hp' => $this->request->getPost('no_hp')[$key],
                                'alamat' => $this->request->getPost('alamat')[$key],
                                'foto' => $file_name,
                            ));
                            unlink(WRITEPATH . 'uploads/img/' . $filesold);
                            unlink(WRITEPATH . 'uploads/thumbs/' . $filesold);
                        }
                    } else {
                        array_push($data, [
                            'id' => $val,
                            'nama' => $this->request->getPost('nama')[$key],
                            'ttl' => get_format_date_sql($this->request->getPost('ttl')[$key]),
                            'no_hp' => $this->request->getPost('no_hp')[$key],
                            'alamat' => $this->request->getPost('alamat')[$key],
                            'foto' => $filesold,
                        ]);
                    }
                }
                if ($this->pemainm->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Pemain Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->pemainm->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                $get = $this->pemainm->find($id);
                $filepath = WRITEPATH . 'uploads';
                foreach ($get as $row) {
                    if (file_exists("$filepath/img/$row->foto" || file_exists("$filepath/thumbs/$row->foto"))) {
                        unlink("$filepath/img/$row->foto");
                        unlink("$filepath/thumbs/$row->foto");
                    }
                }
                if ($this->pemainm->delete($id)) {
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
    private function upload_img($file_name, $img): bool
    {
        $validationRule = [
            'foto' => [
                'label' => 'IMG File',
                'rules' => 'uploaded[foto]'
                    . '|is_image[foto]'
                    . '|mime_in[foto,image/jpg,image/jpeg,image/png]'
                    . '|max_size[foto,2048]'
                    . '|max_dims[foto,1920,1080]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('foto'));
            return false;
        }
        $filepath = WRITEPATH . 'uploads/';
        $file_old = $this->request->getPost('old_file');
        if (!empty($file_old)) {
            delete_files($filepath . 'img/', $file_old); //Hapus terlebih dahulu jika file ada
            delete_files($filepath . 'thumbs/', $file_old); //Hapus terlebih dahulu jika file ada
        }
        if ($img->isValid() && !$img->hasMoved()) {
            $image = \Config\Services::image('gd'); //Load Image Libray
            $image->withFile($img)->fit(1024, 768)->save($filepath . 'img/' . $file_name);
            //thumbs
            $image->withFile($img)
                ->fit(100, 100, 'center')
                ->save($filepath . 'thumbs/' . $file_name);
            // $img->move($filepath, $file_name, true);
            return true;
        } else {
            $this->session->setFlashdata('error', $img->getErrorString() . '(' . $img->getError() . ')');
            return false;
        }
    }
}

/* End of file Pemain.php */
/* Location: ./app/controllers/Pemain.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 04:12:14 */
/* http://harviacode.com */