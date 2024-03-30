<?php
include "koneksi.php";

// baca ID yang akan di hapus
$id = $_GET['id'];

// hapus data
$hapus  = mysqli_query($konek, "delete from karyawan where id='$id'");

// jika berhasil disimpan, tampilkan pesan
if ($hapus) {
    echo "
            <script>
            alert('Terhapus');
            location.replace('datakaryawan.php');
            </script>
        ";
} else {
    echo "
            <script>
            alert('Gagal Terhapus');
            location.replace('datakaryawan.php');
            </script>
        ";
}
