<?php

namespace App\Models;

use CodeIgniter\Model;

class Hitung_cf_sf_nt extends Model
{
    protected $table = 'hitung_cf_sf_nt';
    protected $allowedFields = array('id_pemain', 'aspek', 'posisi', 'core', 'second', 'total', 'deleted_at');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'id_pemain' => 'required|max_length[11]',
        'aspek' => 'required|max_length[150]',
        'posisi' => 'required|max_length[11]',
        'core' => 'required',
        'second' => 'required',
        'total' => 'required',
    ];

    protected $validationMessages = [
        'id_pemain' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'aspek' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'posisi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'core' => ['required' => 'tidak boleh kosong'],
        'second' => ['required' => 'tidak boleh kosong'],
        'total' => ['required' => 'tidak boleh kosong'],
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
        $column_search = array('p.nama', 'aspek_penilaian', 'hitung_cf_sf_nt.core', 'hitung_cf_sf_nt.second', 'hitung_cf_sf_nt.total');
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
        $this->select('hitung_cf_sf_nt.*, a.aspek_penilaian, p.nama');
        $this->join('pemain p', 'p.id = hitung_cf_sf_nt.id_pemain');
        $this->join('aspek a', 'a.id = hitung_cf_sf_nt.aspek');
        $this->where('hitung_cf_sf_nt.deleted_at', NULL);
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

    private function _get_datatables_hasil()
    {
        $column_search = array('nama', 'aspek_penilaian', 'nama_posisi', 'hitung_cf_sf_nt.core', 'hitung_cf_sf_nt.second', 'hitung_cf_sf_nt.total');
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
        $this->select('hitung_cf_sf_nt.id, nama, po.nama_posisi');
        $this->selectSum('total*(persentase/100)', 'hasil');
        $this->join('pemain p', 'p.id = hitung_cf_sf_nt.id_pemain');
        $this->join('aspek a', 'a.id = hitung_cf_sf_nt.aspek');
        $this->join('posisi po', 'po.id = hitung_cf_sf_nt.posisi');
        $this->groupBy('id_pemain');
        $this->orderBy('hasil', 'DESC');
        $this->where('hitung_cf_sf_nt.posisi', $_GET['posisi']);
        $this->where('hitung_cf_sf_nt.deleted_at', NULL);
    }
    public function get_datatables_hasil()
    {
        $this->_get_datatables_hasil();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit, $offset);
    }
    public function total_hasil()
    {
        $this->_get_datatables_hasil();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }
}