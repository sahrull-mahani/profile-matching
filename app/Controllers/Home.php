<?php

namespace App\Controllers;

use App\Models\AspekM;
use App\Models\KriteriaM;
use App\Models\PemainM;
use App\Models\TimM;

class Home extends BaseController
{

    function __construct()
    {
        $this->pemainm = new PemainM();
        $this->timm = new TimM();
        $this->aspekm = new AspekM();
        $this->kriteriam = new KriteriaM();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Profile Matching',
            'pemain' => $this->pemainm->findAll(),
            'tim' => $this->timm->findAll(),
            'aspek' => $this->aspekm->findAll(),
            'kriteria' => $this->kriteriam->findAll(),
        ];

        return view('App\Views\template_adminlte\home', $data);
    }
}
