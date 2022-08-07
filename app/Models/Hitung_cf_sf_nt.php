<?php

namespace App\Models;

use CodeIgniter\Model;

class Hitung_cf_sf_nt extends Model
{
    protected $table = 'hitung_cf_sf_nt';
    protected $allowedFields = array('id_pemain', 'aspek', 'core', 'second', 'total');
    protected $returnType     = 'object';

    protected $validationRules = [
        'id_pemain' => 'required|max_length[11]',
        'aspek' => 'required|max_length[150]',
        'core' => 'required',
        'second' => 'required',
        'total' => 'required',
    ];

    protected $validationMessages = [
        'id_pemain' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 11 Karakter'],
        'aspek' => ['required' => 'tidak boleh kosong', 'max_length' => 'Maximal 150 Karakter'],
        'core' => ['required' => 'tidak boleh kosong'],
        'second' => ['required' => 'tidak boleh kosong'],
        'total' => ['required' => 'tidak boleh kosong'],
    ];
}