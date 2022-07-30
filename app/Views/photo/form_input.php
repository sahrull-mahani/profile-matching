<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i></h5>
</div>
<div class="form-group row mode2 ">
    <div class="col-sm-12 item">
        <input type="text" class="form-control" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
</div>
<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <textarea type="text" class="form-control textarea" id="deskripsi" name="deskripsi[]" placeholder="Deskripsi" required><?= (isset($get->deskripsi)) ? $get->deskripsi : ''; ?></textarea>
    </div>
</div>

<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <input type="file" class="form-control file-input-<?= (isset($get->id)) ? $get->id : ''; ?>" id="sumber" name="sumber[]" accept="image/*">
    </div>
</div>

<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<input type="hidden" name="gambar_lama[]" value="<?= (isset($get->sumber)) ? $get->sumber : ''; ?>" />

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
                location.origin + '/Berita/img_thumb/<?= (isset($get->sumber)) ? $get->sumber : ''; ?>'
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
            ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'table']],
        ]
    })
</script>