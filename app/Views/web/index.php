<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="molihito-stunting.bolmutkab.go.id - <?= isset($title) ? $title : 'Situs Informasi Terkait Stunting PEMKAB Bolaang Mongondow Utara' ?>" name="title">
    <meta content="<?= isset($item->tags) ? $item->tags : 'bolmut, bolaang mongondow utara, sulawesi utara, Stunting' ?>" name="keywords">
    <meta content="<?= isset($item->body) ? substr(strip_tags($item->body), 0, 50) : 'Situs Resmi Pemerintah Kabupaten Bolaang Mongondow Utara' ?>" name="description">
    <meta content="molihito-stunting.bolmutkab.go.id - <?= isset($title) ? $title : 'Situs Informasi Terkait Stunting PEMKAB Bolaang Mongondow Utara' ?>" property="og:title" />
    <meta content="news" property="og:type" />
    <meta content="<?= isset($item->sumber) ? site_url("img_mediums/" . $item->sumber) : base_url('assets/dist/img/lbmu.png'); ?>" property="og:image" />
    <!-- meta character set -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/dist/img/lbmu.png')  ?>" />


    <title><?= $title ?></title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animation on scroll -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom1.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/masonry.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.scss') ?>" />

</head>

<body>

    <!-- /.navbar -->
    <?= $this->include('web/template/_navbar') ?>
    <!-- navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div style="min-height: 80vh;">
        <?= $this->renderSection('page-content') ?>
    </div>
    <!-- /.content-wrapper -->
    <!-- footer -->
    <section class="mt-2 " style="background-color: rgb(24, 24, 24) ;">
        <div class="container py-3 text-light">
            <div class="d-flex justify-content-between">
                <div class="text-uppercase">
                    &copy; pemkabbolmut 2022
                </div>
                <div class="text-uppercase">
                    mairu molihuto stunting
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <!-- chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- liightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- masonry -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <!-- fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <!-- Aos animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <?php if (isset($statistikJS)) : ?>
        <script src="<?= base_url('assets/dist/js/statistik.js') ?>"></script>
    <?php endif ?>

    <script src="<?= base_url('assets/dist/js/customjs.js') ?>"></script>

    <!-- JS custom -->
</body>

</html>