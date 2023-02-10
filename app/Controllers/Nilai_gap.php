<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\Hitung_cf_sf_nt;
use App\Models\KriteriaM;
use App\Models\Nilai_gapM;
use App\Models\PemainM;
use App\Models\PosisiM;

class Nilai_gap extends BaseController
{
    protected $nilai_gapm, $aspekm, $kriteriam, $pemainm, $hitungCfSfM, $posisim, $data;
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
            'action' => is_admin() ? $this->nilai_gapm->select('a.id as aspek_id, a.aspek_penilaian, p.id as posisi_id, p.nama_posisi, nilai_gap.id_pelatih')->join('hitung_cf_sf_nt h', 'h.aspek = nilai_gap.id_aspek')->join('aspek a', 'a.id = h.aspek')->join('posisi p', 'p.id = h.posisi')->groupBy('aspek, posisi')->orderBy('posisi')->findAll() : $this->nilai_gapm->select('a.id as aspek_id, a.aspek_penilaian, p.id as posisi_id, p.nama_posisi')->join('hitung_cf_sf_nt h', 'h.aspek = nilai_gap.id_aspek')->join('aspek a', 'a.id = h.aspek')->join('posisi p', 'p.id = h.posisi')->where('id_pelatih', session('user_id'))->where('nilai_gap.deleted_at', NULL)->groupBy('aspek, posisi')->orderBy('posisi')->findAll(),
            'posisi' => $this->posisim->findALl(),
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
    public function ajax_penentu_posisi()
    {
        $list = $this->nilai_gapm->get_datatables_penentu_posisi();
        $data = array();
        $no = isset($_GET['offset']) ? $_GET['offset'] + 1 : 1;
        foreach ($list as $key => $rows) {
            $key++;
            $row = array();
            $row['id'] = $rows->id;
            $row['nomor'] = $no++;
            $row['id_pemain'] = ucwords($rows->nama);
            $row['posisi'] = ($key % 2 == 1 ? '<b>' : 'Posisi Alternatif ') . strtoupper($rows->nama_posisi);
            $data[] = $row;
        }
        $output = array(
            "total" => $this->nilai_gapm->total_penentu_posisi(),
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

    // public function dataGap()
    // {
    //     $aspek = $this->request->getVar('value');
    //     $posisi = $this->request->getVar('posisi');
    //     $kriteria = $this->kriteriam->select('kriteria.*, p.nama_posisi')->where('id_aspek', $aspek)->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id)->join('posisi p', 'p.id = kriteria.id_posisi')->findAll();
    //     $pemain = $this->pemainm->where('id_tim', getTimById('pelatih', session('user_id'))->id)->where('id_posisi', $posisi)->findAll();
    //     $data = [
    //         'kriteria'  => $kriteria,
    //         'pemain'    => $pemain,
    //         'aspek'     => $aspek,
    //         'posisi'    => $posisi
    //     ];
    //     $html = view('App\Views\nilai_gap\data-gap', $data);
    //     return json_encode(['nilai' => $html]);
    // }
    public function dataGap2()
    {        
        if (!is_admin()) {
            $pemain = $this->pemainm->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id)->findAll();
            $kriteria = $this->kriteriam->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id)->findAll();
        } else {
            $pemain = $this->pemainm->findAll();
            $kriteria = $this->kriteriam->findAll();
        }
        $cek = $this->nilai_gapm->where('nilai_gap.deleted_at', NULL)->findAll();

        $data = [
            'pemain'    => $pemain,
            'kriteria'  => $kriteria,
            'cek'       => count($cek) > 0 ? true : false
        ];
        $html = view('App\Views\nilai_gap\data-gap2', $data);
        return json_encode(['nilai' => $html]);
    }
    public function saveGap()
    {
        if (!is_admin()) {
            $pemain = $this->pemainm->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id)->findAll();
            $kriteria = $this->kriteriam->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id)->findAll();
        } else {
            $pemain = $this->pemainm->findAll();
            $kriteria = $this->kriteriam->findAll();
        }

        $data = [];
        foreach ($pemain as $key => $row) {
            foreach ($kriteria as $key2 => $val) {
                $n = $key . $key2;
                array_push($data, [
                    'id_aspek'          => $this->request->getPost("id_aspek$n"),
                    'id_kriteria'       => $this->request->getPost("id_kriteria$n"),
                    'id_posisi'         => getPemainById($this->request->getPost("id_pemain$n"))->id_posisi,
                    'id_pemain'         => $this->request->getPost("id_pemain$n"),
                    'id_pelatih'        => session('user_id'),
                    'nilai_kriteria'    => $this->request->getPost("nilai$n") - getKriteriaById($this->request->getPost("id_kriteria$n"))->target,
                    'hasil'             => $this->request->getPost("nilai$n"),
                    'hasilposisi'       => $this->request->getPost("id_posisi$n")
                ]);
            }
        }

        // print_r($data);
        // die;

        if ($this->nilai_gapm->insertBatch($data)) {
            $data2 = [];
            foreach ($pemain as $key => $row) {
                foreach (getAspek() as $val) {
                    $core = $this->nilai_gapm->select('a.*')->selectSum('bobot_nilai', 'totalcore')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $val->id)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->first();
                    $coreCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $val->id)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
                    $second = $this->nilai_gapm->selectSum('bobot_nilai', 'totalsecond')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $val->id)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->first();
                    $secondCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $val->id)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
                    $valcore = isset($core->totalcore) ? ($core->totalcore / count($coreCount)) : 0;
                    $valsecond = isset($second->totalsecond) ? ($second->totalsecond / count($secondCount)) : 0;
                    array_push($data2, [
                        'id_pemain' => $row->id,
                        'aspek'     => $val->id,
                        'posisi'    => $row->id_posisi,
                        'core'      => $valcore,
                        'second'    => $valsecond,
                        'total'     => (($core->core / 100) * $valcore) + (($core->secondary / 100) * $valsecond)
                    ]);
                }
            }
            if ($this->hitungCfSfM->insertBatch($data2)) {
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

    // public function simpanGap()
    // {
    //     $data = $this->request->getVar('data');
    //     $id_aspek = $this->request->getVar('id_aspek');
    //     $id_posisi = $this->request->getVar('id_posisi');
    //     $exp = explode('&', $data);
    //     $hasil = [];
    //     $hasil2 = [];
    //     if ($this->nilai_gapm->where('id_aspek', $id_aspek)->where('id_posisi', $id_posisi)->where('id_pelatih', session('user_id'))->where('deleted_at', null)->countAllResults() > 0) {
    //         $status['title'] = 'gagal';
    //         $status['type'] = 'error';
    //         $status['text'] = '<strong>Oh snap!</strong> Aspek sudah terdaftar.';
    //         return json_encode($status);
    //     }
    //     foreach ($exp as $key => $row) {
    //         $key++;
    //         $row = explode('=', $row);
    //         $val[] = end($row);

    //         $valKriteria = explode('%7C', end($row));

    //         array_push($hasil, [
    //             'id_aspek' => $id_aspek,
    //             'id_kriteria' => $valKriteria[1],
    //             'id_posisi' => $id_posisi,
    //             'id_pemain' => $valKriteria[2],
    //             'id_pelatih' => session('user_id'),
    //             'nilai_kriteria' => $valKriteria[0] - getKriteriaById($valKriteria[1])->target,
    //             'hasil' => $valKriteria[0],
    //             'hasilposisi' => end($valKriteria),
    //         ]);
    //     }

    //     if ($this->nilai_gapm->insertBatch($hasil)) {
    //         $pemain = $this->pemainm->where('id_posisi', $id_posisi)->where('id_tim', getTimById('pelatih', session('user_id'))->id)->findAll();
    //         foreach ($pemain as $row) {
    //             $core = $this->nilai_gapm->select('a.*')->selectSum('bobot_nilai', 'totalcore')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->first();
    //             $coreCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->join('aspek a', 'a.id = nilai_gap.id_aspek')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'core')->findAll();
    //             $second = $this->nilai_gapm->selectSum('bobot_nilai', 'totalsecond')->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->first();
    //             $secondCount = $this->nilai_gapm->join('kriteria k', 'k.id = nilai_gap.id_kriteria')->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria')->where('nilai_gap.id_aspek', $id_aspek)->where('nilai_gap.id_pemain', $row->id)->where('type', 'secondary')->findAll();
    //             $valcore = isset($core->totalcore) ? ($core->totalcore / count($coreCount)) : 0;
    //             $valsecond = isset($second->totalsecond) ? ($second->totalsecond / count($secondCount)) : 0;
    //             array_push($hasil2, [
    //                 'id_pemain' => $row->id,
    //                 'aspek'     => $id_aspek,
    //                 'posisi'    => $id_posisi,
    //                 'core'      => $valcore,
    //                 'second'    => $valsecond,
    //                 'total'     => (($core->core / 100) * $valcore) + (($core->secondary / 100) * $valsecond)
    //             ]);
    //         }
    //         if ($this->hitungCfSfM->insertBatch($hasil2)) {
    //             $status['title'] = 'success';
    //             $status['type'] = 'success';
    //             $status['text'] = '<strong>Done..!</strong>Berhasil ditambahkan';
    //         }
    //     } else {
    //         $status['title'] = 'gagal';
    //         $status['type'] = 'error';
    //         $status['text'] = '<strong>Oh snap!</strong> Proses gagal.';
    //     }
    //     return json_encode($status);
    // }

    public function truncate_count()
    {
        if ($this->nilai_gapm->softDeleteds() && $this->hitungCfSfM->softDeleteds()) {
            $status['title'] = 'success';
            $status['type'] = 'success';
            $status['text'] = '<strong>Done..!</strong>Berhasil menghapus';
        } else {
            $status['title'] = 'error';
            $status['type'] = 'error';
            $status['text'] = '<strong>Failed..!</strong>Gagal menghapus';
        }
        return json_encode($status);
    }

    public function truncate_recycle()
    {
        if ($this->hitungCfSfM->truncate() && $this->nilai_gapm->truncate()) {
            $status['title'] = 'success';
            $status['type'] = 'success';
            $status['text'] = '<strong>Done..!</strong>Berhasil menghapus';
        } else {
            $status['title'] = 'error';
            $status['type'] = 'error';
            $status['text'] = '<strong>Failed..!</strong>Gagal menghapus';
        }
        return json_encode($status);
    }
}
