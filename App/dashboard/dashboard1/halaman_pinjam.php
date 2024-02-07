<?php 

if (!isset($_GET['url'])) {
	header('location: ../../../index.php');
}

require_once '../../init.php';

$data = new SelectUser($_SESSION['id']);
$datas = $data->getUser();

if (isset($_GET['id'])) {
	$dataid = new SelectBuku();
	$data_book = mysqli_fetch_assoc($dataid->getBukuId($_GET['id']));
}

if (isset($_POST['pinjam'])) {
	$proses = new TambahBuku($_POST);
	$returnValue = $proses->tambahBukuId();

	if ($returnValue > 0) {
		$_SESSION['valid'] = true;?>
		 <div id="berhasilPinjam"></div>
	<?php } else {
		$_SESSION['invalid'] = true;
		echo "<script>alert('Proses tidak berhasil!'); window.location.assign('dashboard_admin.php?url=data_buku.php');</script>";
	}
}
 ?>


<div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end">
		<h2>Pastikan data anda sudah benar</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item">Daftar Buku</li>
					 <li class="breadcrumb-item active" aria-current="page">Halaman Pinjam</li>
				 </ol>
			</nav>
	</div>
<hr>
<form action="" class="border rounded-3 px-5 pb-4 overflow-auto" style="height: 530px;" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_buku" value="<?= $data_book['id_buku']?>">
	<input type="hidden" name="id_anggota" value="<?= $datas->Id_anggota?>">
<div class="row gx-0">
	<div class="col-sm-4 py-4 gx-0 position-relative d-flex justify-content-start align-items-center">
		<div class="card mb-3" style="width: 250px !important;">
			 <div class="row g-0">
				 <div class="col-md-5">
					<img src="../assets/img_buku/<?= $data_book['gambar_buku']?>" class="rounded-start" alt="..." width="100%">
				 </div>
				<div class="col-md-7">
				<div class="card-body">
					<h5 class="card-title"><?= $data_book['judul_buku']?></h5>
					<p class="card-text pt-2">This is a wider</p>
				</div>
				</div>
			 </div>
				<ul class="list-group list-group-flush">
				 <li class="list-group-item"><p class="card-text"><small class="text-body-secondary"><?= $data_book['tanggal_terbit']?></small></p></li>
				 <li class="list-group-item"><?= $data_book['jenis_buku']?></li>
			   </ul>
		</div>
	</div>
	<div class="col-sm-8 gx-0 py-4">
		<div class="form-group">
			<label for="username" class="mb-1">Nama Pengguna</label>
			<input type="text" disabled name="username" class="form-control" value="<?= $datas->nama_anggota; ?>"required>
		</div>
		<div class="form-group mt-3">
			<label for="email" class="mb-1">Email</label>
			<input type="email" disabled name="email" class="form-control" value="<?= $datas->email; ?>" required>
		</div>
		<div class="form-group mt-3">
			<label for="no_telp" class="mb-1">No. Telp</label>
			<input type="text" disabled name="no_telp" class="form-control" value="<?= $datas->no_telp; ?>" required>
		</div>
	</div>
</div>
<div class="row gx-0 ">
	<div class="form-group pt-0">
		<label for="alamat" class="mb-1">Alamat</label>
		<textarea name="alamat" disabled id="alamat" class="form-control" required><?= $datas->alamat; ?></textarea>
	</div>
	<div class="form-group mt-3">
			<label for="dates" class="mb-1">Estimasi Peminjaman</label>
			<input type="date" name="dates" id="dates" class="form-control" value="" required>
		</div>
	<div class="form-group mt-3">
		<label for="jenkel" class="mb-1">Jenis Kelamin</label>
		<select name="jenkel" id="jenkel" class="form-control" disabled required>
			<?php if ($datas->jenis_kelamin == 'laki-laki') { ?>
				<option value="laki-laki">Laki-Laki</option>
				<option value="perempuan">Perempuan</option>
			<?php } elseif ($datas->jenis_kelamin == 'perempuan') { ?>
				<option value="laki-laki">Perempuan</option>
				<option value="perempuan">Laki-Laki</option>
			<?php } ?>	
		</select>
	</div>
	<div class="form-group mt-3">
		<button type="submit" name="pinjam" class="btn btn-success">Pinjam</button>
	</div>
</div>
</form>
</div>

