<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersM extends Model
{
    protected $table = 'users';
    protected $allowedFields = array('username', 'password', 'email', 'nama_user', 'img', 'phone');
    protected $returnType     = 'object';

    public function pelatih()
    {
        $this->where('group_id', 2);
        return $this->join('users_groups ug', 'ug.user_id = users.id');
    }

    public function manager()
    {
        $this->where('group_id', 3);
        return $this->join('users_groups ug', 'ug.user_id = users.id');
    }
}