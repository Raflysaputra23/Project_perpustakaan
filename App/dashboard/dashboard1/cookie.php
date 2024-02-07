<?php 
session_start();
if (isset($_SESSION['valid'])) {
	setcookie('valid',true, time() + 60 * 60 * 24, '/');
	unset($_SESSION['valid']);
	header('location: dashboard_admin.php?url=data_buku.php');
}
if (isset($_SESSION['invalid'])) {
	setcookie('invalid',true, time() + 15, '/');
	unset($_SESSION['valid']);
	header('location: dashboard_admin.php?url=data_buku.php');
}
if (isset($_SESSION['buku1'])) {
	setcookie('tambahBuku1',true, time() + 10, '/');
	unset($_SESSION['buku1']);
	header('location: dashboard_admin.php?url=tambah_buku.php');

}
if (isset($_SESSION['buku0'])) {
	setcookie('tambahBuku0',true, time() + 2, '/');
	unset($_SESSION['buku0']);
	header('location: dashboard_admin.php?url=tambah_buku.php');

}
if (isset($_SESSION['berhasill'])) {
	setcookie('berhasilll',true, time() + 2, '/');
	unset($_SESSION['berhasill']);
	header('location: dashboard_admin.php?url=riwayat.php');
}
if (isset($_SESSION['gagall'])) {
	setcookie('gagalll',true, time() + 2, '/');
	unset($_SESSION['gagall']);
	header('location: dashboard_admin.php?url=riwayat.php');

}
