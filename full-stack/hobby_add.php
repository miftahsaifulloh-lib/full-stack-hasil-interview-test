<?php
$mysql = "";
include_once '../library/koneksi.php';

if ($_POST["hobby_add"]) {
    $sql    = "insert into hobby 
               set 
               nama_hobi ='".$_POST["nama_hobi"]."', 
               aktif ='".$_POST["aktif"]."'";
    $result = $mysql->query($sql);
    ?>
	<script>
		alert('Hobby Add berhasil ditambahkan !');
	</script>
    <meta http-equiv='refresh' content='0; url=?menu=hobby_list'>;
    <?php
} else if (isset($_POST["dokter"])) {
    ?>
    <script>
		alert('Hobby Add gagal ditambahkan !');
	</script>
    <?php
}
?>

<div class="box">
    <header>
        <h5>Hobby Add</h5>
    </header>
    <div class="body">
        <form action="" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-lg-4">Nama Hobi</label>
                <div class="col-lg-4">
                    <input required type="text" class="form-control" name="nama_hobi"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">Aktif</label>
                <div class="col-lg-4">
                    <select required name="aktif" class="form-control">
                        <option value=''>-Pilih-</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="form-actions no-margin-bottom" style="text-align:right;">
                <input type="submit" name="hobby_add" value="Add" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>