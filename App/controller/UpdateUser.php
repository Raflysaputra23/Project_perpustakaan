<?php 
require_once '../init.php';

class UpdateUser extends Connection {
		private $id,
				$email,
				$no_telp,
				$alamat,
				$jenkel,
				$gambar;

		public function __construct($data, $id) {
			parent::__construct();

			$this->id = $id;
			$this->username = htmlspecialchars($data['username']);
			$this->email = htmlspecialchars($data['email']);
			$this->no_telp = htmlspecialchars($data['no_telp']);
			$this->alamat = htmlspecialchars($data['alamat']);
			$this->jenkel = htmlspecialchars($data['jenkel']);
			$this->gambar = $data['gambar'];
		}
		public function getSelectUser() {

			// CEK APAKAH EMAIL VALID
				$at = ['gmail.com','yahoo.com'];
				$emails = explode('@', $this->email);
				$emails = end($emails);
				if (!in_array($emails, $at)) {
					echo "<script>alert('Pastikan email yang anda masukan sudah benar');</script>";
					return false;
				}
				if ($_FILES['gambar']['error'] == 0) {
					$gambarBaru = new UploadGambar($_FILES['gambar']);
					$this->gambar = $gambarBaru->getUpload();
				} else {
					$this->gambar = $this->gambar;
				}

			$sql = "UPDATE data_anggota SET gambar_anggota = '$this->gambar', nama_anggota = '$this->username', email = '$this->email', jenis_kelamin = '$this->jenkel', alamat = '$this->alamat', no_telp = '$this->no_telp' WHERE Id_anggota = '$this->id'";
			$this->conn->query($sql);

			return $this->conn->affected_rows;
		}
}
if (isset($_POST['update'])) {
	$update = new UpdateUser($_POST, $_GET['id']);
	$alertUpdate = $update->getSelectUser();

	if ($alertUpdate > 0) {
		setcookie('swetValidUpdate',true, time() + 2, '/');
		header('location: ../dashboard/dashboard1/dashboard_admin.php?url=profil.php');
	} else {
		setcookie('swetInvalidUpdate',true, time() + 2, '/');
		header('location: ../dashboard/dashboard1/dashboard_admin.php?url=profil.php');
	}
	


}


 ?>