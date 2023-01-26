<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="id_aspek" class="col-sm-3 col-form-label">Id Aspek</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="id_aspek" name="id_aspek[]" value="<?= (isset($get->id_aspek)) ? $get->id_aspek : ''; ?>" placeholder="Id Aspek" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="id_kriteria" class="col-sm-3 col-form-label">Id Kriteria</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="id_kriteria" name="id_kriteria[]" value="<?= (isset($get->id_kriteria)) ? $get->id_kriteria : ''; ?>" placeholder="Id Kriteria" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="id_posisi" class="col-sm-3 col-form-label">Id Posisi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="id_posisi" name="id_posisi[]" value="<?= (isset($get->id_posisi)) ? $get->id_posisi : ''; ?>" placeholder="Id Posisi" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="id_pemain" class="col-sm-3 col-form-label">Id Pemain</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="id_pemain" name="id_pemain[]" value="<?= (isset($get->id_pemain)) ? $get->id_pemain : ''; ?>" placeholder="Id Pemain" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="id_pelatih" class="col-sm-3 col-form-label">Id Pelatih</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="id_pelatih" name="id_pelatih[]" value="<?= (isset($get->id_pelatih)) ? $get->id_pelatih : ''; ?>" placeholder="Id Pelatih" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="nilai_kriteria" class="col-sm-3 col-form-label">Nilai Kriteria</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nilai_kriteria" name="nilai_kriteria[]" value="<?= (isset($get->nilai_kriteria)) ? $get->nilai_kriteria : ''; ?>" placeholder="Nilai Kriteria" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />