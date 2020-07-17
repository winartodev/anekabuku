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
  				<div class="col-12">
  					<div class="card">
  						<div class="card-body">
  							<div class="row">
  								<div class="col-md-6">
  									<form method="POST" action="<?= base_url('admin/anggota/update_anggota')?>"
  										enctype="multipart/form-data">
  										<div class="card-header">
  											<h4>Edit Anggota</h4>
  										</div>
  										<div class="card-body">
  											<?php foreach($anggota as $_anggota): ?>
  											<div class="form-group">
  												<label>Kode Anggota</label>
  												<input type="text" name="id_anggota" class="form-control"
  													value="<?= $_anggota->id_anggota ?>" readonly>
  												<?= form_error('id_anggota', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Nama Anggota</label>
  												<input type="text" name="nama_anggota" class="form-control"
  													value="<?= $_anggota->nama_anggota ?>">
  												<?= form_error('nama_anggota', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>No Telp</label>
  												<input type="number" name="telp_anggota" class="form-control"
  													value="<?= $_anggota->tlp_anggota ?>">
  											</div>
  											<div class="form-group">
  												<label>Alamat</label>
  												<textarea class="form-control" name="alamat"
  													rows="3"><?= $_anggota->alamat ?></textarea>
  											</div>
  											<div class="form-group">
  												<label for="exampleInputFile">Foto</label>
  												<div class="input-group">
  													<div class="custom-file">
  														<input type="file" class="custom-file-input"
  															id="exampleInputFile" name="foto">
  														<input type="hidden" class="custom-file-input"
  															id="exampleInputFile" name="old_image"
  															value="<?= $_anggota->foto ?>">
  														<label class="custom-file-label"
  															for="exampleInputFile"><?= $_anggota->foto ?></label>
  													</div>
  													<div class="input-group-append">
  														<span class="input-group-text" id="">Upload</span>
  													</div>
  												</div>
  											</div>
  										</div>

  										<div class="mt-2 text-right">
  											<button class="btn btn-danger" type="reset"> <i
  													class="fa fa-undo mr-1"></i>Reset</button>
  											<button class="btn btn-primary mr-2" type="submit"> <i
  													class="fa fa-save mr-1"></i>Save</button>
  										</div>
  										<?php endforeach;?>
  									</form>
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