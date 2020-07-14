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
  			<!-- Main row -->
  			<div class="row">
  				<div class="col-md-12">
  					<div class="card">
  						<div class="card-body">
                          <?php foreach($buku as $_detail_buku): ?>
  							<div class="card-header">
  								<h4>Buku <?= $_detail_buku->judul_buku ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mr-auto" >
                                        <img class="card-img-top" src="<?= base_url(). 'assets/upload/'. $_detail_buku->gambar?> " alt="<?= $_detail_buku->gambar ?>">
                                    </div>
                                    <div class="col-md-9 ml-auto">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>ISBN</th>
                                                <td><?= $_detail_buku->id_buku ?></td>
                                            </tr>
                                            <tr>
                                                <th>Judul</th>
                                                <td><?= $_detail_buku->judul_buku ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td><?= $_detail_buku->nama_kategori ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pengarang</th>
                                                <td><?= $_detail_buku->nama_pengarang ?></td>
                                            </tr>
                                            <tr>
                                                <th>Penerbit</th>
                                                <td><?= $_detail_buku->nama_penerbit ?></td>
                                            </tr>
                                            <tr>
                                                <th>tahun_terbit</th>
                                                <td><?= $_detail_buku->tahun_terbit_buku ?></td>
                                            </tr>
                                            <tr>
                                                <th>Stok</th>
                                                <td><?= $_detail_buku->stok_buku ?></td>
                                            </tr>
                                        </table>
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