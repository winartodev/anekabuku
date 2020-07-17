
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=".<?= base_url('assets') ?>/index2.html"><b>Aneka Buku</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <?= $this->session->flashdata('pesan') ?>
      <form action="<?= base_url('guest/auth')?>" method="post">
        <div class="input-group mb-0">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <br>
        </div>
        <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
        <div class="input-group mb-0 mt-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <br>
        </div>
        <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

