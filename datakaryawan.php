<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Karyawan</title>

    <!-- bawaan koper -->
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "menu.php" ?>

    <!-- isi -->
    <div class="container-fluid" style="padding-top: 3rem;">
        <h3>
            Data Karyawan
        </h3>

        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th style="width: 10px; text-align:center">Nomor</th>
                    <th style="width: 200px; text-align:center">Nomor Kartu</th>
                    <th style="width: 400px; text-align:center">Nama</th>
                    <th style="text-align:center">Alamat</th>
                    <th style="width: 150px; text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // koneksi database
                include "koneksi.php";

                // baca datakaryawan
                $sql = mysqli_query($konek, "select * from karyawan");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                ?>

                    <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo $data['nokartu']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td style="text-align: center;">
                            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                            <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- tombol tambah -->
        <a href="tambah.php"><button class="btn btn-primary">Tambah Data</button></a>
    </div>

    <?php include "footer.php" ?>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>