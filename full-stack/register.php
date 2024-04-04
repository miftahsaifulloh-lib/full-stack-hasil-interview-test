<body>
    <?php
        $split = explode("?", $_SERVER['REQUEST_URI']);
		
		
    ?>
    <form method="post" id="form"></form>

    <div class="main" style="padding-top: 4px;">
        <div id="left">

             <ul id="menu" class="collapse">
                <li class="<?php if($split[1]=="")        							{ echo  "active"; } ?>"><a href="register.php">		<i class="icon-book"></i> Register</a></li>
                <li class="<?php if(substr($split[1], 0, 15)==="menu=hobby_list")	{ echo  "active"; } ?>"><a href="?menu=hobby_list">	<i class="icon-paper-clip"></i> Hobby</a></li>
                <li class="<?php if(substr($split[1], 0, 14)==="menu=user_list")	{ echo  "active"; } ?>"><a href="?menu=user_list">	<i class="icon-user"></i> User</a></li>
            </ul>
        </div>

        <div id="content">
            <div class="inner">
				<br>
                <hr/>

                <!--BLOCK SECTION -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if ($_GET["menu"]) {
                            include_once 'load.php';
                        } else {
							
							$mysql = "";
							include_once '../library/koneksi.php';

							if ($_POST["register"]) {
								$sql 	= " insert into user 
											set 
											first_name='".$_POST["first_name"]."', 
											last_name='".$_POST["last_name"]."', 
											password='".$_POST["password"]."', 
											age='".$_POST["age"]."'";
								$result = $mysql->query($sql);
								?>
								<script>
								  alert('Register Add berhasil ditambahkan !');
								</script>
								
								<?php
							} else if (isset($_POST["register"])) {
								?>
								<script>
								  alert('Register Add gagal ditambahkan !');
								</script>
								<?php
							}
							
                            ?>
                            <div class="box">
								<header>
									<h5>Register</h5>
								</header>
								<div class="body">
									<form action="" method="post" class="form-horizontal" name="formulir_pasien_add">
										<div class="form-group">
											<label class="control-label col-lg-4">First Name</label>
											<div class="col-lg-4">
												<input required type="text" name="first_name" autofocus class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">Last Name</label>
											<div class="col-lg-4">
												<input required type="text" name="last_name" autofocus class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">Age</label>
											<div class="col-lg-4">
												<input required type="number" name="age" autofocus class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">Password</label>
											<div class="col-lg-4">
												<input required type="text" name="password" autofocus class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-4">Confirm Password</label>
											<div class="col-lg-4">
												<input required type="text" name="confirm_password" autofocus class="form-control" />
											</div>
										</div>
										<div class="form-actions no-margin-bottom" style="text-align:right;" >
											<input type="submit" name="register" value="Simpan" class="btn btn-primary" />
										</div>
									</form>
								</div>
							</div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!--END BLOCK SECTION -->

                <hr/>
            </div>
        </div>
    </div>
</body>
