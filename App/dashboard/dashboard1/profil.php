<?php 
require_once '../../init.php';


$data = new SelectUser($_SESSION['id']);
$datas = $data->getUser();

 ?>


<div class="container-rafly px-5 py-4">
	<?php if (isset($_COOKIE['swetValidUpdate'])): ?>
		<div id="updateValid"></div>
	<?php elseif(isset($_COOKIE['swetInvalidUpdate'])) : ?>
		<div id="updateInvalid"></div>
	<?php endif; ?>
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
<form action="../../controller/UpdateUser.php?id=<?= $_SESSION['id'];?>" class="border rounded-3 px-5 pb-4" method="post" enctype="multipart/form-data">
<div class="row gx-0">
	<input type="hidden" name="gambar" value="<?= $datas->gambar_anggota?>">
	<div class="col-sm-4 py-4 gx-0 position-relative d-flex justify-content-start align-items-center">
		<img src="../assets/img_user/<?= $datas->gambar_anggota;?>" alt="" width="220px" height="220px" class="rounded-5 border border-black">
		<div class="overflow-hidden file bg-primary">
			<input type="file" name="gambar" class="opacity-0">
			<i class="fa fa-camera position-absolute"></i>
		</div>
	</div>
	<div class="col-sm-8 gx-0 py-4">
		<div class="form-group">
			<label for="username" class="mb-1">Nama Pengguna</label>
			<input type="text" name="username" class="form-control" value="<?= $datas->nama_anggota; ?>"required>
		</div>
		<div class="form-group mt-3">
			<label for="email" class="mb-1">Email</label>
			<input type="email" name="email" class="form-control" value="<?= $datas->email; ?>" required>
		</div>
		<div class="form-group mt-3">
			<label for="no_telp" class="mb-1">No. Telp</label>
			<input type="text" name="no_telp" class="form-control" value="<?= $datas->no_telp; ?>" required>
		</div>
	</div>
</div>
<div class="row gx-0">
	<div class="form-group pt-1">
		<label for="alamat" class="mb-1">Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control" required><?= $datas->alamat; ?></textarea>
	</div>
	<div class="form-group mt-3">
		<label for="jenkel" class="mb-1">Jenis Kelamin</label>
		<select name="jenkel" id="jenkel" class="form-control" required>
			<?php if ($datas->jenis_kelamin == 'laki-laki') { ?>
				<option value="laki-laki">Laki-Laki</option>
				<option value="perempuan">Perempuan</option>
			<?php } elseif ($datas->jenis_kelamin == 'perempuan') { ?>
				<option value="perempuan">Perempuan</option>
				<option value="laki-laki">Laki-Laki</option>
			<?php } ?>	
		</select>
	</div>
	<div class="form-group mt-4">
		<button type="submit" name="update" class="btn btn-success" onclick="ubah();"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>
</form>
</div>

