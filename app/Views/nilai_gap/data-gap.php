<form>
    <div class="table-responsive">
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
                <?php foreach ($pemain as $p) : ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= ucwords($p->nama) ?></td>
                        <?php foreach ($kriteria as $key => $row) : ?>
                            <td>
                                <?= $row->id_posisi ?>
                                <select class="custom-select nilai" name="<?= "nilai$key" ?>">
                                    <option value="<?= "1|$row->id|$p->id|$row->id_posisi" ?>">Buruk</option>
                                    <option value="<?= "2|$row->id|$p->id|$row->id_posisi" ?>">Cukup</option>
                                    <option value="<?= "3|$row->id|$p->id|$row->id_posisi" ?>">Baik</option>
                                    <option value="<?= "4|$row->id|$p->id|$row->id_posisi" ?>">Sangat Baik</option>
                                </select>
                            </td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary float-right simpan"><i class="fa fa-save"></i> | Simpan</button>
</form>
<script>
    $('form').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: location.origin + '/Nilai_gap/simpanGap',
            type: 'post',
            data: {
                data: $(this).serialize(),
                id_aspek: <?= $aspek ?>,
                id_posisi: <?= $posisi ?>,
            },
            success: function(res) {
                // console.log(res)
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