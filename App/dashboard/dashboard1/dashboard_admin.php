<?php 

require_once '../../init.php';
session_start();

if (isset($_COOKIE['swet'])) { ?>
	<div id="swetlogin"></div>
<?php } 
if (!isset($_SESSION['level'])) {
	header('location: ../../../index.php');
}
if ($_SESSION['level'] == 'petugas' || $_SESSION['level'] == 'user') {
		header('location:../../../index.php');
}

$data = new SelectUser($_SESSION['id']);
$datas = $data->getUser();

$data_buku = new SelectBuku();
$jumlah_buku = mysqli_num_rows($data_buku->getAllBuku());


 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- MY STYLE CSS -->
	<link rel="stylesheet" href="../style.css">

	<!-- FONTS GOOGLE -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,300&family=Montserrat:wght@300&family=Oswald:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">

	<!-- FONTAWESOMES -->
	<link rel="stylesheet" href="../../../Tools/fontawesome/css/font-awesome.min.css">

	<style>
		<?php require_once '../style.css'; ?>
	</style>
</head>
<body class="overflow-hidden">	

	<!-- START NAVBAR -->
	<nav class="navbar bg-body-secondary border-bottom">
	  <div class="container-fluid pe-3 ps-2">
	    <a class="navbar-brand text-uppercase fw-semibold judul ps-2"><img src="../assets/img_web/perpus.png" width="40px" height="40px" alt="" class="me-2">Perpustakaan</a>
	    <div class="profil d-flex grid gap-0 column-gap-3">
	     <img src="../assets/img_user/<?= $datas->gambar_anggota;?>" alt="" width="50px" height="50px" class="rounded-5">
	     <div class="line-height pt-1">
	    	<h6 class="fw-semibold">Hi, Admin</h6>
	    	<p>Rafly Saputra</p>
	     </div>
	    </div>
	      <button type="submit" class="btn btn-outline-danger text-uppercase outs fw-semibold font-size d-flex justify-content-center align-items-center grid gap-0 column-gap-2" type="submit" onclick="logout()">Log out <i class="fa fa-arrow-right out text-danger"></i></button>
	      <button class="btn btn-outline-primary rafly" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
		  <span></span>
		  <span></span>
		  <span></span>
		</button>

		<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
		  <div class="offcanvas-header">
		    <h5 class="offcanvas-title text-uppercase fw-semibold" id="staticBackdropLabel">Perpustakaan</h5>
		    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		  </div>
		  <div class="offcanvas-body">
		    <div>
		      <div class="container-fluid">
		      	
		      </div>
		    </div>
		  </div>
		</div>
	  </div>
	</nav>
	<!-- END NAVBAR -->

	<!-- START NAVIGASI -->
	<div class="row">
			<aside class="col-xl-2 gx-0">
				<div class="container-rafly bg-body-secondary py-5">
					<div class="container-fluid d-flex flex-column align-items-center">
						<div class="position-relative">
						<a href="dashboard_admin.php?url=profil.php" title="Klik untuk melihat profil"><img src="../assets/img_user/<?= $datas->gambar_anggota; ?>" alt="" width="80px" height="80px" class="rounded-5"></a>
						<div class="online"></div>
						<div class="mypovers">
							online
						</div>
						</div>
						<h5 class="fw-semibold mt-3">Hi, Admin</h5>
						<p class="lh-1 text-capitalize"><?= $_SESSION['username'];?></p>
					</div>
					<div class="container-fluid d-flex flex-column gx-0 mt-5">
						<?php if (isset($_GET['url'])) {
							$file = $_GET['url'];
							switch ($file) {
								case 'data_pengguna.php': ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-primary border-0 border-bottom border-primary py-4 position-relative prover-dashboard prover-pengguna">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">History</a>
							<?php break;
								case 'data_buku.php': ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-primary border-0 border-bottom border-primary py-4 position-relative prover-dashboard prover-buku">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">History</a>
							<?php break;
							case 'halaman_pinjam.php': ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-primary border-0 border-bottom border-primary py-4 position-relative prover-dashboard prover-buku">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">History</a>
							<?php break;
								case 'riwayat.php': ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-primary border-0 border-bottom border-primary py-4 position-relative prover-dashboard prover-riwayat">History</a>
							<?php break;
							case 'proses_peminjaman.php': ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-primary border-0 border-bottom border-primary position-relative prover-dashboard prover-pinjam py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4 position-relative">History</a>
							<?php break;
								default: ?>
									<a href="dashboard_admin.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4 prover-dashboard position-relative">Dashboard</a>
									<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
									<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Daftar buku</a>
									<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
									<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">History</a>
							<?php break;
							}
						} else { ?>
						<a href="dashboard_admin.php" class="btn btn-primary border-0 border-bottom border-primary py-4 prover-dashboard position-relative">Dashboard</a>
						<a href="dashboard_admin.php?url=data_pengguna.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Data pengguna</a>
						<a href="dashboard_admin.php?url=data_buku.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Daftar buku</a>
						<a href="dashboard_admin.php?url=proses_peminjaman.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">Permintaan Peminjaman</a>
						<a href="dashboard_admin.php?url=riwayat.php" class="btn btn-outline-primary border-0 border-bottom border-primary py-4">History</a>
					<?php } ?>
					</div>
				</div>
			</aside>
	<!-- END NAVIGASI -->

	<!-- START MAIN -->
			<main class="col-xl-10 gx-0">
				<!-- ATUR FILE -->
					<?php 
					if (isset($_GET['url'])) {
						include $_GET['url'];
					} else { ?>
				<div class="container-rafly px-5 py-4 position-relative">
					<div class="d-flex justify-content-between align-items-end">
						<h2>Dashboard</h2>
						<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
						  <ol class="breadcrumb">
						    <li class="breadcrumb-item">Home</li>
						    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						  </ol>
						</nav>
					</div>
					<hr>
					<div class="row gx-0">
						<div class="col-3">
							<div class="card overflow-hidden linear-blue">
								<div class="row">
									<div class="col-7 d-flex flex-column align-items-center justify-content-between py-3">
										<h3 class="fw-semibold"><?= $data->getData()?></h3>
										<p>Anggota</p>
									</div>
									<div class="col-5 d-flex justify-content-start align-items-center">
										<img src="../assets/img_user/user.png" alt="" class="object-fit-cover" width="80%">
									</div>
								</div>
								<div class="card-footer text-body-secondary text-center">
							   	 	<a href="dashboard_admin.php?url=data_pengguna.php" class="text-decoration-none text-secondary fw-semibold font-size d-flex justify-content-center grid gap-0 column-gap-2">Lihat selengkapnya <i class="fa fa-arrow-right icon text-primary"></i></a>
							 	</div>
							</div>
						</div>
						<div class="col-3">
							<div class="card overflow-hidden linear-green">
								<div class="row">
									<div class="col-7 d-flex flex-column align-items-center justify-content-between py-3">
										<h3 class="fw-semibold"><?= $jumlah_buku;?></h3>
										<p>Buku</p>
									</div>
									<div class="col-5 d-flex justify-content-start align-items-center">
										<img src="../assets/img_web/buku.png" alt="" class="object-fit-cover" width="90%">
									</div>
								</div>
								<div class="card-footer text-body-secondary text-center">
							   	 	<a href="dashboard_admin.php?url=data_buku.php" class="text-decoration-none text-secondary fw-semibold font-size d-flex justify-content-center grid gap-0 column-gap-2">Lihat selengkapnya <i class="fa fa-arrow-right icon text-success"></i></a>
							 	</div>
							</div>
						</div>
						<div class="col-3">
							<div class="card overflow-hidden linear-red">
								<div class="row">
									<div class="col-7 d-flex flex-column align-items-center justify-content-between py-3">
										<h3 class="fw-semibold"><?= mysqli_num_rows($data->getDataRiwayat())?></h3>
										<p>Dipinjam</p>
									</div>
									<div class="col-5 d-flex justify-content-start align-items-center position-relative">
										<img src="../assets/img_web/buku.png" alt="" class="object-fit-cover" width="90%">
										<i class="fa fa-minus position-absolute"></i>
									</div>
								</div>
								<div class="card-footer text-body-secondary text-center">
							   	 	<a href="?url=riwayat.php" class="text-decoration-none text-secondary fw-semibold font-size d-flex justify-content-center grid gap-0 column-gap-2">Lihat selengkapnya <i class="fa fa-arrow-right icon text-danger"></i></a>
							 	</div>
							</div>
						</div>
						<div class="col-3">
							<div class="card overflow-hidden linear-yellow">
								<div class="row">
									<div class="col-7 d-flex flex-column align-items-center justify-content-between py-3">
										<h3 class="fw-semibold">0</h3>
										<p>Dikembalikan</p>
									</div>
									<div class="col-5 d-flex justify-content-start align-items-center position-relative">
										<img src="../assets/img_web/buku.png" alt="" class="object-fit-cover" width="90%">
										<i class="fa fa-plus position-absolute"></i>
									</div>
								</div>
								<div class="card-footer text-body-secondary text-center">
							   	 	<a href="" class="text-decoration-none text-secondary fw-semibold font-size d-flex justify-content-center grid gap-0 column-gap-2">Lihat selengkapnya <i class="fa fa-arrow-right icon text-warning"></i></a>
							   	 	
							 	</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</main>
		</div>

	<!-- END NAVIGASI -->




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!-- SWEET ALERT2 -->
	<script src='../../../Tools/swetalert/sweetalert2.all.min.js'></script>
	<script>
		var flash = document.getElementById('swetlogin')
		const updateValid = document.getElementById('updateValid')
		const updateInvalid = document.getElementById('updateInvalid')
		const profil = document.getElementById('profil');
		const berhasilPinjam = document.getElementById('berhasilPinjam')
		const alerthapus = document.getElementById('alerthapus')
		const alertgagalhapus = document.getElementById('alertgagalhapus')
		const alertTolak = document.getElementById('alerttolak')
		const tambahBuku1 = document.getElementById('tambahBuku1')
		const tambahBuku0 = document.getElementById('tambahBuku0')


			if (flash) {
			const Toast = Swal.mixin({
			  toast: true,
			  position: 'top',
			  showConfirmButton: false,
			  timer: 3000,
			  timerProgressBar: true,
			  didOpen: (toast) => {
			    toast.onmouseenter = Swal.stopTimer;
			    toast.onmouseleave = Swal.resumeTimer;
			  }
			});
			Toast.fire({
			  icon: 'success',
			  title: 'Berhasil masuk!'
			});
			}
			
			if (updateValid) {
				Swal.fire({
				  icon: "success",
				  title: "Data Kamu berhasil diubah",
				  showConfirmButton: false,
				  timer: 2000
				});
			}
			if (updateInvalid) {
				Swal.fire({
				  icon: "error",
				  title: "Data kamu tidak berhasil diedit",
				  showConfirmButton: false,
				  timer: 2000
				});
			}
			if (berhasilPinjam) {
				Swal.fire({
				  title: "Berhasil",
				  text: "Klik untuk beralih halaman",
				  icon: "success",
				  confirmButtonColor: "blue",
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = 'cookie.php';
					}
				});
			}
			function logout() {
				Swal.fire({
				  title: "Apakah kamu yakin?",
				  text: "ingin keluar dari halaman ini",
				  icon: "warning",
				  showCancelButton: true,
				  confirmButtonColor: "#3085d6",
				  cancelButtonColor: "#d33",
				  confirmButtonText: "Yes, Keluar!"
				}).then((result) => {
				  if (result.isConfirmed) {
				  	window.location.href = '../../controller/Logout.php';
				  }else {
				  	 Swal.fire({
				      title: "Tidak jadi!",
				      text: "Baiklah silahkan melihat website kami",
				      icon: "info",
				      confirmButtonText: 'OKE',
				    });
				  }
				});
			}
			
			if (alerthapus) {
				Swal.fire({
				  icon: "success",
				  title: "Permintaan berhasil diterima",
				  showConfirmButton: false,
				  timer: 2000
				});
			}
			if (alertgagalhapus) {
				Swal.fire({
				  icon: "error",
				  title: "Permintaan gagal diterima",
				  showConfirmButton: false,
				  timer: 2000
				});
			}
			if (alertTolak) {
				Swal.fire({
				  icon: "info",
				  title: "Permintaan ditolak",
				  showConfirmButton: false,
				  timer: 2000
				});
			}
			if (tambahBuku1) {
				Swal.fire({
				  title: "Berhasil!",
				  text: "Buku berhasil ditambah",
				  icon: "success",
				  confirmButtonColor: "blue",
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = '?url=data_buku.php';
					}
				});
			}
			if (tambahBuku0) {
				Swal.fire({
				  title: "Gagal!",
				  text: "Buku tidak berhasil ditambah",
				  icon: "error",
				  confirmButtonColor: "blue",
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = '?url=tambah_buku.php';
					}
				});
			}



	</script>
</body>
</html>