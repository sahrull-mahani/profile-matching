<div class="alert alert-info alert-dismissible  text-center">
    <h5><i class="icon fas fa-info"></i> <?= $nama ?></h5>
</div>
<div class="form-group row mode2">
    <label for="id_aspek" class="col-sm-3 col-form-label">Aspek</label>
    <div class="col-sm-9 item">
        <select class="custom-select" id="id_aspek" name="id_aspek[]">
            <option selected disabled>Pilih Aspek...</option>
            <?php foreach ($aspek as $row) : ?>
                <option value="<?= $row->id ?>" <?= (isset($get->id_aspek)) ? ($get->id_aspek == $row->id ? 'selected' : '') : ''; ?>><?= $row->aspek_penilaian ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group row mode2">
    <label for="kriteria_penilaian" class="col-sm-3 col-form-label">Kriteria Penilaian</label>
    <div class="col-sm-9 item">
        <input type="text" class="form-control" id="kriteria_penilaian" name="kriteria_penilaian[]" value="<?= (isset($get->kriteria_penilaian)) ? $get->kriteria_penilaian : ''; ?>" placeholder="Kriteria Penilaian" required />
    </div>
</div>
<!-- <div class="form-group row mode2">
    <label for="target" class="col-sm-3 col-form-label">Target</label>
    <div class="col-sm-9 item">
        <?php $defaults = array('' => '==Pilih Target==');
        $options = array(
            '1' => 'kurang',
            '2' => 'cukup',
            '3' => 'baik',
            '4' => 'sangat baik',
        );
        echo form_dropdown('target[]', $defaults + $options, (isset($get->target)) ? $get->target : '', 'class="custom-select" id="target" required');
        ?>
    </div>
</div> -->
<div class="form-group row mode2">
    <label for="type" class="col-sm-3 col-form-label">Type</label>
    <div class="col-sm-9 item">
        <?php $defaults = array('' => '==Pilih Type==');
        $options = array(
            'core' => 'core',
            'secondary' => 'secondary',
        );
        echo form_dropdown('type[]', $defaults + $options, (isset($get->type)) ? $get->type : '', 'class="custom-select" id="type" required');
        ?>
    </div>
</div>
<input type="hidden" name="id[]" value="<?= (isset($get->id)) ? $get->id : ''; ?>" />