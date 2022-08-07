<form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <?php foreach ($kriteria as $row) : ?>
                    <th scope="col"><?= $row->kriteria_penilaian ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($pemain as $row) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= ucwords($row->nama) ?></td>
                    <?php foreach ($kriteria as $key => $row) : ?>
                        <td>
                            <select class="custom-select nilai" name="<?= "nilai$key" ?>">
                                <option value="<?= "1|$row->id" ?>">Buruk</option>
                                <option value="<?= "2|$row->id" ?>">Cukup</option>
                                <option value="<?= "3|$row->id" ?>">Baik</option>
                                <option value="<?= "4|$row->id" ?>">Sangat Baik</option>
                            </select>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> | Simpan</button>
</form>
<script>
    $('form').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: location.origin + '/Nilai_gap/simpanGap',
            type: 'post',
            data: {
                data: $(this).serialize(),
                id_aspek: <?= $aspek ?>
            },
            success: function(res) {
                let data = $.parseJSON(res)
                Swal.fire({
                    title: data.title,
                    html: data.text,
                    icon: data.type
                }).then((result) => {
                    window.location.replace(window.location.href)
                })
            }
        })
    })
</script>