<?php
include "../connection.php";
$id = $_GET['id'];
mysqli_query($con, "DELETE FROM mahasiswa WHERE id=$id");
header("Location:../admin/?page=mahasiswa-show");
