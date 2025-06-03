<ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=dashboard">Dashboard</a></li>
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=mahasiswa-show">Data Mahasiswa</a></li>
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=mahasiswa-add">Tambah Data Mahasiswa</a></li>
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=matakuliah-show">Data Mata Kuliah</a></li>
    <?php
    //session_start();
    if ($_SESSION['username'] == 'admin') {
        echo '
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=user-show">Data User</a></li>
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="?page=user-add">Tambah Data User</a></li>
    ';
    }
    ?>
    <li class="list-group-item list-group-item-action"><a class="nav-link" href="logout.php">Logout</a></li>
</ul>