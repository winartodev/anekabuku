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
          <a class="btn btn-primary mb-4" href="<?= base_url('admin/anggota/add_anggota') ?>"> <i class="fa fa-plus fa-sm" ></i> Add Anggota</a>
          <?= $this->session->flashdata('pesan'); ?>
  			<!-- Main row -->
  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4>Anggota</h4>
  						</div>
  						<div class="card-body">
  							<div class="table-responsive">
  								<table class="table table-hover" id="example1">
  									<thead>
  										<tr>
  											<th>Kode Anggota</th>
  											<th>Nama</th>
  											<th>No Telp</th>
  											<th>Aksi</th>
  										</tr>
  									</thead>
  									<tbody>
                                          <?php
                                            $no = 1;
                                            foreach($anggota as $_anggota):
                                          ?>
                                            <tr>
                                                <td><?= $_anggota->id_anggota; ?></td>
                                                <td><?= $_anggota->nama_anggota; ?></td>
                                                <td><?= $_anggota->tlp_anggota; ?></td>
                                                <td>
                                                    <?= anchor(base_url('admin/anggota/info_anggota/'. $_anggota->id_anggota), '<div class="btn btn-success btn-action mr-1"><i class="fas fa-eye"></i></div>')?>
													<?= anchor(base_url('admin/anggota/edit_anggota/'. $_anggota->id_anggota), '<div class="btn btn-primary btn-action mr-1"><i class="fas fa-pencil-alt"></i></div>')?>
													<?= anchor(base_url('admin/anggota/delete_anggota/'. $_anggota->id_anggota), '<div class="btn btn-danger btn-action"><i class="fas fa-trash"></i></div>')?>
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