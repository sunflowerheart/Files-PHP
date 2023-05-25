<?php
    $status = isset($_GET['status']) ? $_GET['status'] : ' ';
    $file_name = "perpustakaan.txt";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online Yafi</title>
</head>
<body>
    <div>
        <nav>
            <h1>Program Perpustakaan</h1>
            <div class="topnav">
                <a class="active" href="index.php">Home</a>
                <a href="tambah.php">ADD BOOK</a>
                </div>
            <style>
                body {
            background-color: Bisque;
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
            <main role="main">
                <?php
                    if($status == 'okay') {
                        echo "<br>Data Buku Berhasil ditambah";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>
                <h2>DATA BUKU</h2>
                <div>
                        <thead>
                         <style>
                            tr:hover {background-color: coral;}
                            th, td {
                            border-bottom: 15px solid #ddd;
                            text-align: center;
                            padding: 18px 20px;
                            font-size: 25px;
                            }
                        </style>
                        <table style="margin-left:auto;margin-right:auto" border="15">
                            <tr> 
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach (file($file_name) as $line) :
                                    $dataBuku = explode("-", $line);
                            ?>
                            <tr>
                                <td><?= $dataBuku[0]; ?></td>
                                <td><?= $dataBuku[1]; ?></td>
                                <td><?= $dataBuku[2]; ?></td>
                                <td><?= $dataBuku[3]; ?></td>
                                <td><?= $dataBuku[4]; ?></td>
                                <td><img src="./<?= $dataBuku[5]; ?>" alt="gambar" width="200px"></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>