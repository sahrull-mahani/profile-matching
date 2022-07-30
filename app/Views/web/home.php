<?= $this->extend('web/index'); ?>
<?php

use CodeIgniter\I18n\Time; ?>

<?= $this->section('page-content'); ?>

<!-- Banner -->
<section class="d-none d-sm-block">
    <div class="container-fluid paksa">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row p-0">
                        <div class="text-center align-items-center">
                            <img class="img-fluid" src="assets/dist/img/banner1.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row p-0">
                        <div class="text-center align-items-center">
                            <img class="img-fluid" src="assets/dist/img/banner2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row p-0">
                        <div class="text-center align-items-center">
                            <img class="img-fluid" src="assets/dist/img/banner3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- endBanner -->

<!-- info program  -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h2>Info program</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-lg-6 col-sm-12 pe-5">
                <img src="<?= base_url('assets/dist/img/stunting01.jpg'); ?>" class="img-fluid" width="600px" alt="">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 mt-3">
                <blockquote class="quote-box px-3">
                    <p class="quotation-mark">
                        “
                    </p>
                    <p class="quote-text">
                        Mairu : merupakan kata ajakan/mengajak dalam bahasa daerah bolaang mongondow utara
                    </p>
                </blockquote>
                <blockquote class="quote-box px-3">
                    <p class="quotation-mark">
                        “
                    </p>
                    <p class="quote-text">
                        Molihuto : merupakan kata ajakan/mengajak dalam bahasa daerah bolaang mongondow utara
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
</section>
<!-- endinfo program -->

<!-- Berita -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h2>Berita Terbaru</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-end align-text-center">
                <a href="">selengkapnya</a>
            </div>
        </div>
        <div class="row mt-3">
            <?php if (empty($items)) : ?>
                <div class="col-12">
                    <h1 class="text-center mt-5">Data Kosong</h1>
                </div>
            <?php else : ?>
                <?php foreach ($items as $key => $item) : ?>
                    <div class="col-md-4 col-lg-4 <?= $key > 1 ? 'col-sm-12' : 'col-sm-6' ?> my-3">
                        <div class="mb-3 align-content-center">
                            <img src="<?= site_url("img_thumbs/" . $item->gambar) ?>" width="100%" height="185" alt="">
                        </div>
                        <div class="text-muted mb-2">
                            <?= strtoupper($item->alias) ?> . <?= Time::parse($item->tanggal)->humanize() ?>
                        </div>
                        <div class="lh-sm fw-bolder">
                            <a class="text-decoration-none link" href="<?= site_url("web/detail_b/$item->id") ?>"><?= $item->judul ?></a>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- endBerita -->

<!-- Foto -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <h2>Foto Terbaru</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-end align-text-center">
                <a href="web/galery">selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-2">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="row p-5">
                            <div class="text-center align-items-center">
                                <?php if (empty($photos)) : ?>
                                    <div class="col-12">
                                        <h1 class="text-center mt-5">Data Kosong</h1>
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($photos as $key => $item) : ?>
                                        <figure class="figure px-5">
                                            <a href="<?= site_url("img_mediums/" . $item->sumber) ?>" data-lightbox="image-1" data-title="<?= strip_tags($item->deskripsi) ?>" class="galery-cover">
                                                <img src="<?= site_url("img_mediums/" . $item->sumber) ?>" class="w-100 shadow-1-strong rounded mb-4" alt="<?= $item->judul ?>" />
                                            </a>
                                        </figure>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="row p-5">
                            <div class="text-center align-items-center">
                                <?php if (empty($photos2)) : ?>
                                    <div class="col-12">
                                        <h1 class="text-center mt-5">Data Kosong</h1>
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($photos2 as $key => $item) : ?>
                                        <figure class="figure px-5">
                                            <a href="<?= site_url("img_mediums/" . $item->sumber) ?>" data-lightbox="image-1" data-title="<?= strip_tags($item->deskripsi) ?>" class="galery-cover">
                                                <img src="<?= site_url("img_mediums/" . $item->sumber) ?>" class="w-100 shadow-1-strong rounded mb-4" alt="<?= $item->judul ?>" />
                                            </a>
                                        </figure>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="row p-5">
                            <div class="text-center align-items-center">
                                <?php if (empty($photos3)) : ?>
                                    <div class="col-12">
                                        <h1 class="text-center mt-5">Data Kosong</h1>
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($photos3 as $key => $item) : ?>
                                        <figure class="figure px-5">
                                            <a href="<?= site_url("img_mediums/" . $item->sumber) ?>" data-lightbox="image-1" data-title="<?= strip_tags($item->deskripsi) ?>" class="galery-cover">
                                                <img src="<?= site_url("img_mediums/" . $item->sumber) ?>" class="w-100 shadow-1-strong rounded mb-4" alt="<?= $item->judul ?>" />
                                            </a>
                                        </figure>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <i class="fa fa-circle-arrow-left fa-2x text-dark"></i>
                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span> -->
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <i class="fa fa-circle-arrow-right fa-2x text-dark"></i>
                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span> -->
            </button>
        </div>
    </div>
</section>
<!-- endFoto -->

<!-- Vidio -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h2>Vidio Terbaru</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-end align-text-center">
                <a href="web/berita">selengkapnya</a>
            </div>
        </div>
        <div class="row">
            <?php if (empty($videos)) : ?>
                <div class="col-12">
                    <h1 class="text-center mt-5">Data Kosong</h1>
                </div>
            <?php else : ?>
                <?php foreach ($videos as $item) : ?>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <section class="mt-5">
                            <div class="container img-cover rounded-3" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= ucwords($item->judul) ?>">
                                <img class="videoThumb rounded-3" width="100%" src="http://i1.ytimg.com/vi/<?= $item->link ?>/maxresdefault.jpg" data-bs-toggle="modal" data-bs-target="#example<?= $item->id ?>">
                            </div>
                        </section>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="example<?= $item->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="row mt-4 mr-5">
                            <div class="col-1 offset-11">
                                <span role="button" class="klos" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times text-white bg-danger rounded-circle" style="padding: 5px 8px; cursor: pointer;"></i></span>
                            </div>
                        </div>
                        <div class="modal-dialog modal-xl px-0">
                            <div class="modal-content">
                                <iframe src="https://youtube.com/embed/<?= $item->link ?>" class="rounded-top" frameborder="0" width="100%" height="400"></iframe>
                                <div class="bg-white rounded-bottom px-3">
                                    <p class="mt-3 mb-0"><i class="fa fa-user"></i>&nbsp; Uploader : <?= "$item->nama_user | <i class='fa fa-calendar-alt'></i>&nbsp; $item->updated_at"  ?></p>
                                    <hr class="hr">
                                    <div class=""><?= $item->deskripsi ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- endVidio -->

<?= $this->endSection(); ?>