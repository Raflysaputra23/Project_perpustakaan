<?php 



if (isset($_COOKIE['invalid'])) {
	setcookie('invalid','', time() - 3600, '/');
	header('location:dashboard_admin.php?url=data_buku.php');
}
if (isset($_COOKIE['alertTolak1'])) {
	setcookie('alertTolak1','', time() - 3600, '/');
	header('location:dashboard_admin.php?url=data_buku.php');
}
if (isset($_COOKIE['alertTerima'])) {
	setcookie('alertTerima','', time() - 3600, '/');
	header('location:dashboard_admin.php?url=data_buku.php');
}



 ?>