<?php 



if (!isset($_GET['url'])) {
	header('location: ../../../index.php');
}

require_once '../../init.php';

$datas = new SelectUser();


 ?>


<div class="container-rafly px-5 py-4">
	<?php if (isset($_COOKIE['alertHapus'])) { ?>
		<div id="alerthapus"></div>
	<?php }elseif (isset($_COOKIE['alertGagalHapus'])) { ?>
		<div id="alertgagalhapus"></div>
	<?php }elseif (isset($_COOKIE['alertTolak'])) { ?>
		<div id="alerttolak"></div>
	<?php } ?>
	<div class="d-flex justify-content-between align-items-end ">
		<h2>Data permintaan peminjaman</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item active" aria-current="page">Halaman Permintaan</li>
				 </ol>
			</nav>
	</div>
<hr>
<div class="container-fluid gx-0 overflow-auto scrollhilang overflow-auto px-3 pt-3" style="height: 570px;">
	<?php if (mysqli_num_rows($datas->getUserPinjam()) == 0): ?>
		<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
		  <symbol id="info-fill" viewBox="0 0 16 16">
		    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
		  </symbol>
		 </svg>
		 <div class="alert alert-primary d-flex align-items-center" role="alert">
		  <svg class="bi flex-shrink-0 me-2" style="width: 25px; height: 25px;" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		  <div class="ms-1">
		   Belum ada permintaan
		  </div>
		</div>

	<?php endif ?>
	<?php foreach ($datas->getUserPinjam() as $data): ?>
	<div class="alert alert-primary position-relative pe-0 " style="width: 1080px;">
		<div class="row gx-0 d-flex align-items-center">
			<div class="col-sm-2 ms-2" style="width: 65px;">
				<i class="fa fa-exclamation position-absolute z-3" style="font-size: 25px; top: -10px; left: -5px; rotate: 5deg;"></i> 
				<img src="../assets/img_user/<?= $data['gambar_anggota']?>" alt="" width="50px" height="50px" class="rounded-5">
			</div>
			<div class="col-sm-3 lh-1 mt-1">
				<h6 class="text-capitalize"><?= $data['nama_anggota']?></h6>
				<span>Jenis : </span>
				<span class="bg-primary rounded-1 text-white" style="font-size: 15px; padding: 2px 10px !important;"><?= $data['jenis_buku']?></span>
			</div>
			<div class="col-sm-7 ms-5 d-flex justify-content-end grid gap-0 column-gap-2">
				<a href="?url=data_detail.php&id=<?= $data['id_peminjaman'];?>" class="btn btn-outline-primary btn-sm">Data Detail</a>
				<form action="../../controller/HapusData.php?id_valid=<?= $data['id_peminjaman']?>" method="post">
					<input type="hidden" name="id_buku" value="<?= $data['id_buku']?>">
					<input type="hidden" name="id_anggota" value="<?= $data['id_anggota']?>">
					<input type="hidden" name="estimasi_peminjaman" value="<?= $data['estimasi_peminjaman']?>">
					<button type="submit" name="tambah" class="btn btn-success btn-sm">Terima</button>
				</form>
				<a href="../../controller/HapusData.php?id_invalid=<?= $data['id_peminjaman']?>" class="btn btn-danger btn-sm">Tolak</a>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>
</div>