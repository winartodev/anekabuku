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
  													<th>Pengarang</th>
  													<th>Penerbit</th>
  													<th>Jumlah Buku</th>
  													<th>Aksi</th>
  												</thead>
  												<tbody>
  													<?php foreach($peminjaman as $_peminjaman_buku):?>
  													<tr>
  														<td><?= $_peminjaman_buku->id_buku ?></td>
  														<td><?= $_peminjaman_buku->judul_buku ?></td>
  														<td><?= $_peminjaman_buku->nama_pengarang ?></td>
  														<td><?= $_peminjaman_buku->nama_penerbit ?></td>
  														<td><?= $_peminjaman_buku->jumlah_buku ?></td>
  														<td>
  															<a id="detail" data-toggle="modal"
  																data-target="#modal_detail" class="btn btn-success"
  																style="color:white"
  																data-peminjaman="<?= $id_peminjaman?>"
  																data-anggota="<?= $_peminjaman_buku->id_anggota ?>"
  																data-petugas="<?= $this->session->userdata('id_petugas') ?>"
  																data-buku="<?= $_peminjaman_buku->id_buku?>"
  																data-jumlah="<?= $_peminjaman_buku->jumlah_buku?>">
  																<i class="fa fa-info-circle"></i>
  															</a>
  															<?= anchor(base_url('admin/peminjaman/delete_list_pinjaman/'. $_peminjaman_buku->id_buku), '<div class="btn btn-danger btn-action"><i class="fas fa-times"></i></div>')?>
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

  <!-- Modal Detail Buku-->
  <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title">Detail Buku</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form method="POST" action="<?= base_url('admin/peminjaman/verifikasi')?>"
  					enctype="multipart/form-data">
  					<div class="card-body">
                      <div class="form-group">
  							<label>ID Peminjaman</label>
  							<input type="text" name="id_peminjaman"  id="id_peminjaman" class="form-control" readonly>
  						</div>
						  <div class="form-group">
  							<label>ID Petugas</label>
  							<input type="text" name="id_petugas"  id="id_petugas" class="form-control" readonly>
  						</div>
  						<div class="form-group">
  							<label>ID Anggota</label>
  							<input type="text" name="id_anggota"  id="id_anggota" class="form-control" readonly>
  						</div>
  						<div class="form-group">
  							<label>ID Buku</label>
  							<input type="text" name="id_buku" id="id_buku" class="form-control" readonly>
  						</div>
  						<div class="form-group">
  							<label>Jumlah Buku</label>
  							<input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control" readonly>
  						</div>
                        <div class="form-group">
  							<label>Tanggal Peminjaman</label>
  							<input type="date" name="tanggal_pinjam" class="form-control" required>
  						</div>
                          <div class="form-group">
  							<label>Tanggal Pengembalian</label>
  							<input type="date" name="tanggal_kembali" class="form-control" required>
  						</div>
  					</div>
  					<div class="mt-2 text-right">
  						<button class="btn btn-primary mr-2" type="submit"> <i
  								class="fa fa-check mr-1"></i>Verifikasi</button>
  					</div>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- /.Modal Detail Buku-->

  <script>
  	$(document).ready(function () {
  		$(document).on('click', '#detail', function () {
            var peminjaman = $(this).data('peminjaman');
            var anggota = $(this).data('anggota');
            var petugas = $(this).data('petugas');
            var buku = $(this).data('buku');
            var jumlah = $(this).data('jumlah');
            $('#id_peminjaman').val(peminjaman);
            $('#id_anggota').val(anggota);
            $('#id_petugas').val(petugas);
            $('#id_buku').val(buku);
            $('#jumlah_buku').val(jumlah);
  		})          
  	});
  </script>