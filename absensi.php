<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi Absensi</title>

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
            Rekap Absensi
        </h3>
        <table class="table table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th style="width: 10px; text-align:center">Nomor</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Tanggal</th>
                    <th style="text-align:center">Jam Masuk</th>
                    <th style="text-align:center">Jam Istirahat</th>
                    <th style="text-align:center">Jam Kembali</th>
                    <th style="text-align:center">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                // baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan kartu RFID untuk tanggal hari ini
                // baca tanggal saat ini
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('Y-m-d');

                // filter absen berdasarkan tanggal saat ini
                $sql = mysqli_query($konek, "select b.nama, 
                    a.tanggal, a.jam_masuk, a.jam_istirahat, 
                    a.jam_kembali, a.jam_pulang from absensi a,
                    karyawan b where a.nokartu=b.nokartu and 
                    a.tanggal <= '$tanggal'");
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['jam_masuk']; ?></td>
                        <td><?php echo $data['jam_istirahat']; ?></td>
                        <td><?php echo $data['jam_kembali']; ?></td>
                        <td><?php echo $data['jam_pulang']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table><br>
    </div>

    <?php include "footer.php" ?>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>