<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="selisih" class="col-sm-3 col-form-label">Nilai GAP</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="selisih" name="selisih[]" value="<?= (isset($get->selisih)) ? $get->selisih : ''; ?>" placeholder="Nialai Selisih.." required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="bobot_nilai" class="col-sm-3 col-form-label">Bobot Nilai</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="bobot_nilai" name="bobot_nilai[]" value="<?= (isset($get->bobot_nilai)) ? $get->bobot_nilai : ''; ?>" placeholder="Bobot nilai" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="ket" name="ket[]" value="<?= (isset($get->ket)) ? $get->ket : ''; ?>" placeholder="Keterangan..." required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />