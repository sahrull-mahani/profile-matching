<?php $segment = explode('/', $_SERVER['REQUEST_URI']) ?>

<!-- navbar -->
<section>
    <!-- Top navbar -->
    <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
        <div class="container justify-content-center">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <img src="<?= base_url('assets/dist/img/lbmu.png'); ?>" width="90" height="90" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <h3 class="bolder">Mairu Molihuto Stunting</h3>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 text-end">
                <img src="<?= base_url('assets/dist/img/lkemenkes.png'); ?>" width="150" height="70" alt="">
            </div>
        </div>
    </nav>
    <!-- endTop navbar -->
    <!-- Main navbar -->
    <nav class="navbar navbar-dark navbar-expand-md" style="background-color: #2E0249;">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-none" href="/">Mairu Molihuto Stunting</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center text-light " id="navbar">
                <ul class="navbar-nav ">
                    <li class="px-4 nav-item<?= end($segment) == '' ? ' bg-purple' : '' ?>"><a href="/" class="nav-link text-light ">Home</a></li>
                    <li class="px-4 nav-item<?= $title == 'Berita' ? ' bg-purple' : '' ?>"><a href="/web/berita" class="nav-link text-light">Berita</a></li>
                    <li class="px-4 nav-item<?= $title == 'Inovasi' ? ' bg-purple' : '' ?>"><a href="/web/inovasi" class="nav-link text-light">Inovasi</a></li>
                    <li class="px-4 nav-item<?= $title == 'Galery' ? ' bg-purple' : '' ?>"><a href="/web/galery" class="nav-link text-light">Galeri</a></li>
                    <li class="px-4 nav-item<?= $title == 'video' ? ' bg-purple' : '' ?>"><a href="/web/video" class="nav-link text-light">Video</a></li>
                    <li class="px-4 nav-item<?= $title == 'Statistik' ? ' bg-purple' : '' ?>"><a href="/web/statistik" class="nav-link text-light">Statistik</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- endMain navbar -->
</section>