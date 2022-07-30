<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />

<h1 class="text-center text-capitalize"><?= $get->judul ?></h1>

<p><?= $get->inovasi ?></p>

<embed src="<?= base_url("Inovasi/pdfViewer/$get->id") ?>" width="100%" height="500" alt="pdf">