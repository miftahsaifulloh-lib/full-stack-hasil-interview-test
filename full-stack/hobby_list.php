<?php
$mysql = "";
include_once '../library/koneksi.php';

$row 	 = 20;
$hal 	 = isset($_GET['hal']) ? $_GET['hal'] : 0;
$sql 	 = "SELECT * FROM hobby 
            WHERE nama_hobi LIKE '%".$_POST['nama_hobby_aktif']."%' OR aktif LIKE '%".$_POST['nama_hobby_aktif']."%' 
            ORDER BY nama_hobi ASC ";
$result  = $mysql->query($sql);
$data 	 = $result->fetch_assoc();
$jml	 = mysql_num_rows($result);
$max	 = ceil($jml/$row);
?>
<a href="?menu=hobby_add" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> Hobby Add</a><p>
<div class="panel panel-default">
    <div class="panel-heading">
        Hobby List
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form action="" method="post" class="form-horizontal">
                <div class="form-group col-lg-12" >
                    <div class="col-lg-2">
                        <label>Nama hobi, Aktif</label>
                    </div>
                    <div class="col-lg-4" >
                        <input type="text" class="form-control" name="nama_hobby_aktif" value="<?php echo $_POST['nama_hobby_aktif']; ?>"/>
                    </div>
                </div>
                <div class="form-group col-lg-12" >
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-4">
                        <input type="submit" value="Cari" class="btn btn-primary" />
                    </div>
                </div>
            </form>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Nomor Urut</th>
                    <th>Nama Hobi</th>
                    <th>Aktif</th>
                    <th width="90">Aksi</th>
                </tr>
                </thead>
                <?php
                $dokSql = "SELECT * FROM hobby
                           WHERE nama_hobi LIKE '%".$_POST['nama_hobby_aktif']."%' OR aktif LIKE '%".$_POST['nama_hobby_aktif']."%' 
                           ORDER BY nama_hobi ASC LIMIT $hal, $row";
                $dokQry = $mysql->query($dokSql);
                $nomor  = 0;
                while ($hobby = $dokQry -> fetch_assoc()) {
                    $nomor++;
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $hobby['nama_hobi'];?></td>
                        <td>
                            <?php
                            if ( $hobby['aktif'] == 1) { 
                                echo 'Aktif';
                            } else { 
                                echo 'Tidak Aktif';
                            } 
                            ?>
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="?menu=hobby_del&aksi=hapus&id=<?php echo $hobby['id']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('Anda yakin akan menghapus satu data hobby list ?')"><i class="icon-remove icon-white"></i></a>
                                <a href="?menu=hobby_edit&aksi=edit&id=<?php echo $hobby['id']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                <?php } ?>
                <tr>
                    <td colspan="9" align="right">
                        <?php
                        for ($h = 1; $h <= $max; $h++) {
                            $list[$h] = $row*$h-$row;
                            ?>
                            <ul class='pagination pagination-sm'><li><a href='?menu=hobby_list&hal=<?php echo $list[$h] ?>'><?php echo $h ?></a></li></ul>
                            <?php
                        }
                        ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>