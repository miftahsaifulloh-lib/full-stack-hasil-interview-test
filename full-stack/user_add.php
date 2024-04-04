<?php
$mysql = "";
include_once '../library/koneksi.php';

if ($_POST["user_add"]) {
    $sql    = "insert into user 
               set 
               first_name ='".$_POST["first_name"]."', 
               last_name ='".$_POST["last_name"]."', 
               age ='".$_POST["age"]."', 
               email ='".$_POST["email"]."', 
               password ='".md5($_POST["password"])."', 
               id_hoby ='".$_POST["id_hoby"]."'";
    $result = $mysql->query($sql);
    ?>
	<script>
		alert('User Add berhasil ditambahkan !');
	</script>
    <meta http-equiv='refresh' content='0; url=?menu=user_list'>;
    <?php
} else if (isset($_POST["dokter"])) {
    ?>
    <script>
		alert('User Add gagal ditambahkan !');
	</script>
    <?php
}
?>

<div class="box">
    <header>
        <h5>User Add</h5>
    </header>
    <div class="body">
        <form action="" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-lg-4">First Name</label>
                <div class="col-lg-4">
                    <input required type="text" class="form-control" name="first_name"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-4">Last Name</label>
                <div class="col-lg-4">
                    <input required type="text" class="form-control" name="last_name"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-4">Age</label>
                <div class="col-lg-4">
                    <input required type="number" class="form-control" name="age"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-4">Email</label>
                <div class="col-lg-4">
                    <input required type="email" class="form-control" name="email"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-4">Password</label>
                <div class="col-lg-4">
                    <input required type="text" class="form-control" name="password" id="password"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-4">Confirm Password</label>
                <div class="col-lg-4">
                    <input required type="text" class="form-control" name="confirm_password" id="confirm_password"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-4">Hobby</label>
                <?php
                    $sql	    = "SELECT * FROM hobby";
                    $result	    = $mysql->query($sql);
                    $hobby		= $result->fetch_assoc();
                    ?>
                    <div class="col-lg-4">
                        <select required name="hobby" class="form-control">
                            <option value=''>-Pilih-</option>
                            <?php
                            do {
								if($hobby["aktif"] == '1') {
                                ?>
                                <option value="<?php echo $hobby['id'];?>" ><?php echo $hobby['nama_hobi'];?></option>
                                <?php
								}
                            } while($hobby = $result->fetch_assoc());
                            ?>
                        </select>
                    </div>
            </div>
            <div class="form-actions no-margin-bottom" style="text-align:right;">
                <input type="submit" name="user_add" value="Add" class="btn btn-primary" />
            </div>
        </form>
		<script>
			var password = document.getElementById("password")
			var confirm_password = document.getElementById("confirm_password");

			function validatePassword() {
			  if (password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords Don't Match");
			  } else {
				confirm_password.setCustomValidity('');
			  }
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
    </div>
</div>