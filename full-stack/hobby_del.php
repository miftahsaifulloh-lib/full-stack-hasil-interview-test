<?php
$mysqli = "";
include_once '../library/koneksi.php';

if ($_GET) {
	if ($_GET["aksi"] && $_GET["id"]) {
        $sql   = "DELETE FROM hobby WHERE id = '".$_GET["id"]."'";
        $delDb = $mysqli->query($sql);
		if ($delDb) {
            ?> 
			<script>
				alert('Satu data Hobby list berhasil di hapus !');
			</script>
			<meta http-equiv='refresh' content='0; url=?menu=hobby_list'> 
			<?php
		}
	} else {
        ?>
        <div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <b>Data hobby list yang akan dihapus tidak ada !!</b>
        </div>
        <?php
	}
}
?>