<?php

namespace App\Controllers;

use App\Models\BeritaM;
use App\Models\InovasiM;
use App\Models\PhotoM;
use App\Models\StatistikM;
use App\Models\VideoM;
use CodeIgniter\I18n\Time;

class Web extends BaseController
{
    protected $beritaM, $statistikM, $videoM;
    public function __construct()
    {
        $this->beritaM = new BeritaM();
        $this->statistikM = new StatistikM();
        $this->videoM = new VideoM();
        $this->photoM = new PhotoM();
        $this->inovasiM = new InovasiM();
    }

    public function index()
    {
        $this->data['items'] = $this->beritaM->select('berita.*, d.nama, d.alias')->join('skpd d', 'd.id=berita.skpd_id')->orderBy('id desc')->where('redaktur !=', null)->findAll(3);
        $this->data['videos'] = $this->videoM->joinUsers()->where('status', 1)->orderBy('video.id desc')->findAll(3);
        $this->data['photos'] = $this->photoM->where('status', 1)->orderBy('id', 'desc')->findAll(3, 0);
        $this->data['photos2'] = $this->photoM->where('status', 1)->orderBy('id', 'desc')->findAll(3, 3);
        $this->data['photos3'] = $this->photoM->where('status', 1)->orderBy('id', 'desc')->findAll(3, 6);
        $this->data['title'] = 'Mairu Molihuto Stunting';
        
        return view('App\Views\web\home', $this->data);
    }

    public function berita()
    {
        $this->data['items'] = $this->beritaM->select('berita.*, d.nama, d.alias')->join('skpd d', 'd.id=berita.skpd_id')->orderBy('id desc')->where('redaktur !=', null)->paginate(2, 'berita');
        $this->data['pager'] = $this->beritaM->pager;
        $this->data['title'] = 'Berita';
        
        return view('App\Views\web\web_berita', $this->data);
    }
    
    public function detail_b($id)
    {
        $this->data['title'] = 'Berita';
        $this->data['items'] = $this->beritaM->orderBy('id desc')->where('redaktur !=', null)->findAll(3);
        $this->data['item'] = $this->beritaM->select('berita.*, d.nama, d.alias')->join('skpd d', 'd.id=berita.skpd_id')->where('redaktur !=', null)->find($id);
        $this->data['videos'] = $this->videoM->joinUsers()->where('status', 1)->findAll(1);

        return view('App\Views\web\web_berita_detail', $this->data);
    }

    public function galery()
    {
        $this->data['title'] = 'Galery';
        $this->data['items'] = $this->photoM->where('status', 1)->findAll();
        
        return view('App\Views\web\web_galery', $this->data);
    }

    public function Inovasi()
    {
        $this->data['title'] = 'Inovasi';
        $this->data['items'] = $this->inovasiM->select('inovasi.*, d.nama, d.alias, u.nama_user')->join('skpd d', 'd.id=inovasi.skpd_id')->join('users u', 'u.id=inovasi.publisher')->where('publisher !=', 0)->orderBy('id', 'desc')->findAll();

        return view('App\Views\web\web_inovasi', $this->data);
    }

    public function detail_i($id)
    {
        $this->data['title'] = 'Inovasi';
        $this->data['items'] = $this->beritaM->orderBy('id desc')->where('redaktur !=', null)->findAll(3);
        $this->data['item'] = $this->inovasiM->select('inovasi.*, d.nama, d.alias, u.nama_user')->join('skpd d', 'd.id=inovasi.skpd_id')->join('users u', 'u.id=inovasi.publisher')->find($id);
        $this->data['videos'] = $this->videoM->joinUsers()->where('status', 1)->findAll(1);

        return view('App\Views\web\web_inovasi_detail', $this->data);
    }

    public function video()
    {
        $this->data['title'] = 'video';
        $this->data['items'] = $this->videoM->joinUsers()->where('status', 1)->findAll();

        return view('App\Views\web\web_video', $this->data);
    }

    public function statistik()
    {
        $this->data['title'] = 'Statistik';
        $this->data['statistikJS'] = true;

        return view('App\Views\web\web_statistik', $this->data);
    }

    public function api()
    {
        $id = $this->request->getPost('id');
        if ($id == null) {
            $desa = $this->statistikM->select('desa tahun')->groupBy('desa')->selectCount('desa', 'jumlah')->findAll();
        }else{
            $desa = $this->statistikM->select('desa tahun')->where('tahun', $id)->groupBy('desa')->selectCount('desa', 'jumlah')->findAll();
        }
        $data = [
            'statistik' => $this->statistikM->select('tahun, nik')->groupBy('tahun')->selectCount('nik', 'jumlah')->findAll(),
            'desa' => $desa
        ];

        return json_encode($data);
    }
    public function pdfViewer($id)
    {
        $file = $this->inovasiM->find($id);
        $filepath = WRITEPATH . 'uploads/filepdf/' . $file->pdf;
        $this->response->setContentType('application/pdf');
        header('Content-Disposition: inline; filename=' . $file->pdf);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($filepath);
    }
}
