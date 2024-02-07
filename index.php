<?php 
session_start();

	if (isset($_SESSION['level'])) {
		switch ($_SESSION['level']) {
			case 'admin':
				header('location:App/dashboard/dashboard1/dashboard_admin.php');
				break;
			case 'petugas':
				header('location:App/dashboard/dashboard2/dashboard_petugas.php');
				break;
			case 'user':
				header('location:App/dashboard/dashboard3/dashboard_user.php');
				break;
			default:
				break;
		}
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- MY STYLE CSS -->
	<link rel="stylesheet" href="Tools/style.css">

	<!-- FONTS GOOGLE -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:wght@300&family=Oswald:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">

	<!-- FONTAWESOMES -->
	<link rel="stylesheet" href="Tools/fontawesome/css/font-awesome.min.css">

	<style>
		<?php require_once 'Tools/style.css'; ?>
	</style>

</head>
<body>
	<?php if (isset($_COOKIE['loginGagal'])): ?>
		<div id="loginGagal"></div>
	<?php endif ?>
	<div class="container">
		<h1>login</h1>
		<form action="App/controller/Login.php" method="post" autocomplete="off">
			<div class="form-group">
				<input type="text" name="username" id="username" required>
				<label for="username">Username</label>
				<i class="fa fa-user"></i>
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" required>
				<label for="password">Password</label>
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
			<button type="submit" name="login" class="button">Sign in</button>
		</form>
		<div class="alert">
		<hr><span>Belum punya akun</span><hr>
		</div>
		<a href="index2.php" class="button">Sign up</a>
	</div>


	<!-- SWEET ALERT2 -->
	<script src='Tools/swetalert/sweetalert2.all.min.js'></script>

	<script>
		icon.addEventListener('click', function satu() {
			
			if (password.type === 'password') {
				password.setAttribute('type', 'text');
				icon.classList.add('fa-eye');
				icon.classList.remove('fa-eye-slash');
			} else {
				password.setAttribute('type', 'password');
				icon.classList.add('fa-eye-slash');
				icon.classList.remove('fa-eye');
			}
		})

		const loginGagal = document.getElementById('loginGagal');
		
		if (loginGagal) {
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top',
			  showConfirmButton: false,
			  timer: 3000,
			  timerProgressBar: true,
			  didOpen: (toast) => {
			    toast.onmouseenter = Swal.stopTimer;
			    toast.onmouseleave = Swal.resumeTimer;
			  }
			});
			Toast.fire({
			  icon: 'error',
			  title: 'Gagal masuk!',
			  text: 'Username/Password anda invalid',
			});
		}
	</script>
	
</body>
</html>