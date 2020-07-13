  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Kategori</h1>
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
  				<div class="col-12">
  					<div class="card">
  						<div class="card-body">
  							<div class="row">
  								<div class="col-md-6">
                                    <?php foreach($kategori as $_kategori): ?>
                                        <form method="POST" action="<?= base_url('admin/kategori/update_kategori')?>"
                                            enctype="multipart/form-data">
                                            <div class="card-header">
                                                <h4>Edit Kategori</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Nama Kategori</label>
                                                    <input type="hidden" name="id_kategori" class="form-control" value="<?= $_kategori->id_kategori ?>">
                                                    <input type="text" name="nama_kategori" class="form-control" value="<?= $_kategori->nama_kategori ?>">
                                                    <?= form_error('nama_kategori', '<div class="text-small text-danger">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="mt-2 text-right">
                                                <button class="btn btn-danger" type="reset"> <i
                                                        class="fa fa-undo mr-1"></i>Reset</button>
                                                <button class="btn btn-primary mr-2" type="submit"> <i
                                                        class="fa fa-save mr-1">Save</i>
                                            </div>
                                        </form>
                                    <?php endforeach; ?>
  								</div>
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