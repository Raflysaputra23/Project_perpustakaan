<?php 
require_once '../init.php';

class UploadGambar extends Connection {
		private $namaGambar,
				$tmpName,
				$error,
				$sizeGambar;

		public function __construct($data) {
			$this->namaGambar = $data['name'];
			$this->tmpName = $data['tmp_name'];
			$this->error = $data['error'];
			$this->sizeGambar = $data['size'];
		}

		public function getUpload() {

			// CEK APAKAH EXTENSI GAMBAR YANG DIUPLOAD
			$extensiGambar = ['jpg','jpeg','png'];
			$extensiGambaLama = strtolower(pathinfo($this->namaGambar, PATHINFO_EXTENSION));

			if (!in_array($extensiGambaLama, $extensiGambar)) {
				echo "<script>alert('Gambar yang anda upload harus extensi gambar'); window.location.assign('../dashboard/dashboard1/dashboard_admin.php');</script>";
				exit;
			}

			// CEK APAKAH GAMBAR TERLALU BESAR ATAU TIDAK
			if ($this->sizeGambar > 1000000) {
				echo "<script>alert('Gambar anda terlalu besar'); window.location.assign('../dashboard/dashboard1/dashboard_admin.php');</script>";
				exit;
			}
			$namaGambarBaru = uniqid().".".$extensiGambaLama;

			move_uploaded_file($this->tmpName, "../dashboard/assets/img_user/".$namaGambarBaru);

			return $namaGambarBaru;
			
		}
}




 ?>