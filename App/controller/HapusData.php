<?php 

require_once 'Connection.php';
require_once 'TambahBuku.php';

class HapusData extends Connection {
	private $id;

	public function __construct($id) {
		$this->id = $id;
		
	}
	public function HapusDataPermintaan() {
		parent::__construct();

		$sql = "DELETE FROM data_peminjaman WHERE id_peminjaman = $this->id";
		$result = $this->conn->query($sql);

		return $this->conn->affected_rows;
	}
	public function HapusDataRiwayat() {
		parent::__construct();

		$sql = "DELETE FROM riwayat WHERE id_riwayat = $this->id";
		$result = $this->conn->query($sql);

		return $result;
	}



}


if (isset($_GET['id_valid'])) {
	$hapus = new HapusData($_GET['id_valid']);
	$return = $hapus->HapusDataPermintaan();

	if ($return > 0) {
		$tambah = new TambahBuku($_GET['id_valid']);
		$tambah->tambahBukuRiwayat($_POST);
		setcookie('alertHapus',true, time() + 2, '/');
		setcookie('alertTerima',true, time() + 60 * 60 * 24 * 30, '/');
		setcookie('valid','', time() - 3600, '/');
		header('location:../dashboard/dashboard1/dashboard_admin.php?url=proses_peminjaman.php');
	} else {
		setcookie('alertGagalHapus',true, time() + 2, '/');
		header('location:../dashboard/dashboard1/dashboard_admin.php?url=proses_peminjaman.php');
	}
	
}
if (isset($_GET['id_invalid'])) {
	$hapus1 = new HapusData($_GET['id_invalid']);
	$return1 = $hapus1->HapusDataPermintaan();

	if ($return1 > 0) {
		setcookie('alertTolak',true, time() + 2, '/');
		setcookie('alertTolak1',true, time() + 60 * 60 * 24 * 30, '/');
		setcookie('valid','', time() - 3600, '/');
		header('location:../dashboard/dashboard1/dashboard_admin.php?url=proses_peminjaman.php');
	}
}



 ?>