<?php

namespace App\Controllers;

use App\Models\BeritaM;
use App\Models\PhotoM;
use App\Models\VideoM;
use App\Models\StatistikM;

class Home extends BaseController
{

    function __construct()
    {
        $this->beritam = new BeritaM();
        $this->videom = new VideoM();
        $this->photom = new PhotoM();
        $this->statistikm = new StatistikM();
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Stunting',
            'statistikJS' => true,
            'berita' => $this->beritam->findAll(),
            'photo' => $this->photom->findAll(),
            'video' => $this->videom->findAll(),
            'statistik' => $this->statistikm->findAll(),
        ];

        return view('App\Views\template_adminlte\home', $data);
    }
}
