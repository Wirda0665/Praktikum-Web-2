<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Praktikum Web 2</title>
    <style>
        body {
            margin-bottom: 6em;
        }

        * {
            font-size: 14px;
        }

        footer {
            position: fixed;
            /* height: 100px; */
            bottom: 0;
            width: 100%;
            background: #198754;
            padding: 10px 0;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            letter-spacing: 1.5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h3 class="mt-4 mb-4">Aplikasi Data Mahasiswa</h3>
        <div class="row">
            <div class="col-md-3 col-12 mb-4">
                <?php include 'nav.php'; ?>
            </div>

            <div class="col-md-9 col-12">
                <?php include '../connection.php'; ?>
                <?php

                error_reporting(0);
                switch ($_GET['page']) {

                    default:
                        include "dashboard.php";
                        break;

                    case "dashboard";
                        include "dashboard.php";
                        break;

                    // mahasiswa    
                    case "mahasiswa-show";
                        include "../mahasiswa/mahasiswa_show.php";
                        break;

                    case "mahasiswa-add";
                        include "../mahasiswa/mahasiswa_add.php";
                        break;

                    case "mahasiswa-edit";
                        include "../mahasiswa/mahasiswa_edit.php";
                        break;

                    case "mahasiswa-delete";
                        include "../mahasiswa/mahasiswa_delete.php.php";
                        break;

                    case "mahasiswa-update";
                        include "../mahasiswa/mahasiswa_update.php";
                        break;

                    // user  
                    case "user-add";
                        include "../user/user_add.php";
                        break;
                    case "user-show";
                        include "../user/user_show.php";
                        break;
                    case "user-edit";
                        include "../user/user_edit.php";
                        break;
                    case "user-update";
                        include "../user/user_update.php";
                        break;
                }

                ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="container ">
            <span>&copy; <?php echo date('Y'); ?> - FTI UNISKA</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>