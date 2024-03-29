<?php
function get_format_date_sql($date){
    $tgl = new DateTime($date);
    return $tgl->format("Y-m-d");
}
function get_format_date($date){
    $tgl = new DateTime($date);
    return $tgl->format("d-m-Y");
}
function GetDateNow(){
    $tgl = new DateTime("now");
    return $tgl->format("d-m-Y");
}
function getDateTime($date){
    $tgl = new DateTime($date);
    return $tgl->format("Y-m-d H:i:s");
}
function getTime($date){
    $tgl = new DateTime($date);
    return $tgl->format("H:i:s");
}
function arrBulan()
{
    $bulan = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    );
    return $bulan;
}
function getBulan($bulan)
{
    switch ($bulan) {
        case "01":
            $bln = 'Januari';
            break;
        case "02":
            $bln = 'Februari';
            break;
        case "03":
            $bln = 'Maret';
            break;
        case "04":
            $bln = 'April';
            break;
        case "05":
            $bln = 'Mei';
            break;
        case "06":
            $bln = 'Juni';
            break;
        case "07":
            $bln = 'Juli';
            break;
        case "08":
            $bln = 'Agustus';
            break;
        case "09":
            $bln = 'September';
            break;
        case "10":
            $bln = 'Oktober';
            break;
        case "11":
            $bln = 'November';
            break;
        case "12":
            $bln = 'Desember';
            break;
    }
    return $bln;
}
function hari($tgl)
{
    $dayList = array(
        'Sun' => 'Ahad',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    $hari = date('D', strtotime($tgl));
    return $dayList[$hari];
}
function addTgl($date)
{
    $date = new DateTime($date);
    $date = $date->modify('+1 day');
    return $date->format('d-m-Y');
}
function loop_tanggal($begin, $end)
{
    $begin = new DateTime($begin);
    $end = new DateTime($end);
    $end = $end->modify('+1 day');

    $interval = new DateInterval('P1D');
    $daterange = new DatePeriod($begin, $interval, $end);

    return $daterange;
}
function getLastDate($bulan){
    $tgl_terakhir = date('m-t', strtotime(date("Y-".$bulan."-d")));
    return date('Y-'.$tgl_terakhir);
}
function ddBulan()
{
    foreach (arrBulan() as $key => $val) {
        $isi[$key] = $val;
    }
    return $isi;
}
function getSetting($id, $column = 'value')
{
    $db = \Config\Database::connect();
    $query = $db->query("SELECT $column FROM setting WHERE id = '$id'");
    if ($query->getNumRows() !== 0) {
        return $query->getRow()->{$column};
    } else {
        return false;
    }
}
function statusPosting($s){
    $stts = null;
    switch($s){
        case '1' :
                $stts = '<h5><span class="right badge text-info">Editor</span></h5>';
            break;
        case '2' :
                $stts = '<h5><span class="right badge text-info">Approved Editor</span></h5>';
            break;
        case '3' :
                $stts = '<h5><span class="right badge text-danger">Posting Ditolak</span></h5>';
            break;
        default:
                $stts = '<h5><span class="right badge text-success">Approved</span></h5>';
            break;
    }
    return $stts;
}
function skpd()
{
    $db = \Config\Database::connect();
    $query = $db->query('SELECT * FROM skpd');
    if ($query->getNumRows() !== 0) {
        foreach ($query->getResult() as $row) {
            $isi[$row->id] = $row->nama;
        }
    } else {
        $isi[''] = "Tidak Ada Data";
    }
    return $isi;
}


function getTableLike(String $table, String $field, String $data) {
    $db = db_connect();
    return $db->table($table)->like($field, $data)->get();
}

function getTimById($jabatan, $id) {
    $db = db_connect();
    return $db->table('tim t')->select('t.*')->join('users u', "u.id = t.$jabatan")->where($jabatan, $id)->get()->getRow();
}

function getKriteriaById($id) {
    $db = db_connect();
    return $db->table('kriteria')->where('id', $id)->get()->getRow();
}

function getIdPemainByPosisi($posisi) {
    $db = db_connect();
    $result = $db->table('pemain')->where('id_posisi', $posisi)->get()->getResult();
    if (count($result) == 0) {
        return [null];
    }
    foreach ($result as $row) {
        $ids[] = $row->id;
    }
    return $ids;
}

function getPemainById($id) {
    $db = db_connect();
    return $db->table('pemain')->getWhere(['id'=>$id])->getRow();
}

function getAspek() {
    $db = db_connect();
    return $db->table('aspek')->get()->getResult();
}