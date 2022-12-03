<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\Hitung_cf_sf_nt;
use App\Models\KriteriaM;
use App\Models\Nilai_gapM;
use App\Models\PemainM;
use App\Models\PosisiM;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Nilai_gap extends BaseController
{
    protected $nilai_gapm;
    function __construct()
    {
        helper('my_helper');
        $this->nilai_gapm = new Nilai_gapM();
        $this->aspekm = new AspekM();
        $this->kriteriam = new KriteriaM();
        $this->pemainm = new PemainM();
        $this->hitungCfSfM = new Hitung_cf_sf_nt();
        $this->posisim = new PosisiM();
    }
    public function index()
    {
        $this->data = array(
            'title' => 'Profile Matching | Admin',
            'breadcome' => 'Profile Matching',
            'url' => 'nilai_gap/',
            'm_nilai_gap' => 'active',
            'session' => $this->session,
            'posisi' => $this->posisim->findALl(),
            // 'aspek' => $this->aspekm->select('aspek.*')->join('hitung_cf_sf_nt h', 'h.aspek = aspek.id', 'left')->whereNotIn('h.aspek', null)->findAll(),
            'aspek' => $this->aspekm->select('aspek.*')->findAll(),
            'nilaiCfSf' => $this->hitungCfSfM->join('pemain p', 'p.id = hitung_cf_sf_nt.id_pemain')->join('aspek a', 'a.id = hitung_cf_sf_nt.aspek')->findAll()
        );
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
            $row['id_pelatih'] = $rows->id_pelatih;
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
            switch ($rows->nilai_kriteria) {
                case 1:
                    $nilai = 'Buruk';
                    break;
                case 2:
                    $nilai = 'Cukup';
                    break;
                case 3:
                    $nilai = 'Baik';
                    break;
                case 4:
                    $nilai = 'Sangat Baik';
                    break;
            }
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_aspek'] = $rows->aspek_penilaian;
            $row['id_kriteria'] = $rows->kriteria_penilaian;
            $row['id_pemain'] = $rows->nama;
            $row['nilai_kriteria'] = "$rows->nilai_kriteria $rows->ket";
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
    public function ajax_nilaiCfSf()
    {
        $list = $this->hitungCfSfM->get_datatables();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_pemain'] = ucwords($rows->nama);
            $row['aspek'] = ucfirst($rows->aspek_penilaian);
            $row['core'] = sprintf('%.2f', $rows->core);
            $row['second'] = sprintf("%.2f", $rows->second);
            $row['total'] = sprintf('%.2f', $rows->total);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->hitungCfSfM->total(),
            "totalNotFiltered" => $this->hitungCfSfM->countAllResults(),
            "rows" => $data,
        );
        echo json_encode($output);
    }
    public function ajax_hasil_akhir()
    {
        $list = $this->hitungCfSfM->get_datatables_hasil();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $rows) {
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_pemain'] = ucwords($rows->nama);
            $row['posisi'] = strtoupper($rows->nama_posisi);
            $row['hasil'] = sprintf('%.2f', $rows->hasil);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->hitungCfSfM->total_hasil(),
            "totalNotFiltered" => $this->hitungCfSfM->countAllResults(),
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
        $posisi = $this->request->getVar('posisi');
        $kriteria = $this->kriteriam->where('id_aspek', $aspek)->findAll();
        $pemain = $this->pemainm->where('id_tim', getTimById('pelatih', session('user_id'))->id)->where('id_posisi', $posisi)->findAll();
        $data = [
            'kriteria'  => $kriteria,
            'pemain'    => $pemain,
            'aspek'     => $aspek,
            'posisi'    => $posisi
        ];
        $html = view('App\Views\nilai_gap\data-gap', $data);
        return json_encode(['nilai' => $html]);
    }

    public function simpanGap()
    {
        $data = $this->request->getVar('data');
        $id_aspek = $this->request->getVar('id_aspek');
        $id_posisi = $this->request->getVar('id_posisi');
        $exp = explode('&', $data);
        $hasil = [];
        $hasil2 = [];
        if ($this->nilai_gapm->where('id_aspek', $id_aspek)->where('id_pelatih', session('user_id'))->countAllResults() > 0) {
            $status['title'] = 'gagal';
            $status['type'] = 'error';
            $status['text'] = '<strong>Oh snap!</strong> Aspek sudah terdaftar.';
            return json_encode($status);
        }
        foreach ($exp as $key => $row) {
            $key++;
            $row = explode('=', $row);
            $val[] = end($row);

            $valKriteria = explode('%7C', end($row));

            array_push($hasil, [
                'id_aspek' => $id_aspek,
                'id_kriteria' => $valKriteria[1],
                'id_pemain' => end($valKriteria),
                'id_pelatih' => session('user_id'),
                'nilai_kriteria' => $valKriteria[0] - getKriteriaById($valKriteria[1])->target
            ]);
        }

        if ($this->nilai_gapm->insertBatch($hasil)) {
            $pemain = $this->pemainm->where('id_posisi', $id_posisi)->where('id_tim', getTimById('pelatih', session('user_id'))->id)->findAll();
            foreach ($pemain as $row) {
                $core = $this->nilai_gapm->select('a.*')->selectSum('bobot_nilai', 'totalcore')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->first();
                $coreCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
                $second = $this->nilai_gapm->selectSum('bobot_nilai', 'totalsecond')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->first();
                $secondCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
                array_push($hasil2, [
                    'id_pemain' => $row->id,
                    'aspek'     => $id_aspek,
                    'posisi'    => $id_posisi,
                    'core'      => $core->totalcore / count($coreCount),
                    'second'    => $second->totalsecond / count($secondCount),
                    'total'     => (($core->core / 100) * ($core->totalcore / count($coreCount))) + (($core->secondary / 100) * ($second->totalsecond) / count($secondCount))
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
