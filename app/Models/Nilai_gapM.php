<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilai_gapM extends Model
{
    protected $table = 'nilai_gap';
    protected $allowedFields = array('id_aspek', 'id_kriteria', 'id_posisi', 'id_pemain', 'id_pelatih', 'nilai_kriteria', 'hasil', 'hasilposisi', 'deleted_at');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'id_aspek' => 'required|max_length[11]',
        'id_kriteria' => 'required|max_length[11]',
        'id_pemain' => 'required|max_length[11]',
        'id_pelatih' => 'required|max_length[6]',
        'nilai_kriteria' => 'required|max_length[3]',
    ];

    protected $validationMessages = [
        'id_aspek' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'id_kriteria' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'id_pemain' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'id_pelatih' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 6 Karakter'],
        'nilai_kriteria' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 5 Karakter'],
    ];
    public function softDeleteds() {
        $data = [];
        foreach ($this->findAll() as $row) {
            array_push($data, [
                'id' => $row->id,
                'deleted_at' => date('Y-m-d')
            ]);
        }
        $this->updateBatch($data, 'id');
        return true;
    }
    private function _get_datatables()
    {
        $column_search = array('id_aspek', 'id_kriteria', 'id_pemain', 'id_manager', 'nilai_kriteria');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_GET['search']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_GET['search']);
                } else {
                    $this->orLike($item, $_GET['search']);
                }
                if (count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if (isset($_GET['order'])) {
            $this->orderBy($_GET['sort'], $_GET['order']);
        } else {
            $this->orderBy('id', 'asc');
        }
        $this->where('nilai_gap.deleted_at', NULL);
    }
    public function get_datatables()
    {
        $this->_get_datatables();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total()
    {
        $this->_get_datatables();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }


    private function _get_datatables_bobot()
    {
        $column_search = array('nama', 'aspek_penilaian', 'kriteria_penilaian');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_GET['search']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_GET['search']);
                } else {
                    $this->orLike($item, $_GET['search']);
                }
                if (count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if (isset($_GET['order'])) {
            $this->orderBy($_GET['sort'], $_GET['order']);
        } else {
            $this->orderBy('id', 'asc');
        }
        if (!is_admin()) {
            $this->where('p.id_tim', getTimById('pelatih', session('user_id'))->id);
        }
        $this->orderBy('id_pemain', 'asc');
        $this->join('aspek a', 'a.id = nilai_gap.id_aspek');
        $this->join('kriteria k', 'k.id = nilai_gap.id_kriteria');
        $this->join('pemain p', 'p.id = nilai_gap.id_pemain');
        $this->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria');
        $this->where('nilai_gap.deleted_at', NULL);
    }
    public function get_datatables_bobot()
    {
        $this->_get_datatables_bobot();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total_bobot()
    {
        $this->_get_datatables_bobot();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }

    private function _get_datatables_penentu_posisi()
    {
        $column_search = array('nama', 'posisi');
        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if ($_GET['search']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_GET['search']);
                } else {
                    $this->orLike($item, $_GET['search']);
                }
                if (count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if (isset($_GET['order'])) {
            $this->orderBy($_GET['sort'], $_GET['order']);
        } else {
            $this->orderBy('id', 'asc');
        }

        $this->select('nilai_gap.id, nilai_gap.id_pemain, p.nama, k.id_posisi, pos.nama_posisi');
        $this->selectSum('hasil', 'total');
        $this->join('kriteria k', 'k.id = nilai_gap.id_kriteria');
        $this->join('pemain p', 'p.id = nilai_gap.id_pemain');
        $this->join('posisi pos', 'pos.id = k.id_posisi');
        $this->groupBy('nilai_gap.id_pemain');
        $this->groupBy('k.id_posisi');
        // $this->groupBy('nilai_gap.hasilposisi');
        $this->orderBy('nilai_gap.id_pemain', 'asc');
        $this->orderBy('total', 'desc');
        $this->orderBy('k.id_posisi', 'asc');
        // $this->orderBy('nilai_gap.hasilposisi', 'asc');
        $this->where('nilai_gap.deleted_at', NULL);
    }
    public function get_datatables_penentu_posisi()
    {
        $this->_get_datatables_penentu_posisi();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total_penentu_posisi()
    {
        $this->_get_datatables_penentu_posisi();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }
}
/* End of file Nilai_gapM.php */
/* Location: ./app/models/Nilai_gapM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 10:19:59 */