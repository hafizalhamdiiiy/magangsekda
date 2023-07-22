<?php 
require 'fungsi/fungsi.php';
require 'fungsi/proses_log.php';
 ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login - Pegawai </title>

  <link rel="stylesheet" href="<?=url()?>css/reset.css">

  <link rel="icon" type="image/png" href="<?=url()?>images/icon/logo-sekda.png">

    <link rel="stylesheet" href="<?=url()?>css/style.css" media="screen" type="text/css" />

</head>

<body>
<form action="" autocomplete="off" method="POST">
  <div class="wrap">
  	<h1 class="login_adm">Login Pegawai</h1>
		<div class="avatar">
      <img src="<?=url()?>images/icon/logo-sekda.png">
		</div>
		<input type="text" name="user" autocomplete="OFF" placeholder="username" required>
	
		<input type="password" name="pass" placeholder="password" required>
	<!-- 	<a href="" class="forgot_link">forgot ?</a> --><br>
		<button type="submit" name="login">Masuk</button>
	</div>
	<?php if (isset($_POST['login'])) {
		$pro->login();

	} ?>
</form>


</body>

</html>

