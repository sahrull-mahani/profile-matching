<?php

namespace App\Models;

use CodeIgniter\Model;

class TimM extends Model
{
    protected $table = 'tim';
    protected $allowedFields = array('nama', 'thn_didirikan', 'no_telp', 'alamat', 'pelatih', 'manager', 'formasi');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'nama' => 'required|max_length[150]',
        'no_telp' => 'required|max_length[15]',
        'alamat' => 'required|max_length[65535]',
        'pelatih' => 'required|max_length[11]',
        'manager' => 'required|max_length[11]',
        'formasi' => 'required|max_length[10]',
    ];

    protected $validationMessages = [
        'nama' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'no_telp' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 15 Karakter'],
        'alamat' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 65535 Karakter'],
        'pelatih' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'manager' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'formasi' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 10 Karakter'],
    ];
    private function _get_datatables()
    {
        $column_search = array('nama', 'thn_didirikan', 'no_telp', 'alamat', 'pelatih', 'manager');
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

        $this->select('tim.*, u.nama_user nama_pelatih, us.nama_user nama_manager');
        $this->join('users u', 'u.id = tim.pelatih');
        $this->join('users us', 'us.id = tim.manager');
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
/* End of file TimM.php */
/* Location: ./app/models/TimM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-31 05:22:56 */