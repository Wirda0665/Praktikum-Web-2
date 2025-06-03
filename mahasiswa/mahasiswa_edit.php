<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
    $nim = $data['nim'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $jk = $data['jenis_kelamin'];
    $email = $data['email'];
    $telepon = $data['telepon'];
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ubah Data Mahasiswa</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=mahasiswa-update">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option disabled>Pilih</option>
                            <option value="Pria" <?= $jk == "Pria" ? 'selected' : ''; ?>>Pria</option>
                            <option value="Wanita" <?= $jk == "Wanita" ? 'selected' : ''; ?>>Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $alamat; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $email; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="<?= $telepon; ?>" required>
                    </div>

                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                    <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>