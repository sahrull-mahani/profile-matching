<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <input type="text" class="form-control text-center text-capitalize judul" id="judul" name="judul[]" value="<?= (isset($get->judul)) ? $get->judul : ''; ?>" placeholder="Judul" required />
    </div>
</div>
<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <textarea class="textarea" name="inovasi[]" id="inovasi" cols="30" rows="70" placeholder="Jelaskan Secara Singkat Inovasi Anda..." required><?= (isset($get->inovasi)) ? $get->inovasi : ''; ?></textarea>
    </div>
</div>
<small class="text-danger mt-0 ml-2 mb-2 d-block"></small>
<div class="form-group row mode2">
    <div class="col-sm-12 item">
        <input type="file" class="file-input-<?= (isset($get->id)) ? $get->id : ''; ?>" name="pdf[]" required accept="application/pdf,application/vnd.ms-excel">
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />
<input type="hidden" name="old_file[]" value="<?= (isset($get->pdf)) ? $get->pdf : ''; ?>" />

<script>
    var max = 350
    $('.textarea').summernote({
        height: 100,
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
            ['font', ['fontname', 'fontsize', 'fontsizeunit', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['color', ['color']],
        ],
        callbacks: {
            onKeydown: function(e) {
                var t = e.currentTarget.innerText;
                if (t.trim().length > max) {
                    $(this).parent().parent().next().html('Maksimal 350 Karakter')
                    //delete keys, arrow keys, copy, cut, select all
                    if (e.keyCode != 8 && !(e.keyCode >= 37 && e.keyCode <= 40) && e.keyCode != 46 && !(e.keyCode == 88 && e.ctrlKey) && !(e.keyCode == 67 && e.ctrlKey) && !(e.keyCode == 65 && e.ctrlKey))
                        e.preventDefault();
                } else {
                    $(this).parent().parent().next().html('')
                }
            },
            onKeyup: function(e) {
                var t = e.currentTarget.innerText;
                $(this).text(max - t.trim().length);
            },
            onPaste: function(e) {
                var t = e.currentTarget.innerText;
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                var maxPaste = bufferText.length;
                if (t.length + bufferText.length > max) {
                    maxPaste = max - t.length;
                    $(this).parent().parent().next().html('Maksimal 350 Karakter')
                }
                if (maxPaste > 0) {
                    document.execCommand('insertText', false, bufferText.substring(0, maxPaste));
                }
                $(this).text(max - t.length);
            }
        },
    })

    <?php if (isset($get->id)) : ?>
        $(".file-input-<?= $get->id ?>").fileinput({
            'dropZoneEnabled': false,
            'showUpload': false,
            'showUpload': false,
            'showCancel': false,
            'browseOnZoneClick': true,
            'required': true,
            'browseLabel': 'Masukan File PDF',
            'browseIcon': '<i class="fa fa-file-pdf"></i>',
            'allowFieldExtensions': ['pdf'],
            'overwriteInitial': true,
            'initialPreviewAsData': false,
            'initialPreview': [
                '<embed src="' + location.origin + '/Inovasi/pdfViewer/<?= $get->id ?>' + '" width="100%" height="500" alt="pdf" class="kv-preview-data file-preview-image">'
            ],
            'initialPreviewConfig': [{
                caption: '<?= $get->judul ?>',
                description: '<p><?= substr(strip_tags($get->inovasi), 0, 10) ?></p>'
            }]
        })
    <?php else : ?>
        $(".file-input-").fileinput({
            'dropZoneEnabled': false,
            'showUpload': false,
            'showCancel': false,
            'required': true,
            'browseLabel': 'Masukan File PDF',
            'browseIcon': '<i class="fa fa-file-pdf"></i>',
            'overwriteInitial': true,
        })
    <?php endif ?>
</script>