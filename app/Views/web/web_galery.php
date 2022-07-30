<?= $this->extend('web/index'); ?>
<?= $this->section('page-content'); ?>

<div class="kontainer">
    <h1 class="text-center">Gallery</h1>
    <div class="baris">
        <?php foreach ($items as $keys => $item) : ?>
            <div class="item">
                <img src="<?= site_url("img_mediums/" . $item->sumber) ?>" alt="" />
                <a href="<?= site_url("img_mediums/" . $item->sumber) ?>" data-lightbox="image-1" data-title="<?= strip_tags($item->deskripsi) ?>" class="text-decoration-none text-white">
                    <div class="content">
                        <p><i class="fa-solid fa-eye"></i></p>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection(); ?>