<?php 

require_once '../init.php';

class Login extends Connection{
	

	public function __construct($data) {
		parent::__construct();

		// INISIALISASI DATA KEDALAM PROPERTY
		$this->username = htmlspecialchars(strtolower($data['username']));
		$this->password = htmlspecialchars($data['password']);

		
	}

	public function getLabel() {
		// CEK APAKAH DATA USERNAME ADA DIDALAM DATABASE
		$sql = "SELECT * FROM users WHERE username = '$this->username'";
		$result = $this->conn->query($sql);
		$datas = mysqli_fetch_object($result);

		// AMBIL DATA
		$datas1 = mysqli_fetch_object($this->conn->query("SELECT * FROM data_anggota WHERE nama_anggota = '$this->username'"));
		
		if (!($result->num_rows > 0)) {
			return false;
			die;
		}

		// CEK APAKAH PASSWORD ADA DIDALAM DATABASE ATAU TIDAK
		if (!password_verify($this->password, $datas->password)) {
			return false;
			die;
		} else {
			session_start();
			
			switch ($datas->level) {
				case 'admin':
					$_SESSION['username'] = $datas->username;
					$_SESSION['level'] = $datas->level;
					$_SESSION['id'] = $datas1->Id_anggota;
					setcookie('swet', true, time() + 1, '/');
					header('location:../dashboard/dashboard1/dashboard_admin.php');
					break;
				case 'petugas':
					$_SESSION['username'] = $datas->username;
					$_SESSION['level'] = $datas->level;
					$_SESSION['id'] = $datas1->Id_anggota;
					header('location:../dashboard/dashboard2/dashboard_petugas.php');
					break;
				case 'user':
					$_SESSION['username'] = $datas->username;
					$_SESSION['level'] = $datas->level;
					$_SESSION['id'] = $datas1->Id_anggota;
					header('location:../dashboard/dashboard3/dashboard_user.php');
					break;
				default:
					echo "<script>Anda tidak boleh masuk</script>;";
					header('location:../../index.php');
					break;
			}
		}
		return 1;
	}
}

if (isset($_POST['login'])) {
	$login = new Login($_POST);
	if ($login->getLabel() <= 0) {
		setcookie('loginGagal',true, time() + 2 , '/Perpustakaan');
		header('location: ../../index.php');
		
	}
}
?>




 