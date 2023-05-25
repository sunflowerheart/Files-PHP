<?php

if ($_GET) {
    //variable penampung
    $databuku = $_GET['kodebuku'] 
        . "-" . $_GET['judulbuku']
        . "-" . $_GET['pengarang']
        . "-" . $_GET['penerbit']
        . "-" . $_GET['tahunterbit'];
    //simpan ke file
    $file_name = "perpustakaan.txt";
    if (file_put_contents($file_name, $databuku, FILE_APPEND) > 0) {
        echo "<h1>Data Berhasil Disimpan</h1>";
    } else {
        echo "data gagal disimpan";
    }

    echo '<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="tambah.php">ADD BOOK</a>
    </div>
<style>
body {
    background-color: DarkKhaki;
}
        .topnav {
                background-color: LightSlateGray;
                overflow: hidden;
                }

                .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 25px 30px;
                text-decoration: none;
                font-size: 25px;
                }

                .topnav a:hover {
                background-color: SlateGray;
                color: black;
                }

                .topnav a.active {
                background-color: Gray;
                color: white;
                }
    </style>
</nav>
<div>
        <br><br><a href="tambah.php">';
    echo '<br><br><a href="index.php">';
}
?>