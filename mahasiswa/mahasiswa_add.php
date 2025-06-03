<?php
if (isset($_POST['Submit'])) {
    $nim      = $_POST['nim'];
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $jk       = $_POST['jenis_kelamin'];
    $email    = $_POST['email'];
    $telepon  = $_POST['telepon'];

    $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,alamat,jenis_kelamin,email,telepon) 
    VALUES('$nim','$nama','$alamat','$jk','$email','$telepon')");

    header("Location:?page=mahasiswa-show");
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Mahasiswa</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="?page=mahasiswa-add" class="form-horizontal">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option disabled selected>Pilih</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telepon">Telepon</label>
                            <input type="number" class="form-control" name="telepon" required>
                        </div>
                    </div>

                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>