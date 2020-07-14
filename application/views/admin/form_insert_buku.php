  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Buku</h1>
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
  				<div class="col-md-12">
  					<div class="card">
  						<div class="card-body">
  							<form method="POST" action="<?= base_url('admin/buku/insert_buku')?>"
  								enctype="multipart/form-data">
  								<div class="card-header">
  									<h4>Add Buku</h4>
  								</div>
  								<div class="row">
  									<div class="col-sm-6">
  										<div class="card-body">
  											<div class="form-group">
  												<label>ISBN</label>
  												<input type="text" name="isbn" class="form-control">
  												<?= form_error('isbn', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Kategori</label>
  												<select class="form-control select2bs4" style="width: 100%;"
  													name="kategori">
  													<option value="">Pilih Kategori...</option>
  													<?php  
                                                        $no =1; 
                                                        foreach($kategori as $_kategori): 
                                                    ?>
  													<option value="<?= $_kategori->id_kategori ?>">
  														<?= $no++. '. '. $_kategori->nama_kategori ?></option>
  													<?php 
                                                        endforeach; 
                                                    ?>
                                                  </select>
                                                  <?= form_error('kategori', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Penerbit</label>
  												<select class="form-control select2bs4" style="width: 100%;"
  													name="penerbit">
  													<option value="">Pilih Penerbit...</option>
  													<?php  
                                                        $no =1; 
                                                        foreach($penerbit as $_penerbit): 
                                                    ?>
  													<option value="<?= $_penerbit->id_penerbit ?>">
  														<?= $no++. '. '. $_penerbit->nama_penerbit ?></option>
  													<?php 
                                                        endforeach; 
                                                    ?>
                                                  </select>
                                                  <?= form_error('penerbit', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Judul buku</label>
  												<input type="text" name="judul_buku" class="form-control">
  												<?= form_error('judul_buku', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Tahun Terbit</label>
  												<input type="text" name="tahun_terbit" class="form-control">
  												<?= form_error('tahun_terbit', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  										</div>
  									</div>
  									<div class="col-sm-6">
  										<div class="card-body">
  											<div class="form-group">
  												<label>Pengarang</label>
  												<input type="text" name="pengarang" class="form-control">
  												<?= form_error('pengarang', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Jumlah Halaman</label>
  												<input type="text" name="jumlah_halaman" class="form-control">
  												<?= form_error('jumlah_halaman', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Stok Buku</label>
  												<input type="number" name="stok" class="form-control">
  												<?= form_error('stok', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label>Deskripsi</label>
  												<textarea type="text" name="deskripsi"
  													class="form-control"></textarea>
  												<?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
  											</div>
  											<div class="form-group">
  												<label for="exampleInputFile">Gambar</label>
  												<div class="input-group">
  													<div class="custom-file">
  														<input type="file" class="custom-file-input"
  															id="exampleInputFile" name="gambar">
  														<label class="custom-file-label" for="exampleInputFile">Choose
  															file</label>
  													</div>
  													<div class="input-group-append">
  														<span class="input-group-text" id="">Upload</span>
  													</div>
  												</div>
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
  							</form>

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