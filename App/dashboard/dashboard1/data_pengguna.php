<?php 
require_once '../../init.php';
$datas = new SelectUser();
$datass = $datas->getAllUser($_GET);

if (isset($_POST['cari2'])) {
	$datas = new SelectUser();
	$datass = $datas->getUniqUser($_POST['cari']);
}
 ?>



<div class="container-rafly px-5 py-4">
	<div class="d-flex justify-content-between align-items-end">
		<h2>Data Pengguna</h2>
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				 <ol class="breadcrumb">
					 <li class="breadcrumb-item">Home</li>
					 <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
				 </ol>
			</nav>
	</div>
<hr>
<div class="container-fluid gx-0 mt-5">
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
			  	<?php if ($datas->getHalamanAktif() > 1) { ?>
			  		<li class="page-item">
			      	<a class="page-link" href="?url=data_pengguna.php&halaman=<?= $datas->getHalamanAktif() - 1?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			  	<?php } ?>
			  	<?php for ($i=1; $i <= SelectUser::$jumlahHalaman; $i++) {  ?>
			  		<?php if ($i == $datas->getHalamanAktif()) { ?>
			  			 <li class="page-item"><a class="page-link active" href="?url=data_pengguna.php&halaman=<?= $i;?>"><?= $i;?></a></li>
			  		<?php }else{?>
			  		 	<li class="page-item"><a class="page-link" href="?url=data_pengguna.php&halaman=<?= $i;?>"><?= $i;?></a></li>
			  		<?php }} ?>
			    <?php if ($datas->getHalamanAktif() < SelectUser::$jumlahHalaman) { ?>
			    	<li class="page-item">
				      <a class="page-link" href="?url=data_pengguna.php&halaman=<?= $datas->getHalamanAktif() + 1?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
			    <?php }else { ?>
			    	<li class="page-item">
				      <a class="page-link invisible" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
			    <?php } ?>
			    

			  </ul>
			</nav>
		</div>	
	</div>
		<div class="row gx-0">
			<div class="col-12 gx-0">
				<table class="table table-bordered table-striped mt-1">
				  <thead>
				  	<tr>
				  		<th>No</th>
				  		<th>Nama Pengguna</th>
				  		<th>Email</th>
				  		<th>No. Telp</th>
				  		<th>Alamat</th>
				  		<th>Jenis Kelamin</th>
				  	</tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$no = $datas->getAwalData() + 1;
				  	foreach ($datass as $data): ?>

				  	<tr>
				  		<td class="text-center"><?= $no;?></td>
				  		<td><?= $data['nama_anggota'];?></td>
				  		<td><?= $data['email'];?></td>
				  		<td><?= $data['no_telp'];?></td>
				  		<td><?= $data['alamat'];?></td>
				  		<td><?= $data['jenis_kelamin'];?></td>
				  	</tr>
					<?php 
					$no++;
					endforeach ?>
				  </tbody>
				</table>
				<?php if (mysqli_num_rows($datass) == 0): ?>
					<h2 class="text-center text-capitalize mt-5"><i class="fa fa-search"></i> Not found</h2>
				<?php endif ?>
			</div>
		</div>
</div>
</div>

