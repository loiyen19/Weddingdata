<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title; ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('asset/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('asset/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('asset/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('asset/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('asset//build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <?php echo $this->session->flashdata('not'); ?>
        <section class="login_content">
          <form method="post" action="<?php echo site_url('adminpanel/login'); ?>">
            <h1><b>Login Admin</b></h1>
            <div>
              <input type="text" name="username" class="form-control" placeholder="Masukan Username" />
            </div>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Masukan Password" />
            </div>
            <div>
              <button type="submit" class="btn btn-primary submit">Masuk</button>
              <a class="reset_pass " href="#">Lupa Password?</a>
            </div>

            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link"><b>Hak Akses Admin</b></p>
              <div class="clearfix"></div>
              <br />
              <?php if (!empty(validation_errors())) : ?>
              <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
              </div>

            </div>
            <?php endif; ?>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>