<?php if ($cek) : ?>
    Data Telah Dihitung
<?php else : ?>
    <form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center" rowspan="2">#</th>
                        <th scope="col" class="align-middle text-center" rowspan="2">Nama</th>
                        <th scope="col" class="text-center" colspan="<?= count($kriteria) ?>">Kriteria</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriteria as $row) : ?>
                            <th scope="col"><?= $row->id_posisi . ' ' . strtoupper($row->kriteria_penilaian) ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($pemain as $key => $row) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $no++ ?></th>
                            <td><?= $row->nama ?></td>
                            <?php foreach ($kriteria as $key2 => $val) : ?>
                                <td>
                                    <?php $n = $key . $key2 ?>
                                    <select class="custom-select nilai" name="<?= "nilai$n" ?>">
                                        <option value="<?= "1" ?>">Buruk</option>
                                        <option value="<?= "2" ?>">Cukup</option>
                                        <option value="<?= "3" ?>">Baik</option>
                                        <option value="<?= "4" ?>">Sangat Baik</option>
                                    </select>
                                    <input type="hidden" value="<?= $val->id_aspek ?>" name="<?= "id_aspek$n" ?>">
                                    <input type="hidden" value="<?= $val->id ?>" name="<?= "id_kriteria$n" ?>">
                                    <input type="hidden" value="<?= $row->id_posisi ?>" name="<?= "id_posisi$n" ?>">
                                    <input type="hidden" value="<?= $row->id ?>" name="<?= "id_pemain$n" ?>">
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
                url: location.origin + '/Nilai_gap/saveGap',
                data: $(this).serialize(),
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    Swal.fire({
                        title: res.title,
                        html: res.text,
                        icon: res.type
                    }).then((result) => {
                        window.location.replace(window.location.href)
                    })
                }
            })
        })
    </script>
<?php endif ?>