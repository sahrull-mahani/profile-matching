<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\Hitung_cf_sf_nt;
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
        $this->hitungCfSfM = new Hitung_cf_sf_nt(); 
    }
    public function index()
    {
        // $hasil2 = [];
        // foreach ($this->pemainm->findAll() as $row) {
        //     $core = $this->nilai_gapm->select('a.*')->selectSum('bobot_nilai', 'totalcore')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', 4)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
        //     $coreCoutn = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', 4)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
        //     $second = $this->nilai_gapm->selectSum('bobot_nilai', 'totalsecond')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', 4)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
        //     $secondCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', 4)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
        //     array_push($hasil2, [
        //         'id_pemain' => $row->id,
        //         'aspek'     => 4,
        //         'core'      => $core[0]->totalcore / count($coreCoutn),
        //         'second'    => $second[0]->totalsecond / count($secondCount),
        //         'total'     => (($core[0]->core / 100) * ($core[0]->totalcore / count($coreCoutn))) + (($core[0]->secondary / 100) * ($second[0]->totalsecond) / count($secondCount))
        //     ]);
        // }
        // dd($hasil2);
        // die;
        $this->data = array('title' => 'GAP Seslisih | Admin', 'breadcome' => 'Nilai gap', 'url' => 'nilai_gap/', 'm_nilai_gap' => 'active', 'session' => $this->session, 'aspek' => $this->aspekm->select('aspek.*')->join('nilai_gap n', 'n.id_aspek = aspek.id', 'left')->groupBy('aspek_penilaian')->where('id_aspek', null)->findAll());
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
    public function ajax_bobot()
    {
        $list = $this->nilai_gapm->get_datatables_bobot();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_aspek'] = $rows->aspek_penilaian;
            $row['id_kriteria'] = $rows->kriteria_penilaian;
            $row['id_pemain'] = $rows->nama;
            $row['nilai_kriteria'] = $rows->nilai_kriteria;
            $row['nilai_bobot'] = $rows->bobot_nilai;
            $data[] = $row;
        }
        $output = array(
            "total" => $this->nilai_gapm->total_bobot(),
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
        $exp = explode('&', $data);
        $nilai = count($exp) / count($pemain); // 3
        $hasil = [];
        $hasil2 = [];
        foreach ($exp as $key => $row) {
            $key++;
            $row = explode('=', $row);
            $val[] = end($row);

            $valKriteria = explode('%7C', end($row));

            array_push($hasil, [
                'id_aspek' => $id_aspek,
                'id_kriteria' => end($valKriteria),
                'id_pemain' => $pemain[ceil($key / $nilai) - 1]->id,
                'id_manager' => session('user_id'),
                'nilai_kriteria' => $valKriteria[0]
            ]);
        }
        
        if ($this->nilai_gapm->insertBatch($hasil)) {
            foreach ($this->pemainm->findAll() as $row) {
                $core = $this->nilai_gapm->select('a.*')->selectSum('bobot_nilai', 'totalcore')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
                $coreCoutn = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
                $second = $this->nilai_gapm->selectSum('bobot_nilai', 'totalsecond')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
                $secondCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
                array_push($hasil2, [
                    'id_pemain' => $row->id,
                    'aspek'     => $id_aspek,
                    'core'      => $core[0]->totalcore / count($coreCoutn),
                    'second'    => $second[0]->totalsecond / count($secondCount),
                    'total'     => (($core[0]->core / 100) * ($core[0]->totalcore / count($coreCoutn))) + (($core[0]->secondary / 100) * ($second[0]->totalsecond) / count($secondCount))
                ]);
            }
            if ($this->hitungCfSfM->insertBatch($hasil2)) {
                $status['title'] = 'success';
                $status['type'] = 'success';
                $status['text'] = '<strong>Done..!</strong>Berhasil ditambahkan';
            }
        } else {
            $status['title'] = 'gagal';
            $status['type'] = 'error';
            $status['text'] = '<strong>Oh snap!</strong> Proses gagal.';
        }
        return json_encode($status);
    }
}