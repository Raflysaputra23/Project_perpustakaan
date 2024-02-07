<?php 

require_once 'Connection.php';


class TambahBuku extends Connection {
		private $id_buku,
				$id_anggota,
				$date_estimasi;

				

		public function __construct($data){
			$this->id_buku = $data['id_buku'];
			$this->id_anggota = $data['id_anggota'];
			$this->date_estimasi = $data['dates'];

		}
	public function tambahBukuId() {
		parent::__construct();

		$sql = "INSERT INTO data_peminjaman(id_buku, id_anggota, estimasi_peminjaman) VALUES ('$this->id_buku','$this->id_anggota','$this->date_estimasi')";
		$result = $this->conn->query($sql);

		return $this->conn->affected_rows;
	}
	public function tambahBukuRiwayat($idriwayat) {
		parent::__construct();
		$idbuku = $idriwayat['id_buku'];
		$idanggota = $idriwayat['id_anggota'];
		$estimasi = $idriwayat['estimasi_peminjaman'];

		$sql = "INSERT INTO riwayat(id_buku, id_anggota, estimasi_peminjaman) VALUES ('$idbuku','$idanggota','$estimasi')";
		$result = $this->conn->query($sql);

		return $this->conn->affected_rows; 

	}

}

?>