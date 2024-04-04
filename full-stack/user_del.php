<?php
$mysqli = "";
include_once '../library/koneksi.php';

if ($_GET) {
	if ($_GET["aksi"] && $_GET["id"]) {
        $sql   = "DELETE FROM user WHERE id = '".$_GET["id"]."'";
        $delDb = $mysqli->query($sql);
		if ($delDb) {
            ?> 
			<script>
				alert('Satu data User list berhasil di hapus !');
			</script>
			<meta http-equiv='refresh' content='0; url=?menu=user_list'> 
			<?php
		}
	} else {
        ?>
        <div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <b>Data user list yang akan dihapus tidak ada !!</b>
        </div>
        <?php
	}
}
?>