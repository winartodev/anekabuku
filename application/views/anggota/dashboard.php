  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Dashboard</h1>
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
		  <?= $this->session->flashdata('pesan'); ?>
  			<!-- Main row -->
  			<div class="row text-center">
  				<?php foreach($buku as $_buku): ?>
  				<div class="card ml-4 mb-3 border-0" style="width: 18rem;">
  					<img class="card-img-top" src="<?= base_url(). 'assets/upload/'. $_buku->gambar?>"
  						alt="Card image cap">
  					<div class="card-body">
  						<h5 class="card-text text-bold text-capitalize"><?= $_buku->judul_buku ?></h5>
  						<p class="card-text text-center">
  							<?= word_limiter($_buku->deskripsi_buku, 20) ?>
  							<?php if (strlen($_buku->deskripsi_buku) == 1 || strlen($_buku->deskripsi_buku) == 0): ?>
  							<a href=""></a>
  							<?php else:?>
  							<a type="button" id="read_more" data-toggle="modal" data-target="#modal_read_more"
  								style="color:blue" data-judul="<?= $_buku->judul_buku?>"
  								data-deskripsi="<?= $_buku->deskripsi_buku ?>">
  								Read More
  							</a>
  							<?php endif; ?>
  						</p>
  						<?php if ($_buku->stok_buku == 0): ?>
  						<span class="badge badge-danger">Buku Habis</span>
  						<?php else: ?>
  						<span class="badge badge-success">Buku Tersedia</span>
  						<?php endif; ?>
  						<br>
  						<a id="detail" data-toggle="modal" data-target="#modal_detail"
  							class="btn btn-sm btn-info mt-3" style="color:white" data-id="<?= $_buku->id_buku?>"
  							data-judul="<?= $_buku->judul_buku?>" data-kategori="<?= $_buku->nama_kategori?>"
  							data-penerbit="<?= $_buku->nama_penerbit?>" data-pengarang="<?= $_buku->nama_pengarang?>"
  							data-tahun="<?= $_buku->tahun_terbit_buku?>" data-deskripsi="<?= $_buku->deskripsi_buku?>"
  							data-gambar="<?=  $_buku->gambar?>">
  							<i class="fa fa-info mr-2 ml-auto"></i>
  							Detail Buku
  						</a>
  						<a href="<?= base_url('anggota/dashboard/add_to_list/'. $_buku->id_buku) ?>" class="btn btn-sm btn-primary mt-3" style="color:white">
  							<i class="fa fa-book mr-2 ml-auto"></i>
  							Pinjam Buku
  						</a>
  					</div>
  				</div>
  				<?php endforeach; ?>
  			</div>
  			<!-- /.row (main row) -->
  		</div><!-- /.container-fluid -->
  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Read More-->
  <div class="modal fade" id="modal_read_more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  	aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="judul_buku"></h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<p id="deskripsi_buku" class="text-justify"></p>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- /.Modal Read More-->

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
  				<table class="table table-responsive">
  					<tr>
  						<th>ISBN</th>
  						<td>
  							<span id="dtl_id_buku"></span>
  						</td>
  					</tr>
  					<tr>
  						<th>Judul</th>
  						<td>
  							<span id="dtl_judul_buku"></span>
  						</td>
  					</tr>
  					<tr>
  						<th>Kategori</th>
  						<td>
  							<span id="dtl_kategori_buku"></span>
  						</td>
  					</tr>
  					<tr>
  						<th>Pengarang</th>
  						<td>
  							<span>
  								<span id="dtl_pengarang_buku"></span>
  							</span>
  						</td>
  					</tr>
  					<tr>
  						<th>Penerbit</th>
  						<td>
  							<span id="dtl_penerbit_buku"></span>
  						</td>
  					</tr>
  					<tr>
  						<th>Tahun Terbit</th>
  						<td>
  							<span id="dtl_tahun_terbit_buku"></span>
  						</td>
  					</tr>
  					<tr>
  						<th>Status</th>
  						<td>
  							<?php if ($_buku->stok_buku == 0): ?>
  							<span class="text-danger">Buku Habis</span>
  							<?php else: ?>
  							<span class="text-success">Buku Tersedia</span>
  							<?php endif; ?>
  						</td>
  					</tr>
  				</table>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- /.Modal Detail Buku-->

  <script>
  	$(document).ready(function () {
  		$(document).on('click', '#read_more', function () {
  			var judul = $(this).data('judul');
  			var deskripsi = $(this).data('deskripsi');
  			$('#judul_buku').text(judul);
  			$('#deskripsi_buku').text(deskripsi);
  		})

  		$(document).on('click', '#detail', function () {
  			var id = $(this).data('id');
  			var judul = $(this).data('judul');
  			var kategori = $(this).data('kategori');
  			var penerbit = $(this).data('penerbit');
  			var tahun_terbit = $(this).data('tahun');
  			var pengarang = $(this).data('pengarang');
  			var deskripsi = $(this).data('deskripsi');
  			$('#dtl_id_buku').text(id);
  			$('#dtl_judul_buku').text(judul);
  			$('#dtl_kategori_buku').text(kategori);
  			$('#dtl_penerbit_buku').text(penerbit);
  			$('#dtl_tahun_terbit_buku').text(tahun_terbit);
  			$('#dtl_pengarang_buku').text(pengarang);
  			$('#dtl_deskripsi_buku').text(deskripsi);
  		})

  	});
  </script>
