<?php 

require_once '../init.php';

class Register extends Connection{
	private $email,
			$level,
			$no_telp,
			$password2;

	public function __construct($data) {
		parent::__construct();

		// INISIALISASI DATA KE DALAM PROPERTY
		$this->username = strtolower(stripcslashes($data['username']));
		$this->email = stripcslashes($data['email']);
		$this->no_telp = htmlspecialchars($data['no_telp']);
		$this->password = mysqli_real_escape_string($this->conn, $data['password']);
		$this->password2 = mysqli_real_escape_string($this->conn, $data['password2']);
		if (isset($data['level'])) {
			$this->level = $data['level'];
		} else {
			$this->level = 'user';
		}
		
		

	}
	public function getLabel() {	
		// CEK APAKAH EMAIL YANG DIMASUKKAN SUDAH BENAR
		$at = ['gmail.com','yahoo.com'];
		$emails = explode('@', $this->email);
		$emails = end($emails);
		if (!in_array($emails, $at)) {
			echo "<script>alert('Pastikan email yang anda masukan sudah benar');</script>";
			return false;
		}

		// CEK APAKAH USERNAME SUDAH TERSEDIA ATAU BELUM
		$sql = "SELECT * FROM users WHERE username = '$this->username'";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			return false;
		}

		// CEK APAKAH PASSWORD SESUAI
		if (!($this->password === $this->password2)) {
			return false;
		}

		// PASTIKAN PASSWORD SUDAH TEREKRIPSI
		$password = password_hash($this->password, PASSWORD_DEFAULT);

		// MASUKKAN DATA KEDALAM DATABASE
		$sql1 = "INSERT INTO users(username,email,no_telp,password,level) VALUES ('$this->username','$this->email','$this->no_telp','$password','$this->level')";
		$result1 = $this->conn->query($sql1);

		$sql2 = "INSERT INTO data_anggota(nama_anggota,email,no_telp) VALUES ('$this->username','$this->email','$this->no_telp')";
		$result2 = $this->conn->query($sql2);

		return $this->conn->affected_rows;

	}
}
// PROSES REGISTER
if (isset($_POST['register'])) {
	$register = new Register($_POST);
	if ($register->getLabel() > 0) {
		setcookie('registerValid',true, time() + 2, '/Perpustakaan');
		header('location: ../../index2.php');
	} else {
		setcookie('registerInvalid',true, time() + 2, '/Perpustakaan');
		header('location: ../../index2.php');
	}
}