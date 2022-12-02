<?php

namespace App\Controllers;

use App\Models\PemainM;
use App\Models\PosisiM;
use App\Models\TimM;

class Pemain extends BaseController
{
    protected $pemainm;
    function __construct()
    {
        $this->pemainm = new PemainM();
        $this->posisim = new PosisiM();
        $this->timm = new TimM();
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
            $row['posisi'] = ucwords($rows->nama_posisi);
            $row['tim'] = ucwords($rows->nama_tim);
            $row['ttl'] = get_format_date($rows->ttl);
            $row['no_hp'] = $rows->no_hp;
            $row['alamat'] = $rows->alamat;
            $row['foto'] = '<img width="150" alt="Foto pemain" src="' . site_url("Pemain/img_thumb/" . $rows->foto) . '" class="mb-3 img-responsive" />';
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
            $data['posisi'] = $this->posisim->findAll();
            $data['tim'] = $this->timm->findAll();
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
                'posisi' => $this->posisim->findAll(),
                'tim' => $this->timm->findAll(),
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
                            'id_posisi' => $this->request->getPost('posisi')[$key],
                            'id_tim' => is_admin() ? $this->request->getPost('tim')[$key] : getTimById('manager', session('user_id'))->id,
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
                                'id_posisi' => $this->request->getPost('posisi')[$key],
                                'id_tim' => 1,
                                'foto' => $file_name,
                            ));
                            $pathIMG = WRITEPATH . 'uploads/img/' . $filesold;
                            $pathTHUMBS = WRITEPATH . 'uploads/thumbs/' . $filesold;
                            if (file_exists($pathIMG) && file_exists($pathTHUMBS)) {
                                unlink($pathIMG);
                                unlink($pathTHUMBS);
                            }
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
                    . '|max_size[foto,3072]'
            ],
        ];
        if (!$this->validate($validationRule)) {
            $this->session->setFlashdata('error', $this->validator->getError('foto'));
            return false;
        }
        $filepath = WRITEPATH . 'uploads/';
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
    public function img_thumb($file_name)
    {
        $filepath = WRITEPATH . 'uploads/thumbs/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
    public function img_medium($file_name)
    {
        $filepath = WRITEPATH . 'uploads/img/' . $file_name;
        $this->response->setContentType('image/jpg,image/jpeg,image/png');
        header('Content-Disposition: inline; filename=' . $file_name);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
}

/* End of file Pemain.php */
/* Location: ./app/controllers/Pemain.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 04:12:14 */
/* http://harviacode.com */