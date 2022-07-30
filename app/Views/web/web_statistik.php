<?= $this->extend('web/index'); ?>
<?php $session = \Config\Services::session(); ?>
<?= $this->section('page-content'); ?>

<section class="py-5">
    <div class="container">
        <!-- Gallery -->
        <canvas id="myChart" style="height: 100px;"></canvas>
        <!-- <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 offset-lg-4">
                <canvas id="myChart" style="height: 900px;"></canvas>
            </div>
        </div> -->
        <!-- Gallery -->
    </div>
</section>

<?= $this->endSection(); ?>