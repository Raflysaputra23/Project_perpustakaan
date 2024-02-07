<?php 


if (!isset($_GET['url'])) {
	header('location: ../../../index.php');
}

require_once '../../init.php';

$data = new SelectUser();
$halaman  = $data->getDataRiwayat($_GET);

if (isset($_GET['ids'])) {
	$hapus = new HapusData($_GET['ids']);
	$hapus_data = $hapus->HapusDataRiwayat();

	if ($hapus_data > 0) {
		$_SESSION['berhasill'] = true;
		echo "<script>window.location.assign('cookie.php')</script>";
	} else {
		$_SESSION['gagall'] = true;
		echo "<script>window.location.assign('cookie.php')</script>";

	}
}



 ?>



<div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end">
		<h2>Riwayat</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
				 </ol>
			</nav>
	</div>
<hr>
<div class="container-fluid gx-0 border mt-5 pt-3 pb-1 px-3 rounded-3">
	<?php if (isset($_COOKIE['berhasilll'])): ?>
		<div id="berhasil"></div>
	<?php elseif(isset($_COOKIE['gagalll'])): ?>
		<div id="gagal"></div>
	<?php endif;?>
	<div class="row">
		<form class="col-sm-6 controls" method="post" action="">
			<div class="form-group control">
				<input type="text" name="cari" id="cari" class="form-control" size="50px" autofocus>
			</div>
			<div class="form-group">
				<button type="submit" name="cari2" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
			</div>
		</form>
		<div class="col-sm-6 d-flex justify-content-end	">
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
				<?php if ($data->getHalamanAktif() > 1) { ?>
					 <li class="page-item">
				      <a class="page-link" href="dashboard_admin.php?url=riwayat.php&aktif=<?= $data->getHalamanAktif() - 1?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				<?php } ?>
			   <?php for ($i = 1; $i <= $data->getHalaman(); $i++) { ?>
			   	     <?php if ($i == $data->getHalamanAktif()) { ?>
			   	     	 <li class="page-item"><a class="page-link active" href="dashboard_admin.php?url=riwayat.php&aktif=<?= $i?>"><?= $i?></a></li>
			   	     <?php }else { ?>
			   	     	 <li class="page-item"><a class="page-link" href="dashboard_admin.php?url=riwayat.php&aktif=<?= $i?>"><?= $i?></a></li>
			   	     <?php } ?>
			  <?php } ?>
			   	<?php if ($data->getHalamanAktif() < $data->getHalaman()) { ?>
			   		 <li class="page-item">
				      <a class="page-link" href="dashboard_admin.php?url=riwayat.php&aktif=<?= $data->getHalamanAktif() + 1?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
			   	<?php } ?>
			  </ul>
			</nav>

		</div>	
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table caption-top table-bordered">
			  <caption>Daftar riwayat peminjaman</caption>
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama Pengguna</th>
			      <th scope="col">Alamat</th>
			      <th scope="col">No. Telp</th>
			      <th scope="col">Judul Buku</th>
			      <th scope="col">Estimasi Pengembalian</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	$no = $data->getAwalData() + 1;
			  	foreach ($halaman as $data_riwayat) { ?>
			    <tr>
			      <td class="fw-bold text-center"><?= $no;?></td>
			      <td><?= $data_riwayat['nama_anggota']?></td>
			      <td><?= $data_riwayat['alamat']?></td>
			      <td><?= $data_riwayat['no_telp'];?></td>
			      <td><?= $data_riwayat['judul_buku'];?></td>
			      <td class="text-center"><?= $data_riwayat['estimasi_peminjaman'];?></td>
			      <td class="text-center">
			      	<a href="?url=riwayat.php&ids=<?= $data_riwayat['id_riwayat']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
			      </td>
			    </tr>
			  <?php $no++; } ?>
			  </tbody>
			</table>
			<?php if (mysqli_num_rows($halaman) == 0): ?>
					<h2 class="text-center text-capitalize mt-5 mb-5"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
		</div>
	</div>

	
</div>
</div>

