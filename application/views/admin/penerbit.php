  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Penerbit</h1>
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
          <a class="btn btn-primary mb-4" href="<?= base_url('admin/penerbit/add_penerbit') ?>"> <i class="fa fa-plus fa-sm" ></i> Add Penerbit</a>
          <?= $this->session->flashdata('pesan'); ?>
  			<!-- Main row -->
  			<div class="row">
  				<div class="col-12">
  					<div class="card">
  						<div class="card-header">
  							<h4>Penerbit</h4>
  						</div>
  						<div class="card-body">
  							<div class="table-responsive">
  								<table class="table table-hover" id="example2">
  									<thead>
  										<tr>
  											<th>Kode Penerbit</th>
  											<th>Nama Penerbit</th>
  											<th>No Telp</th>
  											<th>Aksi</th>
  										</tr>
  									</thead>
  									<tbody>
                                          <?php
                                            foreach($penerbit as $_penerbit):
                                          ?>
                                            <tr>
                                                <td><?= $_penerbit->id_penerbit ?></td>
                                                <td><?= $_penerbit->nama_penerbit; ?></td>
                                                <td><?= $_penerbit->telp_penerbit; ?></td>
                                                <td>
													<?= anchor(base_url('admin/penerbit/edit_penerbit/'. $_penerbit->id_penerbit), '<div class="btn btn-primary btn-action mr-1"><i class="fas fa-pencil-alt"></i></div>')?>
													<?= anchor(base_url('admin/penerbit/delete_penerbit/'. $_penerbit->id_penerbit), '<div class="btn btn-danger btn-action"><i class="fas fa-trash"></i></div>')?>
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