<!-- proses penyimpanan -->
<?php
include "koneksi.php";

// baca ID yang akan di edit
$id = $_GET['id'];

// baca data karyawan
$cari = mysqli_query($konek, "select * from karyawan where id='$id'");
$hasil = mysqli_fetch_array($cari);

// jika tombol simpan diklik
if (isset($_POST['btnSimpan'])) {
    // baca isi form
    $nokartu    = $_POST['nokartu'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];

    // simpan ke tabel karyawan
    $simpan = mysqli_query($konek, "update karyawan set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");

    // jika berhasil disimpan, tampilkan pesan
    if ($simpan) {
        echo "
            <script>
            alert('Tersimpan');
            location.replace('datakaryawan.php');
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal Tersimpan');
            location.replace('datakaryawan.php');
            </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Karyawan</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include "menu.php" ?>

    <!-- isi -->
    <div class="container-fluid" style="padding-top: 3rem;">
        <h3>
            Tambah Data Karyawan
        </h3>

        <!-- form input -->
        <form method="POST">
            <div class="form-group">
                <label>Nomor Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu RFID" class="form-control" style="width: 300px;" value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" style="width: 300px;" value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width: 300px;"><?php echo $hasil['alamat']; ?></textarea>
            </div><br>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan Data</button>
        </form>
    </div>

    <?php include "footer.php" ?>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>