<?php  


class Logout {
	public function __construct() {
		session_start();
		session_destroy();
		session_unset();
		header('location:../../index.php');
	}
}

$logout = new Logout();