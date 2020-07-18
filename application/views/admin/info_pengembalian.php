  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Anggota</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
  				</div><!-- /.col -->
  			</div><!-- /.row -->
  		</div><!-- /.container-fluid -->
  	</div>
  	<!-- /.content-header -->

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<!-- Main row -->
  			<div class="row">
  				<div class="col-md-12">
  					<div class="card">
  						<div class="card-body">
  							<?php foreach($anggota as $_detail_anggota): ?>
  							<div class="card-header">
  								<h4><?= $_detail_anggota->nama_anggota ?></h4>
  							</div>
  							<div class="card-body">
  								<div class="row">
  									<div class="col-lg-3 mr-auto">
  										<img class="card-img-top"
  											src="<?= base_url(). 'assets/upload/anggota/'. $_detail_anggota->foto?> "
  											alt="<?= $_detail_anggota->foto ?>">
  									</div>
  									<div class="col-lg-2">
  										<table class="table table-responsive">
  											<tr>
  												<th>ID</th>
  												<td><?= $_detail_anggota->id_anggota ?></td>
  											</tr>
  											<tr>
  												<th>Nama</th>
  												<td><?= $_detail_anggota->nama_anggota ?></td>
  											</tr>
  											<tr>
  												<th>No Telp</th>
  												<td><?= $_detail_anggota->tlp_anggota ?></td>
  											</tr>
  											<tr>
  												<th>Alamat</th>
  												<td><?= $_detail_anggota->alamat ?></td>
  											</tr>
  										</table>
  									</div>
  									<div class="col-lg-7 mt-0">
  										<div clas="table-responsive">
  											<table class="table table-hover" id="example2">
  												<thead>
  													<th>ISBN</th>
  													<th>Judul Buku</th>
  													<th>Kode Petugas</th>
  													<th>Tanggal Pinjam</th>
  													<th>Tanggal Kembali</th>
  													<th>Aksi</th>
  												</thead>
  												<tbody>
  													<?php foreach($pengembalian as $_peminjaman_buku):?>
  													<tr>
  														<td><?= $_peminjaman_buku->id_buku ?></td>
  														<td><?= $_peminjaman_buku->judul_buku ?></td>
  														<td><?= $_peminjaman_buku->id_petugas ?></td>
  														<td><?= $_peminjaman_buku->jumlah_buku ?></td>
  														<td><?= $_peminjaman_buku->tanggal_pinjam ?></td>
  														<td><?= $_peminjaman_buku->tanggal_kembali ?></td>
  														<td>
  															<?= anchor(base_url('admin/peminjaman/delete_pinjaman/'. $_peminjaman_buku->id_peminjaman), '<div class="btn btn-danger btn-action"><i class="fas fa-times"></i></div>')?>
  														</td>
  													</tr>
  													<?php endforeach;?>
  												</tbody>
  											</table>
  										</div>

  									</div>
  								</div>
  							</div>
  							<?php endforeach;?>
  						</div>
  					</div>
  				</div>
  			</div>
  			<!-- /.row (main row) -->
  		</div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->