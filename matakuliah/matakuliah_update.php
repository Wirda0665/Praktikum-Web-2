<?php
if (isset($_POST['update'])) {
    // Validasi ID
    $id = (int)$_POST['id'];
    if ($id <= 0) {
        die("ID tidak valid");
    }

    // Escape input data
    $kode = mysqli_real_escape_string($con, $_POST['kode']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $sks = (int)$_POST['sks'];
    $semester = (int)$_POST['semester'];

    // Validasi input
    if (empty($kode) || empty($nama) || $sks < 1 || $sks > 6 || $semester < 1 || $semester > 8) {
        die("Data tidak valid");
    }

    // Update data dengan prepared statement
    $stmt = mysqli_prepare($con, "UPDATE matakuliah SET kode=?, nama=?, sks=?, semester=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssiii", $kode, $nama, $sks, $semester, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['success_message'] = "Data matakuliah berhasil diperbarui";
    } else {
        $_SESSION['error_message'] = "Gagal memperbarui data: " . mysqli_error($con);
    }

    // Redirect ke halaman tampil data
    header("Location: ?page=matakuliah-show");
    exit();
}
