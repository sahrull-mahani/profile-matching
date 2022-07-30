<?= $this->extend('web/index'); ?>
<?= $this->section('page-content'); ?>

<section>
    <div class="container py-5">

        <!-- Personal Cards </ul> -->
        <div class="card-category-5">
            <ul class="all-pr-cards">
                <?php foreach ($items as $item) : ?>
                    <li class="m-4">
                        <div class="per-card-2">
                            <div class="card-image">
                                <ul>
                                    <!-- <li><img src="https://www.dropbox.com/s/tcf4pyscta9pt13/jigneshpanchal.JPG?raw=1" /></li> -->
                                    <li>
                                        <div class="per-name">Berikut Inovasi Dari</div>
                                        <div class="per-position"><?= strtoupper($item->alias) ?></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <div class="card-text">
                                    <span><?= strip_tags(substr($item->inovasi, 0, 250)) ?> ...</span>
                                </div>

                                <div class="social-icons">
                                    <a class="btn d-block bg-inovasi text-white" href="<?= site_url("web/detail_i/$item->id") ?>">
                                        Readmore
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- Personal Cards </ul> -->

</section>

<?= $this->endSection(); ?>