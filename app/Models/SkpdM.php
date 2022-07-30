<?php namespace App\Models;
use CodeIgniter\Model;
class SkpdM extends Model{ 
    protected $table = 'skpd';
    protected $allowedFields = array('kode','nama','alias');
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = ['kode' => 'required|max_length[]',
		'nama' => 'required|max_length[255]',
		'alias' => 'required|max_length[150]',
			];

    protected $validationMessages = ['kode' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal  Karakter'],
		'nama' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 255 Karakter'],
		'alias' => ['required' => 'tidak boleh kosong','max_length' => 'Maximal 150 Karakter'],
		];
    private function _get_datatables(){
        $column_search = array('kode','nama','alias');
        $i = 0;
        foreach ($column_search as $item){ // loop column 
            if($_GET['search']){
                if($i===0){
                    $this->groupStart(); 
                    $this->like($item,$_GET['search']);
                }else{
                    $this->orLike($item, $_GET['search']);
                }
                if(count($column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }
        if(isset($_GET['order'])){
            $this->orderBy($_GET['sort'], $_GET['order']);
        }else{
            $this->orderBy('id', 'asc');
        }
    }
    public function get_datatables(){
        $this->_get_datatables();
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        return $this->findAll($limit,$offset);
    }
    public function total(){
        $this->_get_datatables();
        if ($this->tempUseSoftDeletes) {
            $this->where($this->table . '.' . $this->deletedField, null);
        }
        return $this->get()->getNumRows();
    }
}
/* End of file SkpdM.php */
/* Location: ./app/models/SkpdM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-30 08:08:50 */