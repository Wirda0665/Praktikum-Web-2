<?php
include "../connection.php";

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error_message'] = "ID tidak valid";
    header("Location: ../admin/?page=matakuliah-show");
    exit();
}

$id = (int)$_GET['id'];

// Cek apakah data exist sebelum dihapus
$check = mysqli_query($con, "SELECT id FROM matakuliah WHERE id = $id");
if (mysqli_num_rows($check) == 0) {
    $_SESSION['error_message'] = "Data matakuliah tidak ditemukan";
    header("Location: ../admin/?page=matakuliah-show");
    exit();
}

// Lakukan penghapusan
$result = mysqli_query($con, "DELETE FROM matakuliah WHERE id = $id");

if ($result) {
    $_SESSION['success_message'] = "Data matakuliah berhasil dihapus";
} else {
    $_SESSION['error_message'] = "Gagal menghapus data: " . mysqli_error($con);
}

header("Location: ../admin/?page=matakuliah-show");
exit();
