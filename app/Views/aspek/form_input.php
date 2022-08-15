<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="aspek_penilaian" class="col-sm-3 col-form-label">Aspek Penilaian</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="aspek_penilaian" name="aspek_penilaian[]" value="<?= (isset($get->aspek_penilaian)) ? $get->aspek_penilaian : ''; ?>" placeholder="Aspek Penilaian" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="persentase" class="col-sm-3 col-form-label">Persentase</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" max="100" maxlength="3" id="persentase" name="persentase[]" value="<?= (isset($get->persentase)) ? $get->persentase : ''; ?>" placeholder="..%" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="core" class="col-sm-3 col-form-label">Core</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" max="100" maxlength="3" id="core" name="core[]" value="<?= (isset($get->core)) ? $get->core : ''; ?>" placeholder="Core %" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="secondary" class="col-sm-3 col-form-label">Secondary</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="0" max="100" maxlength="3" id="secondary" name="secondary[]" value="<?= (isset($get->secondary)) ? $get->secondary : ''; ?>" placeholder="Secondary %" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />