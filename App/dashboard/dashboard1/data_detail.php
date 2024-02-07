<?php 
require_once '../../init.php';

$data = new SelectUser();
$datas = $data->getUserDetail($_GET['id']);


?>



<div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end ">
		<h2>Data Detail Peminjam</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item">Halaman Permintaan</li>
					 <li class="breadcrumb-item active" aria-current="page">Halaman Detail Peminjam</li>
				 </ol>
			</nav>
	</div>
<hr>
<a href="?url=proses_peminjaman.php" class="btn btn-primary"><i class="fa fa-arrow-left me-1"></i> Kembali</a>
<form action="" method="post" class="row gx-0 border rounded-3 mt-4 p-3">
	<div class="col-sm-4 pt-2">
		<div class="form-group mb-4">
			<label for="" class="mb-2">Nama Anggota</label>
			<input type="text" disabled value="<?= $datas->nama_anggota?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Email Pengguna</label>
			<input type="text" disabled value="<?= $datas->email?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Jenis Kelamin Pengguna</label>
			<input type="text" disabled value="<?= $datas->jenis_kelamin?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Alamat Pengguna</label>
			<input type="text" disabled value="<?= $datas->alamat?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">No. Telp Pengguna</label>
			<input type="text" disabled value="<?= $datas->no_telp?>" class="form-control">
		</div>
	</div>
	<div class="col-sm-4 d-flex justify-content-center align-items-center flex-column grid gap-4">
		<img src="../assets/img_buku/<?= $datas->gambar_buku?>" class="rounded-3" alt="" width="250px" height="250px">
		<div class="form-group">
			<a href="../../controller/HapusData.php?id_valid=<?= $_GET['id']?>" class="btn btn-success me-2">Terima</a>
			<a href="../../controller/HapusData.php?id_invalid=<?= $_GET['id']?>" class="btn btn-danger">Tolak</a>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group mb-4">
			<label for="" class="mb-2">Id Buku</label>
			<input type="text" disabled value="<?= $datas->id_buku?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Judul Buku</label>
			<input type="text" disabled value="<?= $datas->judul_buku?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Jenis Buku</label>
			<input type="text" disabled value="<?= $datas->jenis_buku?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Penerbit Buku</label>
			<input type="text" disabled value="<?= $datas->penerbit?>" class="form-control">
		</div>
		<div class="form-group mb-4">
			<label for="" class="mb-2">Estimasi Peminjaman</label>
			<input type="text" disabled value="<?= '['.$datas->tanggal_peminjaman. ']<-->[' .$datas->estimasi_peminjaman.']'?>" class="form-control">
		</div>
	</div>
</form>
</div>