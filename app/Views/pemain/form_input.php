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
        <textarea name="alamat[]" id="alamat" cols="30" rows="10" class="textarea" placeholder="Masukan alamat pemain..."><?= @$get->alamat ?></textarea>
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
    $('.textarea').summernote({
        inheritPlaceholder: true,
        disableDragAndDrop: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        tabDisable: true,
        popover: {
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
            ]
        },
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline']],
            // ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
            // ['para', ['ul', 'ol', 'paragraph', 'table']],
        ]
    })
</script>