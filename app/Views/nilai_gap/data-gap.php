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
                    <?php for ($i = 1; $i <= count($kriteria); $i++) : ?>
                        <td>
                            <select class="custom-select nilai" name="<?= "nilai$i" ?>">
                                <option value="1">Buruk</option>
                                <option value="2">Cukup</option>
                                <option value="3">Baik</option>
                                <option value="4">Sangat Baik</option>
                            </select>
                        </td>
                    <?php endfor ?>
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