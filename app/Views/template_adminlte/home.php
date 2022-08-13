<?= $this->extend('template_adminlte/index'); ?>
<?php $session = \Config\Services::session(); ?>
<?= $this->section('page-content'); ?>


<!-- Main content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($pemain); ?><sup style="font-size: 20px"></sup></h3>
                            <p>Pemain</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="<?= site_url('pemain'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= count($tim); ?><sup style="font-size: 20px"></sup></h3>
                            <p>Tim</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?= site_url('tim') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= count($aspek); ?></h3>
                            <p>Aspek</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-asterisk"></i>
                        </div>
                        <a href="<?= site_url('aspek'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($kriteria) ?></h3>
                            <p>Kriteria</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hashtag"></i>
                        </div>
                        <a href="<?= site_url('kriteria') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tentang Profile Matching</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body text-justify">
                    Profile Matching adalah sebuah mekanisme pengambilan keputusan dengan mengasumsikan bahwa terdapat tingkat variabel prediktor yang ideal yang harus dipenuhi oleh subyek yang diteliti, bukannya tingkat minimal yang harus dipenuhi atau dilewati. Contoh penerapnnya, seperti: evaluasi kinerja karyawan, penerimaan beasiswa, dan lainnya sebagainya. Dalam proses Profile Matching secara garis besar merupakan proses membandingkan antara nilai data aktual dari suatu profile yang akan dinilai dengan nilai profil yang diharapkan, sehingga dapat diketahui perbedaan kompetensinya (disebut juga GAP), semakin kecil GAP yang dihasilkan maka bobot nilainya semakin besar.
                </div>
            </div>

        </div>
    </section>

</div>
<!-- /.content -->
</div>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


<?= $this->endSection(); ?>