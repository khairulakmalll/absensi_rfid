<?php
include "koneksi.php";

// baca tabel tmp
$sql = mysqli_query($konek, "select * from tmprfid");
$data = mysqli_fetch_array($sql);

// baca nomor kartu
$nokartu = $data['nokartu'];
?>

<div class="form-group">
    <label>Nomor Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu RFID" class="form-control" style="width: 300px;" value="<?php echo $nokartu; ?>">
</div>