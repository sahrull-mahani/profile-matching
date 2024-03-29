<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaM extends Model
{
    protected $table = 'kriteria';
    protected $allowedFields = array('id_aspek', 'id_tim', 'id_posisi', 'kriteria_penilaian', 'target', 'type');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'id_aspek' => 'required|max_length[11]',
        'id_tim' => 'required|max_length[11]',
        'id_posisi' => 'required|max_length[11]',
        'kriteria_penilaian' => 'required|max_length[150]',
        'target' => 'required|max_length[11]',
        'type' => 'required|max_length[9]',
    ];

    protected $validationMessages = [
        'id_aspek' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'id_tim' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'id_posisi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'kriteria_penilaian' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'target' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'type' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 9 Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('id_aspek', 'kriteria_penilaian', 'target', 'type');
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

        $this->select('kriteria.*, a.aspek_penilaian, tim.nama, posisi.nama_posisi');
        if (!is_admin()) {
            $this->where('id_tim', getTimById(session('userlevel'), session('user_id'))->id);
        }
        $this->join('aspek a', 'a.id = kriteria.id_aspek');
        $this->join('tim', 'tim.id = kriteria.id_tim');
        $this->join('posisi', 'posisi.id = kriteria.id_posisi');
        $this->orderBy('id_tim', 'asc');
        $this->orderBy('id_posisi', 'asc');
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
/* End of file KriteriaM.php */
/* Location: ./app/models/KriteriaM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 08:10:49 */