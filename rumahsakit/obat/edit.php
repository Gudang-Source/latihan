<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Obat</h1>
    <h4>
        <small>Edit Data Obat</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_assoc($sql_obat);

            ?>
            <form action="proses.php" method="post">
                <input value="<?= $data['id_obat']; ?>" type="hidden" name="id">
                <div class="form-group">
                    <label for="nama">Nama Obat</label>
                    <input value="<?= $data['nama_obat']; ?>" type="text" name="nama" id="nama" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan Obat</label>
                    <textarea name="ket" id="ket" cols="30" rows="7" class="form-control" required><?= $data['ket_obat']; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success pull-right"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php');
