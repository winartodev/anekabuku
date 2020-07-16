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
  			<!-- Main row -->
  			<div class="row text-center">
          <?php foreach($buku as $_buku): ?>
            <div class="card ml-4 mb-3 border-0" style="width: 16rem;">
              <img class="card-img-top" src="<?= base_url(). 'assets/upload/'. $_buku->gambar?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-text text-bold text-capitalize"><?= $_buku->judul_buku ?></h5>
                <p class="card-text text-justify">
                  <?= word_limiter($_buku->deskripsi_buku, 20) ?> 
                  <?php if (strlen($_buku->deskripsi_buku) == 1 || strlen($_buku->deskripsi_buku) == 0): ?>
                    <a href=""></a>
                  <?php else:?>
                    <a href="">Read More</a>
                  <?php endif; ?>
                </p>
                <?php if ($_buku->stok_buku == 0): ?>
                  <span class="badge badge-danger">Buku Habis</span>
                <?php else: ?>
                  <span class="badge badge-success">Buku Tersedia</span>
                <?php endif; ?>
                <br>
                <a href="#" class="btn btn-primary mt-3">Detail Buku</a>
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