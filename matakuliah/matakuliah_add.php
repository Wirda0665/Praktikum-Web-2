<?php
if (isset($_POST['Submit'])) {
    $kode      = $_POST['kode'];
    $nama      = $_POST['nama'];
    $sks       = $_POST['sks'];
    $semester  = $_POST['semester'];

    $result = mysqli_query($con, "INSERT INTO matakuliah(kode, nama, sks, semester) 
    VALUES('$kode','$nama','$sks','$semester')");

    header("Location:?page=matakuliah-show");
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Mata Kuliah</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="?page=matakuliah-add" class="form-horizontal">
                    <div class="form-group">
                        <label for="kode">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode" required maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Matakuliah</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sks">SKS</label>
                            <input type="number" class="form-control" name="sks" required min="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="semester">Semester</label>
                            <input type="number" class="form-control" name="semester" required min="1" max="8">
                        </div>
                    </div>

                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>