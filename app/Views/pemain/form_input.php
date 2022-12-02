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
    <label for="posisi" class="col-sm-3 col-form-label">Posisi</label>
    <div class="col-sm-9 item">
        <select class="custom-select" id="posisi" name="posisi[]">
            <option selected disabled>Pilih Posisi...</option>
            <?php foreach ($posisi as $row) : ?>
                <option value="<?= $row->id ?>" <?= (isset($get->id_posisi)) ? ($get->id_posisi == $row->id ? 'selected' : '') : ''; ?>><?= $row->nama_posisi ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<?php if (is_admin()) : ?>
    <div class="form-group row mode2">
        <label for="tim" class="col-sm-3 col-form-label">Tim</label>
        <div class="col-sm-9 item">
            <select class="custom-select" id="tim" name="tim[]">
                <option selected disabled>Pilih Tim...</option>
                <?php foreach ($tim as $row) : ?>
                    <option value="<?= $row->id ?>" <?= (isset($get->id_tim)) ? ($get->id_tim == $row->id ? 'selected' : '') : ''; ?>><?= $row->nama ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
<?php endif ?>
<div class="form-group row mode2">
    <label for="ttl" class="col-sm-3 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-9 item">
        <input type="date" class="form-control datepicker" id="ttl" name="ttl[]" value="<?= (isset($get->ttl)) ? date('Y-m-d', strtotime($get->ttl)) : '' ?>" placeholder="Ttl" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="no_hp" class="col-sm-3 col-form-label">No Handphone</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="no_hp" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="15" name="no_hp[]" value="<?= @$get->no_hp ?>" placeholder="08xxxxx" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="alamat" name="alamat[]" value="<?= @$get->no_hp ?>" placeholder="Contoh : Jln. Rajawali No. 120" required />
    </div>
</div>
<div class="form-group row mode2">
    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
    <div class="col-sm-9 item">
        <input type="file" class="form-control file-input-<?= (isset($get->id)) ? $get->id : ''; ?>" id="foto" name="foto[]" accept="image/*">
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<input type="hidden" name="gambar_lama[]" value="<?= (isset($get->foto)) ? $get->foto : ''; ?>" />
<script>
    <?php if (isset($get->id)) : ?>
        $(".file-input-<?= $get->id ?>").fileinput({
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': false,
            'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true,
            'initialPreviewAsData': true,
            'initialPreview': [
                location.origin + '/Berita/img_thumb/<?= (isset($get->foto)) ? $get->foto : ''; ?>'
            ],
        })
    <?php else : ?>
        $(".file-input-").fileinput({
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': true,
            'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true
        })
    <?php endif ?>
</script>