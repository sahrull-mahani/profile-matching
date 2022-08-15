<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="nama" name="nama[]" value="<?= (isset($get->nama)) ? $get->nama : ''; ?>" placeholder="Nama" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="thn_didirikan" class="col-sm-3 col-form-label">Tahun Didirikan</label>
    <div class="col-sm-9 item">
        <input type="number" class="form-control" min="1900" max="<?= date('Y') ?>" id="thn_didirikan" name="thn_didirikan[]" value="<?= (isset($get->thn_didirikan)) ? $get->thn_didirikan : ''; ?>" placeholder="1900" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="no_telp" class="col-sm-3 col-form-label">No Telp</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="no_telp" name="no_telp[]" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="15" value="<?= (isset($get->no_telp)) ? $get->no_telp : ''; ?>" placeholder="No Telp" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alamat" name="alamat[]" value="<?= (isset($get->alamat)) ? $get->alamat : ''; ?>" placeholder="Alamat" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="formasi" class="col-sm-3 col-form-label">Formasi</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="formasi" name="formasi[]" value="<?= (isset($get->formasi)) ? $get->formasi : ''; ?>" placeholder="Formasi" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="pelatih" class="col-sm-3 col-form-label">Pelatih</label>
    <div class="col-sm-9 item">
        <select class="custom-select" id="pelatih" name="pelatih[]">
            <option selected disabled>Pilih Pelatih...</option>
            <?php foreach ($pelatih as $row) : ?>
                <option value="<?= $row->user_id ?>" <?= (isset($get->pelatih)) ? ($get->pelatih == $row->user_id ? 'selected' : '') : ''; ?>><?= $row->nama_user ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group row mode2">
    <label for="manager" class="col-sm-3 col-form-label">Manager</label>
    <div class="col-sm-9 item">
        <select class="custom-select" id="manager" name="manager[]">
            <option selected disabled>Pilih Manager...</option>
            <?php foreach ($manager as $row) : ?>
                <option value="<?= $row->user_id ?>" <?= (isset($get->manager)) ? ($get->manager == $row->user_id ? 'selected' : '') : ''; ?>><?= $row->nama_user ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<script>
    let date = new Date()
    $("input[type=number]").on('keyup', function(e) {
        if (this.value < 1900) {
            $(this).val(1900)
        } else if (this.value > date.getFullYear()) {
            $(this).val(date.getFullYear())
        }
    })
</script>