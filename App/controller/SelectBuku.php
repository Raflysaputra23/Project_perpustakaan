<?php 
 require_once 'Connection.php';

class SelectBuku extends Connection{
	private $komik,
			$sejarah;

	
	public function getAllBuku() {
		parent::__construct();

		$sql = "SELECT * FROM data_buku";
		$query = $this->conn->query($sql);

		return $query;

	}
	public function getBukuId($id){
		parent::__construct();

		$sql = "SELECT * FROM data_buku WHERE id_buku = $id";
		$query = $this->conn->query($sql);

		return $query;
	}
	public function getKomikBuku() {
		parent::__construct();

		$sql = "SELECT * FROM data_buku WHERE jenis_buku = 'komik'";
		$query = $this->conn->query($sql);

		return $query;
	}
	public function getSejarahBuku() {
		parent::__construct();

		$sql = "SELECT * FROM data_buku WHERE jenis_buku = 'sejarah'";
		$query = $this->conn->query($sql);

		return $query;
	}
	public function getAnimeBuku() {
		parent::__construct();

		$sql = "SELECT * FROM data_buku WHERE jenis_buku = 'anime'";
		$query = $this->conn->query($sql);

		return $query;
	}

}

 ?>