<?= $this->extend("template_adminlte/index") ?>

<?= $this->section("page-content") ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $breadcome ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $breadcome ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Action
                        </div>
                        <div class="card-body">
                            <?php if (count($action) > 0) : ?>
                                <?php foreach ($action as $key => $row) : ?>
                                    <a href="<? //= site_url("nilai_gap/recount/$row->aspek_id/$row->posisi_id") 
                                                ?>" class="btn btn-danger my-1 hitung-ulang">Hitung Ulang <? //= ucwords($row->aspek_penilaian) . " [$row->nama_posisi]" 
                                                                                                            ?></a>
                                <?php endforeach ?>
                            <?php else : ?>
                                <h6>Data Belum Diisi!</h6>
                            <?php endif ?>
                        </div>
                    </div>
                </div> -->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Action</div>
                        <div class="card-body">
                            <?php if (count($action) > 0) : ?>
                                <?php foreach ($action as $key => $row) : ?>
                                    <?php if ($key > 0) break ?>
                                    <a href="<?= site_url('/nilai_gap/truncate_count') ?>" class="btn btn-danger my-1 hitung-ulang">Hitung Ulang<?= is_admin() ? ' [' . getTimById('pelatih', $row->id_pelatih)->nama . ']' : '' ?></a>
                                <?php endforeach ?>
                            <?php else : ?>
                                <h6>Data Belum Diisi!</h6>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <select id="posisi" class="custom-select custom-select-sm">
                                        <option selected disabled>Pilih Posisi</option>
                                        <?php foreach ($posisi as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= ucwords($row->nama_posisi) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="aspek" class="custom-select custom-select-sm">
                                        <option selected disabled>Pilih Aspek</option>
                                        <?php foreach ($aspek as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= ucwords($row->aspek_penilaian) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="data-gap">Data Aspek Belum Dipilih</div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Konversi Nilai Bobot</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table1" data-toggle="table" data-ajax="ajaxNilaiBobot" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar1">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="id_pemain">Pemain</th>
                                        <th data-field="id_aspek">Aspek</th>
                                        <th data-field="id_kriteria">Kriteria</th>
                                        <th data-field="nilai_kriteria">Nilai Kriteria</th>
                                        <th data-field="nilai_bobot">Nilai Bobot</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-info collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Nilai Core Factor, Second Factor & Nilai Total</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table2" data-toggle="table" data-ajax="ajaxNilaiCfSF" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar2">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="aspek">Aspek</th>
                                        <th data-field="id_pemain">Pemain</th>
                                        <th data-field="core">Core</th>
                                        <th data-field="second">Second</th>
                                        <th data-field="total">Total</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Nilai Akhir</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="toolbar">
                                <select id="NAposisi" class="btn btn-primary">
                                    <?php foreach ($posisi as $row) : ?>
                                        <option value="<?= $row->id ?>"><?= ucwords($row->nama_posisi) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-ajax="ajaxNilaiAkhir" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar" data-query-params="NAkhir">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="id_pemain">Pemain</th>
                                        <th data-field="posisi">Posisi</th>
                                        <th data-field="hasil">Hasil Akhir</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-success collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Penentu Posisi</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" data-toggle="table" data-ajax="ajaxPenentuPosisi" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbarPenentuPosisi">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-visible="false">ID</th>
                                        <th data-field="nomor">No</th>
                                        <th data-field="id_pemain">Pemain</th>
                                        <th data-field="posisi">Posisi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>