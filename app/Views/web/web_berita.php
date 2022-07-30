<?= $this->extend('web/index'); ?>
<?php use CodeIgniter\I18n\Time; ?>
<?= $this->section('page-content'); ?>

<!--Main layout-->
<main class="my-5">
    <div class="container">
        <!--Section: Content-->
        <section class="text-center">
            <?php if (empty($items)) : ?>
                <div class="col-12">
                    <h1 class="text-center mt-5">Data Kosong</h1>
                </div>
            <?php else : ?>
                <h4 class="mb-5"><strong>Berita Terbaru</strong></h4>

                <?php foreach ($items as $item) : ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <img src="<?= site_url("img_thumbs/" . $item->gambar) ?>" width="300" height="185" alt="">
                            </div>
                            <div class="col-md-8 col-sm-12 text-start">
                                <div class="fw-bolder">
                                    <?= strtoupper($item->alias) ?> . <small class="text-muted"><?= Time::parse($item->tanggal)->humanize() ?></small>
                                </div>
                                <div class="my-3">
                                    <h5><a class="text-decoration-none" href="<?= site_url("web/detail_b/$item->id") ?>"><?= $item->judul ?></a></h5>
                                </div>
                                <div class="lh-sm" style="text-align: justify;">
                                    <p><?= substr(strip_tags($item->body), 0, 300) ?>...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                <?php endforeach ?>
            <?php endif ?>
        </section>
        <!--Section: Content-->
        
        <!--Pagination-->
        <?= $pager->links('berita', 'berita_pagination') ?>
        <!--End Pagination-->
    </div>
</main>
<!--Main layout-->

<?= $this->endSection(); ?>