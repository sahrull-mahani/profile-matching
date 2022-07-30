<?php

namespace App\Controllers;

use App\Models\InovasiM;

class Inovasi extends BaseController
{
    protected $inovasim;
    function __construct()
    {
        $this->inovasim = new InovasiM();
        $this->beritac = new Berita;
        $this->db = db_connect();
    }
    public function index()
    {
        $this->data = array('title' => 'Inovasi | Admin', 'breadcome' => 'Inovasi', 'url' => 'inovasi/', 'm_inovasi' => 'active', 'session' => $this->session);

        echo view('App\Views\inovasi\inovasi_list', $this->data);
    }

    public function remove()
    {
        // http://localhost:8080/upl/1655355904_c2dc5f6206cf7c977427.jpg
        $file = $this->request->getVar('src');
        if ($file) {
            $fileName = str_replace(base_url() . '/', "", $file);
            if (unlink($fileName)) {
                echo "Delete file success konoyaro";
            }
        }
    }
    public function upload()
    {
        $file = $this->request->getFile('file');
        if ($file) {
            $fileName = 'skpd_' . session('skpd_id') . "-" . $file->getRandomName();
            // $file->move('upload', $fileName);
            $image = \Config\Services::image('gd'); //Load Image Libray
            $image->withFile($file)->fit(1024, 768)->save('upload/' . $fileName);
            echo base_url("upload/$fileName");
        }
    }

    public function ajax_request()
    {
        $list = $this->inovasim->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['skpd'] = strtoupper($rows->alias);
            $row['judul'] = $rows->judul;
            $row['inovasi'] = substr($rows->inovasi, 0, 100) . '...';
            $row['status'] = $rows->publisher > 0 ? '<b class="text-info">Sudah tayang</b>' : '<b class="text-warnign">Belum tayang</b>';
            $data[] = $row;
        }
        $output = array(
            "total" => $this->inovasim->total(),
            "totalNotFiltered" => $this->inovasim->countAllResults(),
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
            $this->data['form_input'][] = view('App\Views\inovasi\form_input', $data);
        }
        $status['html']         = view('App\Views\inovasi\form_modal', $this->data);
        $status['modal_title']  = 'Tambah Data Inovasi';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function edit()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'update', 'btn' => '<i class="fas fa-edit"></i> Edit');
        foreach ($id as $ids) {
            $get = $this->inovasim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->judul . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\inovasi\form_input', $data);
        }
        $status['html']         = view('App\Views\inovasi\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Inovasi';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function detail()
    {
        $id = $this->request->getPost('id');
        $this->data = array('action' => 'delete', 'btn' => '<i class="fas fa-trash-alt text-danger"></i> Delete');
        foreach ($id as $ids) {
            $get = $this->inovasim->find($ids);
            $data = array(
                'nama' => '<b>' . $get->judul . '</b>',
                'get' => $get,
            );
            $this->data['form_input'][] = view('App\Views\inovasi\inovasi_detail', $data);
        }
        $status['html']         = view('App\Views\inovasi\form_modal', $this->data);
        $status['modal_title']  = 'Update Data Inovasi';
        $status['modal_size']   = 'modal-xl';
        echo json_encode($status);
    }
    public function pdfViewer($id)
    {
        $file = $this->inovasim->find($id);
        $filepath = WRITEPATH . 'uploads/filepdf/' . $file->pdf;
        $this->response->setContentType('application/pdf');
        header('Content-Disposition: inline; filename=' . $file->pdf);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
    public function save()
    {
        switch ($this->request->getPost('action')) {
            case 'insert':
                $nama = $this->request->getPost('id');
                $data = array();
                foreach ($nama as $key => $val) {
                    $file = $this->request->getFiles('pdf')['pdf'][$key];
                    $fileName = $file->getRandomName();
                    if ($file->move(WRITEPATH . 'uploads/filepdf/', $fileName)) {
                        array_push($data, array(
                            'judul' => ucwords($this->request->getPost('judul')[$key]),
                            'inovasi' => $this->request->getPost('inovasi')[$key],
                            'skpd_id' => session('skpd_id'),
                            'pdf' => $fileName
                        ));
                    }
                }
                if ($this->inovasim->insertBatch($data)) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Inovasi Tersimpan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->inovasim->errors();
                    unlink(WRITEPATH . "uploads/filepdf/$fileName");
                }
                echo json_encode($status);
                break;
            case 'update':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    $file = $this->request->getFiles('pdf')['pdf'][$key];
                    $fileOld = $this->request->getPost('old_file')[$key];
                    $fileName = $file->getRandomName();
                    if (unlink(WRITEPATH . 'uploads/filepdf/' . $fileOld)) {
                        if ($file->move(WRITEPATH . 'uploads/filepdf/', $fileName)) {
                            array_push($data, array(
                                'id' => $val,
                                'judul' => ucwords($this->request->getPost('judul')[$key]),
                                'inovasi' => $this->request->getPost('inovasi')[$key],
                                'pdf' => $fileName
                            ));
                        }
                    }
                }
                if ($this->inovasim->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Inovasi Telah Di Ubah';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->inovasim->errors();
                }
                echo json_encode($status);
                break;
            case 'publish':
                $id = $this->request->getPost('id');
                $data = array();
                foreach ($id as $key => $val) {
                    array_push($data, array(
                        'id' => $val,
                        'publisher' => session('user_id')
                    ));
                }
                if ($this->inovasim->updateBatch($data, 'id')) {
                    $status['type'] = 'success';
                    $status['text'] = 'Data Inovasi Telah Di Tayangkan';
                } else {
                    $status['type'] = 'error';
                    $status['text'] = $this->inovasim->errors();
                }
                echo json_encode($status);
                break;
            case 'delete':
                $id = $this->request->getPost('id');
                foreach ($id as $ids) {
                    $get = $this->inovasim->find($ids);
                    if (unlink(WRITEPATH . "uploads/filepdf/$get->pdf")) {
                        if ($this->inovasim->delete($id)) {
                            $status['type'] = 'success';
                            $status['text'] = '<strong>Deleted..!</strong>Berhasil dihapus';
                        } else {
                            $status['type'] = 'error';
                            $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                        }
                    } else {
                        $status['type'] = 'error';
                        $status['text'] = '<strong>Oh snap!</strong> Proses hapus data gagal.';
                    }
                }
                echo json_encode($status);
                break;
        }
    }
}

/* End of file Inovasi.php */
/* Location: ./app/controllers/Inovasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-16 04:00:04 */
/* http://harviacode.com */