<?php

namespace App\Models;

use CodeIgniter\Model;

class RecycleM extends Model
{
    protected $table = 'nilai_gap';
    protected $allowedFields = array('id_aspek', 'id_kriteria', 'id_posisi', 'id_pemain', 'id_pelatih', 'nilai_kriteria', 'deleted_at');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'id_aspek' => 'required|max_length[]',
        'id_kriteria' => 'required|max_length[]',
        'id_posisi' => 'required|max_length[]',
        'id_pemain' => 'required|max_length[]',
        'id_pelatih' => 'required|max_length[]',
        'nilai_kriteria' => 'required|max_length[]',
    ];

    protected $validationMessages = [
        'id_aspek' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'id_kriteria' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'id_posisi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'id_pemain' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'id_pelatih' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
        'nilai_kriteria' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal  Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('id_aspek', 'id_kriteria', 'id_posisi', 'id_pemain', 'id_pelatih', 'nilai_kriteria');
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
        $this->where('nilai_gap.deleted_at !=', NULL);
        $this->select('nilai_gap.*, k.kriteria_penilaian, a.aspek_penilaian, pos.nama_posisi, p.nama');
        if (!is_admin()) {
            $this->where('p.id_tim', getTimById('pelatih', session('user_id'))->id);
        }
        $this->join('aspek a', 'a.id = nilai_gap.id_aspek');
        $this->join('kriteria k', 'k.id = nilai_gap.id_kriteria');
        $this->join('pemain p', 'p.id = nilai_gap.id_pemain');
        $this->join('posisi pos', 'pos.id = nilai_gap.id_posisi');
        $this->join('nilai_bobot nb', 'nb.selisih = nilai_gap.nilai_kriteria');
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
}
/* End of file RecycleM.php */
/* Location: ./app/models/RecycleM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-01-26 05:41:40 */