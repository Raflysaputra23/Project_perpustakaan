<?php 


if (!isset($_GET['url'])) {
	header('location: ../../../index.php');
}

require_once '../../init.php';

$datas = new SelectBuku();
$data_buku = $datas->getAllBuku();
$data_buku_komik = $datas->getKomikBuku();
$data_buku_sejarah = $datas->getSejarahBuku();
$data_buku_anime = $datas->getAnimeBuku();
$data = mysqli_fetch_object($datas->getAllBuku());
 ?>




<div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end">
		<h2>Data Buku</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
				 </ol>
			</nav>
	</div>
<hr>
<div class="container-fluid gx-0">
	<?php if (isset($_COOKIE['valid'])): ?>
		<div class="alert alert-info d-flex justify-content-between">
			<span>Proses berhasil tunggu respon dari admin!</span>
		</div>
	<?php elseif (isset($_COOKIE['invalid'])) : ?>
		<div class="alert alert-danger d-flex justify-content-between">
			<span>Proses peminjaman Gagal!</span>
			<a href="hapus_cookie.php" class="text-decoration-none text-black">X</a>
		</div>
	<?php elseif (isset($_COOKIE['alertTolak1'])) :?>
		<div class="alert alert-danger d-flex justify-content-between">
			<span>Peminjaman ditolak</span>
			<a href="hapus_cookie.php" class="text-decoration-none text-black">X</a>
		</div>
	<?php elseif (isset($_COOKIE['alertTerima'])) :?>
		<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
		  <symbol id="check-circle-fill" viewBox="0 0 16 16">
		    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
		  </symbol>
		  
		  
		</svg>
		<div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
			 <div class="d-flex">
		 		 <svg class="bi flex-shrink-0 me-2" style="width: 25px; height: 25px;" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
		 	<div>
		    	Permintaan diterima
		    </div>
		  	</div>
				<a href="hapus_cookie.php" class="text-decoration-none text-black">X</a>
			</div>
	<?php endif;?>
	

	<div class="row mb-4 mt-5 gx-0">
		<div class="col-sm-2">
			<a href="?url=tambah_buku.php" class="btn btn-primary py-2"><i class="fa fa-plus text-white me-1"></i> Tambah buku</a>
		</div>
		<ul class="border border-primary py-2 col-sm-2 rounded-2 px-3">
			<li class="nav-item dropdown">
		      <a class="nav-link text-primary d-flex justify-content-between" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pilih Buku <span class="dropdown-toggle"></span></a>
		      <ul class="dropdown-menu">
		        <li><a class="dropdown-item" href="?url=data_buku.php">Lihat Semua</a></li>
		      	<li><hr class="dropdown-divider"></li>
		        <li><a class="dropdown-item" href="?url=data_buku.php&jenis_buku=komik">Komik</a></li>
		        <li><a class="dropdown-item" href="?url=data_buku.php&jenis_buku=sejarah">Sejarah</a></li>
		        <li><a class="dropdown-item" href="?url=data_buku.php&jenis_buku=anime">Anime</a></li>
		      </ul>
		    </li>
	    </ul>
	</div>
	<div class="row gx-0 overflow-auto scroll" style="height: 430px;">
		<?php if (isset($_GET['jenis_buku'])) { ?>
			<?php if ($_GET['jenis_buku'] == 'komik'): ?>
				<?php foreach ($data_buku_komik as $data_book): ?>
						<div class="col-3">
							<div class="card mb-3" style="width: 250px !important;">
							  <div class="row g-0">
							    <div class="col-md-5">
							      <img src="../assets/img_buku/<?= $data_book['gambar_buku']?>" class="rounded-start" alt="..." width="100%">
							    </div>
							    <div class="col-md-7">
							      <div class="card-body">
							        <h5 class="card-title text-capitalize"><?= $data_book['judul_buku']?></h5>
							        <p class="card-text pt	-2">This is a wider</p>
							      </div>
							    </div>
							  </div>
							   <ul class="list-group list-group-flush">
							    <li class="list-group-item"><p class="card-text"><small class="text-body-secondary"><?= $data_book['tanggal_terbit']?></small></p></li>
							    <li class="list-group-item"><?= $data_book['jenis_buku']?></li>
							    <li class="list-group-item d-flex justify-content-center">
							   		<a href="?url=halaman_pinjam.php&id=<?= $data_book['id_buku']?>" class="btn btn-primary">Pinjam</a>
							    </li>
							  </ul>
							</div>
						</div>
				<?php endforeach ?>
				<?php if (mysqli_num_rows($data_buku_komik) == 0): ?>
					<h2 class="text-center text-capitalize" style="margin-top: 120px;"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
			<?php elseif($_GET['jenis_buku'] == 'sejarah') : ?>
				<?php foreach ($data_buku_sejarah as $data_book): ?>
						<div class="col-3">
							<div class="card mb-3" style="width: 250px !important;">
							  <div class="row g-0">
							    <div class="col-md-5">
							      <img src="../assets/img_buku/<?= $data_book['gambar_buku']?>" class="rounded-start" alt="..." width="100%">
							    </div>
							    <div class="col-md-7">
							      <div class="card-body">
							        <h5 class="card-title text-capitalize"><?= $data_book['judul_buku']?></h5>
							        <p class="card-text pt	-2">This is a wider</p>
							      </div>
							    </div>
							  </div>
							   <ul class="list-group list-group-flush">
							    <li class="list-group-item"><p class="card-text"><small class="text-body-secondary"><?= $data_book['tanggal_terbit']?></small></p></li>
							    <li class="list-group-item"><?= $data_book['jenis_buku']?></li>
							    <li class="list-group-item d-flex justify-content-center">
							    	<a href="?url=halaman_pinjam.php&id=<?= $data_book['id_buku']?>" class="btn btn-primary">Pinjam</a>
							    </li>
							  </ul>
							</div>
						</div>
				<?php endforeach ?>
				<?php if (mysqli_num_rows($data_buku_sejarah) == 0): ?>
					<h2 class="text-center text-capitalize" style="margin-top: 120px;"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
			<?php elseif($_GET['jenis_buku'] == 'anime') : ?>
				<?php foreach ($data_buku_anime as $data_book): ?>
						<div class="col-3">
							<div class="card mb-3" style="width: 250px !important;">
							  <div class="row g-0">
							    <div class="col-md-5">
							      <img src="../assets/img_buku/<?= $data_book['gambar_buku']?>" class="rounded-start" alt="..." width="100%">
							    </div>
							    <div class="col-md-7">
							      <div class="card-body">
							        <h5 class="card-title text-capitalize"><?= $data_book['judul_buku']?></h5>
							        <p class="card-text pt	-2">This is a wider</p>
							      </div>
							    </div>
							  </div>
							   <ul class="list-group list-group-flush">
							    <li class="list-group-item"><p class="card-text"><small class="text-body-secondary"><?= $data_book['tanggal_terbit']?></small></p></li>
							    <li class="list-group-item"><?= $data_book['jenis_buku']?></li>
							    <li class="list-group-item d-flex justify-content-center">
							    	<a href="?url=halaman_pinjam.php&id=<?= $data_book['id_buku']?>" class="btn btn-primary">Pinjam</a>
							    </li>
							  </ul>
							</div>
						</div>
				<?php endforeach ?>
				<?php if (mysqli_num_rows($data_buku_anime) == 0): ?>
					<h2 class="text-center text-capitalize" style="margin-top: 120px;"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
			<?php endif; ?>
		<?php }else { ?>
			<?php foreach ($data_buku as $data_book): ?>
				
						<div class="col-3">
							<div class="card mb-3" style="width: 250px !important;">
							  <div class="row g-0">
							    <div class="col-md-5">
							      <img src="../assets/img_buku/<?= $data_book['gambar_buku']?>" class="rounded-start" alt="..." width="100%">
							    </div>
							    <div class="col-md-7">
							      <div class="card-body">
							        <h5 class="card-title text-capitalize"><?= $data_book['judul_buku']?></h5>
							        <p class="card-text pt	-2">This is a wider</p>
							      </div>
							    </div>
							  </div>
							   <ul class="list-group list-group-flush">
							    <li class="list-group-item"><p class="card-text"><small class="text-body-secondary"><?= $data_book['tanggal_terbit']?></small></p></li>
							    <li class="list-group-item"><?= $data_book['jenis_buku']?></li>
							    <li class="list-group-item d-flex justify-content-center">
							    	<a href="?url=halaman_pinjam.php&id=<?= $data_book['id_buku']?>" class="btn btn-primary">Pinjam</a>
							    </li>
							  </ul>
							</div>
						</div>
				<?php endforeach ?>
				<?php if (mysqli_num_rows($data_buku) == 0): ?>
					<h2 class="text-center text-capitalize" style="margin-top: 120px;"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
		<?php }?>
	</div>
</div>
</div>


