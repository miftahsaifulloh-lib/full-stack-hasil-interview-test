<?php
$mysqli = "";
include_once '../library/koneksi.php';

$row 	 = 20;
$hal 	 = isset($_GET['hal']) ? $_GET['hal'] : 0;
$sql 	 = "SELECT * FROM user
            WHERE 
			 first_name LIKE '%".$_POST['first_name_last_name_age']."%' OR last_name LIKE '%".$_POST['first_name_last_name_age']."%' OR age LIKE '%".$_POST['first_name_last_name_age']."%' 
            ORDER BY first_name ASC ";
$result  = $mysqli->query($sql);
$data 	 = $result->fetch_assoc();
$jml	 = mysql_num_rows($result);
$max	 = ceil($jml/$row);
?>
<a href="?menu=user_add" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> User Add</a><p>
<div class="panel panel-default">
    <div class="panel-heading">
        User List
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <form action="" method="post" class="form-horizontal">
                <div class="form-group col-lg-12" >
                    <div class="col-lg-2">
                        <label>First Name, Last Name, Age</label>
                    </div>
                    <div class="col-lg-4" >
                        <input type="text" class="form-control" name="first_name_last_name_age" value="<?php echo $_POST['first_name_last_name_age']; ?>"/>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th width="90">Aksi</th>
                </tr>
                </thead>
                <?php
                $dokSql = "SELECT * FROM user
                           WHERE first_name LIKE '%".$_POST['first_name_last_name_age']."%' OR last_name LIKE '%".$_POST['first_name_last_name_age']."%' OR age LIKE '%".$_POST['first_name_last_name_age']."%' 
                           ORDER BY first_name ASC LIMIT $hal, $row";
                $dokQry = $mysql->query($dokSql);
                $nomor  = 0;
                while ($user = $dokQry -> fetch_assoc()) {
                    $nomor++;
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $user['first_name'];?></td>
                        <td><?php echo $user['last_name'];?></td>
                        <td><?php echo $user['age'];?></td>
                        <td>
                            <div class='btn-group'>
                                <a href="?menu=user_del&aksi=hapus&id=<?php echo $user['id']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('Anda yakin akan menghapus satu data user list ?')"><i class="icon-remove icon-white"></i></a>
                                <a href="?menu=user_edit&aksi=edit&id=<?php echo $user['id']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
                            <ul class='pagination pagination-sm'><li><a href='?menu=user_list&hal=<?php echo $list[$h] ?>'><?php echo $h ?></a></li></ul>
                            <?php
                        }
                        ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>