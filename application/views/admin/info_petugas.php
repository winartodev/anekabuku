  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Petugas</h1>
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
                          <?php foreach($petugas as $_detail_petugas): ?>
  							<div class="card-header">
  								<h4><?= $_detail_petugas->nama_petugas ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mr-auto" >
                                        <img class="card-img-top" src="<?= base_url(). 'assets/upload/petugas/'. $_detail_petugas->foto?> " alt="<?= $_detail_petugas->foto ?>">
                                    </div>
                                    <div class="col-md-9 ml-auto">
                                        <table class="table table-responsive">
                                            <tr>
                                                <th>ID</th>
                                                <td><?= $_detail_petugas->id_petugas ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?= $_detail_petugas->nama_petugas ?></td>
                                            </tr>
                                            <tr>
                                                <th>No Telp</th>
                                                <td><?= $_detail_petugas->tlp_petugas ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?= $_detail_petugas->alamat ?></td>
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