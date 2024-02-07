<?php 


class SelectUser extends Connection {
		private $id,
				$halamanAktif;
		public static $jumlahHalaman;
		private	$awalData,
				$jumlahHalamanHistory;


		public function __construct($id = 'id') {
			$this->id = $id;
		}
		public function getUserPinjam() {
			parent::__construct();
			$sql = "SELECT * FROM data_peminjaman,data_buku,data_anggota WHERE data_peminjaman.id_buku = data_buku.id_buku AND data_peminjaman.id_anggota = data_anggota.Id_anggota ORDER BY id_peminjaman ASC";
			$result = $this->conn->query($sql);

			return $result;
		}
		public function getDataRiwayat($halaman) {
			parent::__construct();
			
			$DataPerHalaman = 8;
			$jumlahData = mysqli_num_rows($this->conn->query("SELECT * FROM riwayat"));
			$this->jumlahHalamanHistory = ceil($jumlahData / $DataPerHalaman );
			$this->halamanAktif = (isset($halaman['aktif'])) ? $halaman['aktif'] : 1;
			$this->awalData = ($DataPerHalaman * $this->halamanAktif) - $DataPerHalaman;

			$sql1 = "SELECT * FROM riwayat,data_buku,data_anggota WHERE riwayat.id_buku = data_buku.id_buku AND riwayat.id_anggota = data_anggota.Id_anggota ORDER BY id_riwayat ASC limit $this->awalData, $DataPerHalaman";
			$result1 = $this->conn->query($sql1);
			return $result1;
		}
		public function getHalaman() {
			return $this->jumlahHalamanHistory;
			// return $this->jumlahHalamanHistory;
		}
		public function getUserDetail($id) {
			parent::__construct();
			$sql = "SELECT * FROM data_peminjaman,data_buku,data_anggota WHERE id_peminjaman = $id AND data_peminjaman.id_buku = data_buku.id_buku AND data_peminjaman.id_anggota = data_anggota.Id_anggota ORDER BY id_peminjaman ASC";
			$result = $this->conn->query($sql);
			$data = mysqli_fetch_object($result);

			return $data;
		}
		public function getUser() {
			parent::__construct();

			$sql = "SELECT * FROM data_anggota WHERE Id_anggota = $this->id";
			$result = $this->conn->query($sql);
			$data = mysqli_fetch_object($result);

			return $data;
		}
		public function getData() {
			$more = $this->conn->query("SELECT * FROM data_anggota");
			$more = $more->num_rows;
			return $more;
		}
		public function getAwalData() {
			$awalData = $this->awalData;
			return $awalData;
		}
		public function getHalamanAktif() {
			$halaman = $this->halamanAktif;
			return $halaman;
		}
		// public function getJumlahHalaman() {
		// 	$halaman = $this->jumlahHalaman;
		// 	return $halaman;
		// }
		public function getAllUser($data) {
			parent::__construct();


			$DataPerHalaman = 9;
			$jumlahData = $this->getData();
			self::$jumlahHalaman = ceil($jumlahData / $DataPerHalaman );
			$this->halamanAktif = (isset($data['halaman'])) ? $data['halaman'] : 1;
			$this->awalData = ($DataPerHalaman * $this->halamanAktif) - $DataPerHalaman;

			$sql = "SELECT * FROM data_anggota limit $this->awalData, $DataPerHalaman";
			$result = $this->conn->query($sql);

			return $result;
		}
		public function getUniqUser($data) {
			parent::__construct();

			$sql = "SELECT * FROM data_anggota WHERE nama_anggota LIKE '%$data%'";
			$result = $this->conn->query($sql);

			return $result;
		}
}




 ?>