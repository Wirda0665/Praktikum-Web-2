<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM matakuliah WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
    $kode = $data['kode'];
    $nama = $data['nama'];
    $sks = $data['sks'];
    $semester = $data['semester'];
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ubah Data Mata Kuliah</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=matakuliah-update">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

                    <div class="form-group">
                        <label>Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode" value="<?= $kode; ?>" required maxlength="10">
                    </div>

                    <div class="form-group">
                        <label>Nama Matakuliah</label>
                        <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>SKS</label>
                            <input type="number" class="form-control" name="sks" value="<?= $sks; ?>" required min="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Semester</label>
                            <input type="number" class="form-control" name="semester" value="<?= $semester; ?>" required min="1" max="8">
                        </div>
                    </div>

                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                    <input type="reset" class="btn btn-warning" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>