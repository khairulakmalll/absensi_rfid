<?php
include "koneksi.php";

// baca tabel status untuk mode absen
$sql = mysqli_query($konek, "select * from status");
$data = mysqli_fetch_array($sql);
$mode_absen = $data['mode'];

// uji mode absen
$mode = "";
if ($mode_absen == 1)
    $mode = "MASUK";
else if ($mode_absen == 2)
    $mode = "ISTIRAHAT";
else if ($mode_absen == 3)
    $mode = "KEMBALI";
else if ($mode_absen == 4)
    $mode = "PULANG";

// baca tabel tmp
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu    = $data_kartu['nokartu'];
?>

<div class="container-fluid" style="text-align: center;">
    <?php if ($nokartu == "") { ?>
        <h3>ABSEN : <?php echo $mode; ?> </h3>
        <h1>
            DEKATKAN KARTU RFID ANDA<br>
        </h1>
        <img src="images/tap.png" style="width: 300px;"><br>
        <img src="images/animasi2.gif"><br><br><br><br>
    <?php } else {
        // cek nomor kartu RFID apakah terdaftar di tabel karyawan
        $cari_karyawan = mysqli_query($konek, "select * from karyawan 
            where nokartu='$nokartu'");
        $jumlah_data = mysqli_num_rows($cari_karyawan);

        if ($jumlah_data == 0)
            echo "<h1>MAAF, KARTU ANDA TIDAK TERDAFTAR!</h1>";
        else {
            // ambil nama karyawan
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];

            // tanggal dan jam hari ini
            date_default_timezone_set('Asia/Jakarta');
            $tanggal    = date('Y-m-d');
            $jam        = date('H:i:s');

            // cek di tabel absensi apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini
            // apabila belum ada, maka dianggap absen masuk
            // apabila sudah ada, update data sesuai mode absensi
            $cari_absen = mysqli_query($konek, "select * from absensi 
                where nokartu='$nokartu' and tanggal='$tanggal'");

            // hitung jumlah data
            $jumlah_absen = mysqli_num_rows($cari_absen);
            if ($jumlah_absen == 0) {
                echo "<h1>SELAMAT DATANG<br> $nama </h1>";
                mysqli_query($konek, "insert into absensi(nokartu, 
                    tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
            } else {
                // update sesuai mode absen
                if ($mode_absen == 2) {
                    echo "<h1>SELAMAT ISTIRAHAT<br> $nama </h1>";
                    mysqli_query($konek, "update absensi set 
                        jam_istirahat='$jam' where nokartu='$nokartu' and 
                        tanggal='$tanggal'");
                } else if ($mode_absen == 3) {
                    echo "<h1>SELAMAT DATANG KEMBALI<br> $nama </h1>";
                    mysqli_query($konek, "update absensi set 
                        jam_kembali='$jam' where nokartu='$nokartu' and 
                        tanggal='$tanggal'");
                } else if ($mode_absen == 4) {
                    echo "<h1>SELAMAT JALAN<br> $nama </h1>";
                    mysqli_query($konek, "update absensi set 
                        jam_pulang='$jam' where nokartu='$nokartu' and 
                        tanggal='$tanggal'");
                }
            }
        }

        // kosongkan tabel tmp
        mysqli_query($konek, "delete from tmprfid");
    } ?>
</div>