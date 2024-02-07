<?php 

require_once 'Connection.php';


class TambahBukuAll extends Connection{
	private $jenis_buku,
			$judul_buku,
			$penerbit,
			$gambar_buku,
			$namaGambar,
			$tmpName,
			$error,
			$sizeGambar;

	public function __construct($data) {
		

		$this->judul_buku = $data['judul_buku'];
		$this->jenis_buku = $data['jenis_buku'];
		$this->penerbit = $data['penerbit'];
	}
	public function tambahBukuAlls($datas) {
		parent::__construct();

		$this->namaGambar = $datas['gambar_buku']['name'];
		$this->tmpName = $datas['gambar_buku']['tmp_name'];
		$this->error = $datas['gambar_buku']['error'];
		$this->sizeGambar = $datas['gambar_buku']['size'];

		if ($this->error == 0) {
			$this->uploadBuku();
			$this->gambar_buku = $this->uploadBuku();
		} else {
			return false;
			die;
		}

		$sql = "INSERT INTO data_buku(gambar_buku, judul_buku, jenis_buku, penerbit) VALUES ('$this->gambar_buku','$this->judul_buku','$this->jenis_buku','$this->penerbit')";
		$result = $this->conn->query($sql);

		return $this->conn->affected_rows;
	}
	public function uploadBuku() {


			// CEK APAKAH EXTENSI GAMBAR YANG DIUPLOAD
			$extensiGambar = ['jpg','jpeg','png'];
			$extensiGambarLama = strtolower(pathinfo($this->namaGambar, PATHINFO_EXTENSION));

			if (!in_array($extensiGambarLama, $extensiGambar)) {
				echo "<script>alert('Gambar yang anda upload harus extensi gambar'); window.location.assign('../dashboard/dashboard1/dashboard_admin.php');</script>";
				exit;
			}

			// CEK APAKAH GAMBAR TERLALU BESAR ATAU TIDAK
			if ($this->sizeGambar > 1000000) {
				echo "<script>alert('Gambar anda terlalu besar'); window.location.assign('../dashboard/dashboard1/dashboard_admin.php');</script>";
				exit;
			}

	
			move_uploaded_file($this->tmpName, "../../dashboard/assets/img_buku/".$this->namaGambar);

			return $this->namaGambar;
	}
}

 ?>