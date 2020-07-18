  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Peminjaman</h1>
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
  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4>Buku</h4>
  						</div>
  						<div class="card-body">
  							<div class="table-responsive">
  								<table class="table table-hover" id="example1">
  									<thead>
  										<tr>
  											<th>No</th>
  											<th>ISBN</th>
  											<th>Judul Buku</th>
  											<th>Pengarang</th>
  											<th>Jumlah Buku</th>
  											<th>Aksi</th>
  										</tr>
  									</thead>
  									<tbody>
                                          <?php
                                            $no = 1;
                                            foreach($peminjaman as $_buku):
                                          ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $_buku->id_buku; ?></td>
                                                <td><?= $_buku->judul_buku; ?></td>
                                                <td><?= $_buku->nama_pengarang; ?></td>
                                                <td><?= $_buku->jumlah_buku; ?></td>
                                                <td>
													<?= anchor(base_url('anggota/peminjaman/delete_peminjaman/'. $_buku->id_buku), '<div class="btn btn-danger btn-action"><i class="fas fa-times"></i></div>')?>
                                                </td>
                                            </tr>
                                          <?php 
                                            endforeach;
                                          ?>
  									</tbody>
  								</table>
  							</div>
  						</div>
  						<!-- /.row (main row) -->
                      </div><!-- /.container-fluid -->
                    </div>
                </div>
            </div>
        </div>
  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->