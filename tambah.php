<?php
    $file_name = fopen("perpustakaan.txt", "a+");
    $status ='';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $cover_buku = $_FILES['cover_buku'];

        $nameFile = $kode_buku.'-'.$cover_buku['name'];
        $temp = $cover_buku['tmp_name'];

        $directory_files = "cover/";

        $upload = move_uploaded_file($temp, $directory_files.$nameFile);
        if(!$upload){
            echo "<script>alert('Failed To Save the Image')</script>";
        }

        $data = '';
        $data .= $kode_buku."-";
        $data .= $judul_buku."-";
        $data .= $pengarang."-";
        $data .= $penerbit."-";
        $data .= $tahun_terbit."-";
        $data .= $directory_files.$nameFile."\n";

        $save_data = fwrite($file_name, $data);

        if($save_data == false) {
            $status = 'error';
        } else {
            $status = 'okay';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online</title>
</head>
<style> 
        body {
            background-color: LemonChiffon;
        }
        .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}
 
.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 18px 20px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #f5f5f5;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}

    </style>

<body>
    <h1>Details Buku</h1>
    <div class="topnav">
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
    <form action="tambah.php" method="post">
        <table>
        <table style="margin-left:auto;margin-right:auto" border="3">
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="kode_buku"></td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td><input type="text" name="judul_buku"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="cover_buku" id="cover_buku">Upload</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>

</html>