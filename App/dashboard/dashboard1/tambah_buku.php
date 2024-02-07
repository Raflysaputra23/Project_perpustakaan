<?php 

require_once '../../init.php';


if (isset($_POST['tambah'])) {
	$tambah = new TambahBukuAll($_POST);
	$return = $tambah->tambahBukuAlls($_FILES);
	if ($return > 0) {
		$_SESSION['buku1'] = true;
		echo "<script>window.location.assign('cookie.php')</script>";
	} else {
		$_SESSION['buku0'] = true;
		echo "<script>window.location.assign('cookie.php')</script>";

}
}

 ?>



 <div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end">
		<h2>Profil</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item active" aria-current="page">Profil</li>
				 </ol>
			</nav>
	</div>
<hr>
<?php if (isset($_COOKIE['tambahBuku1'])): ?>
	<div id="tambahBuku1"></div>
<?php elseif(isset($_COOKIE['tambahBuku0'])) : ?>
	<div id="tambahBuku0"></div>
<?php endif;?>

<form action="" class="border rounded-3 px-5 pb-4" method="post" enctype="multipart/form-data">
<div class="row gx-0">
	<div class="col-sm-4 py-4 gx-0 position-relative d-flex justify-content-start align-items-center">
		<img src="../assets/img_user/user.png" alt="" width="230px" height="280px" class="rounded-5 border border-black">
		<div class="overflow-hidden file bg-primary">
			<input type="file" name="gambar_buku" class="opacity-0">
			<i class="fa fa-camera position-absolute"></i>
		</div>
	</div>
	<div class="col-sm-8 gx-0 py-4">
		<div class="form-group">
			<label for="judul_buku" class="mb-1">Judul Buku</label>
			<input type="text" name="judul_buku" class="form-control" required>
		</div>
		<div class="form-group mt-3">
			<label for="jenis_buku" class="mb-1">Jenis Buku</label>
			<input type="text" name="jenis_buku" class="form-control" required>
		</div>
		<div class="form-group mt-3">
			<label for="penerbit" class="mb-1">Penerbit</label>
			<input type="text" name="penerbit" class="form-control" required>
		</div>
		<div class="form-group mt-4">
			<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-plus text-white me-1"></i> Tambah</button>
		</div>
	</div>
</div>
</div>
</form>
</div>