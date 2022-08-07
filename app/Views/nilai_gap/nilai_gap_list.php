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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                Nilai
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" data-toggle="table" data-ajax="ajaxNilaiBobot" data-side-pagination="server" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
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

            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>