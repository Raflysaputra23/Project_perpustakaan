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
	<?php if (isset($_COOKIE['registerValid'])): ?>
		<div id="registerValid"></div>
	<?php elseif(isset($_COOKIE['registerInvalid'])) : ?>
		<div id="registerInvalid"></div>
	<?php endif; ?>
		
	<div class="container">
		<h1>Register</h1>
		<form action="App/controller/Register.php" method="post" autocomplete="off">
			<div class="form-group">
				<input type="text" name="username" id="username" required>
				<label for="username">Username</label>
				<i class="fa fa-user"></i>
			</div>
			<div class="form-group">
				<input type="text" name="email" id="email" required>
				<label for="email">Email</label>
				<i class="fa fa-at"></i>
			</div>
			<div class="form-group">
				<input type="text" name="no_telp" id="no_telp" required>
				<label for="email">NO. TELP</label>
				<i class="fa fa-phone"></i>
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" required>
				<label for="password">Password</label>
				<i class="fa fa-eye-slash" id="icon"></i>
			</div>
			<div class="form-group">
				<input type="password" name="password2" id="password2" required>
				<label for="password2">Confirm Password</label>
				<i class="fa fa-eye-slash" id="icon2"></i>
			</div>
			<button type="submit" name="register" class="button">Sign up</button>
		</form>
		<div class="alert">
		<hr><span>Sudah punya akun</span><hr>
		</div>
		<a href="index.php" class="button">Sign in</a>
	</div>
	<!-- SWEET ALERT2 -->
	<script src='Tools/swetalert/sweetalert2.all.min.js'></script>

	<script>
		const password = document.getElementById('password');
		const icon = document.getElementById('icon');
		const password2 = document.getElementById('password2');
		const icon2 = document.getElementById('icon2');

		const registerValid = document.getElementById('registerValid');
		const registerInvalid = document.getElementById('registerInvalid');


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
		icon2.addEventListener('click', function dua() {
			
			if (password2.type === 'password') {
				password2.setAttribute('type', 'text');
				icon2.classList.add('fa-eye');
				icon2.classList.remove('fa-eye-slash');
			} else {
				password2.setAttribute('type', 'password');
				icon2.classList.add('fa-eye-slash');
				icon2.classList.remove('fa-eye');
			}
		})


		if (registerValid) {
				Swal.fire({
				  title: "Berhasil Register",
				  text: "Klik untuk beralih halaman",
				  icon: "success",
				  confirmButtonColor: "blue",
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'index.php';
					}
				});
		}
		if (registerInvalid) {
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
			  title: 'Gagal register!',
			});
		}
		
		

	</script>

</body>
</html>