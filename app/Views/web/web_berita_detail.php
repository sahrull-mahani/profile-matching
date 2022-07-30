<?= $this->extend('web/index'); ?>
<?= $this->section('page-content'); ?>

<!--Main layout-->
<main class="mt-4 mb-5">
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-9 mb-4">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <img src="<?= site_url("img_mediums/" . $item->gambar) ?>" class="img-fluid shadow-2-strong rounded-5 mb-4" alt="" />

                    <div class="row align-items-center mb-4">
                        <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg" class="rounded-5 shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                            <span> Published <u><?= $item->updated_at ?></u> by <?= strtoupper($item->alias) ?></span>
                        </div>

                        <div class="col-lg-6 text-center text-lg-end">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="vRy8PvQH"></script>

                            <div class="fb-share-button d-inline" data-layout="box_count" data-size="small">
                                <a target="_blank" class="btn btn-sm btn-primary me-1" data-href="http://<?= $_SERVER['SERVER_NAME'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="bagikan Di WhatsApp" style="background-color: #3b5998;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?= $_SERVER['SERVER_NAME'] . str_replace('/', '%2F', $_SERVER['REQUEST_URI']) ?>%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>

                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="bagikan Di Twitter" class="btn btn-sm btn-primary text-white" style="background-color: #55acee;" data-show-count="false">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a href="whatsapp://send?text=http://<?= $_SERVER['SERVER_NAME'] . str_replace('/', '%2F', $_SERVER['REQUEST_URI']) ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="bagikan Di WhatsApp" class="btn btn-sm btn-success text-white">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </section>
                <!--Section: Post data-mdb-->

                <!--Section: Text-->
                <section>
                    <p>
                        <?= $item->body ?>
                    </p>
                </section>
                <!--Section: Text-->

                <!--Section: Share buttons-->
                <section class="text-center border-top border-bottom py-4 mb-4">
                    <p><strong>Share with your friends:</strong></p>

                    <!-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&size=large&width=123&height=28&appId" width="123" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->

                    <!-- facebook -->
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="vRy8PvQH"></script>

                    <div class="fb-share-button d-inline" data-href="http://<?= $_SERVER['SERVER_NAME'] ?>" data-layout="box_count" data-size="small">
                        <a target="_blank" class="btn btn-primary me-1" style="background-color: #3b5998;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?= $_SERVER['SERVER_NAME'] . str_replace('/', '%2F', $_SERVER['REQUEST_URI']) ?>%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    <!-- end facebook -->

                    <!-- twitter -->
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" target="_blank" class="btn btn-primary text-white" style="background-color: #55acee;" data-show-count="false">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <!-- end twitter -->

                    <a href="whatsapp://send?text=http://<?= $_SERVER['SERVER_NAME'] . str_replace('/', '%2F', $_SERVER['REQUEST_URI']) ?>" class="btn btn-success text-white">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </section>
                <!--Section: Share buttons-->

                <section class="text-center border-bottom py-4 mb-4">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v14.0" nonce="dX52Eha1"></script>
                    <div class="fb-comments" data-href="https://facebook.com/<?= str_replace(' ', '-', strtolower($item->judul)) ?>" data-width="100%" data-numposts="5"></div>
                </section>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">
                <!--Section: Sidebar-->
                <div class="row sticky-top" style="top: 80px;">
                    <h2 class="mb-5">Berita Terbaru</h2>
                    <?php foreach ($items as $key => $list) : ?>
                        <?php if ($key === 0) : ?>
                            <img src="<?= site_url("img_mediums/" . $list->gambar) ?>" style="border-radius: 5% !important;" class="img-fluid shadow-1-strong rounded mb-2" alt="" />
                            <h5 class="text-center"><?= $list->judul ?></h5>

                            <p class="fs-6 mb-3 text-justify" style="text-align: justify">
                                <small>
                                    <?= substr(strip_tags($list->body), 0, 150) ?>... <a class="text-decoration-none" href="<?= site_url("web/detail_b/$list->id") ?>">Selengkapnya</a>
                                </small>
                            </p>
                            <hr>
                        <?php else : ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- <div class="col-4">
                                        <div class="bg-image hover-overlay ripple mb-4">
                                            <img src="<?= site_url("berita/img_thumb/" . $list->gambar) ?>" class="img-fluid shadow-1-strong rounded-start" alt="" />
                                        </div>
                                    </div> -->
                                    <div class="col">
                                        <p><?= $list->judul ?></p>

                                        <p class="fs-6 text-justify" style="text-align: justify">
                                            <small>
                                                <?= substr(strip_tags($list->body), 0, 100) ?>... <a class="text-decoration-none" href="<?= site_url("web/detail_b/$list->id") ?>">Selengkapnya</a>
                                            </small>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        <?php endif ?>
                    <?php endforeach ?>

                    <div class="col-md-12">
                        <!--Section: Video-->
                        <section class="text-center">
                            <h5 class="mb-4">Video Terbaru</h5>
                            <?php foreach ($videos as $item) : ?>
                                <div class="embed-responsive embed-responsive-16by9 shadow-4-strong">
                                    <iframe class="embed-responsive-item rounded-5" src="https://youtube.com/embed/<?= $item->link ?>" allowfullscreen></iframe>
                                </div>
                            <?php endforeach ?>
                        </section>
                        <!--Section: Video-->
                    </div>
                </div>
                <!--Section: Sidebar-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->

<?= $this->endSection(); ?>