<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama_posisi" class="col-sm-3 col-form-label">Nama Posisi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama_posisi" name="nama_posisi[]" value="<?= (isset($get->nama_posisi)) ? $get->nama_posisi : ''; ?>" placeholder="Nama Posisi" required />
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />