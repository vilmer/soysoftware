
<header id="soy_start" class="hero-text-particles">
  <div id="particles-js"></div>
  <div class="container">
    <div class="hero-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-2 col-sm-3 col-xs-1"></div>
            <div class="col-lg-8 col-sm-6 col-xs-10">
                <?php if ($this->session->flashdata('usuarioNo')): ?>
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>
                        <?php echo $this->session->flashdata('usuarioNo'); ?>
                      </strong>
                    </div>
                  <?php endif ?>
                  <?php if ($this->session->flashdata('errorFormValidacion')): ?>
                    <div class="alert alert-info alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>
                        <?php echo $this->session->flashdata('errorFormValidacion'); ?>
                      </strong>
                    </div>
                  <?php endif ?>
                     <form action="<?php echo site_url('Soy_Login/soy_autenticar'); ?>" method="post" id="formLogin2">
                      <input type="hidden" name="id" value="soysotware_b" required="">
                      <div class="md-form text-left" style="color: #fff">
                          <i class="fa fa-envelope prefix" style="color: #fff"></i>
                          <input type="text" id="email_user" name="email_user" required=""  style="color: #fff" class="form-control">
                          <label id="ingreseemail" for="email_user" style="color: #fff">Ingrese email</label>
                      </div>

                      <div class="md-form text-left" style="color: #fff">
                          <i class="fa fa-lock prefix" style="color: #fff"></i>
                          <input type="password" id="password_user" style="color: #fff" name="password_user" required="" validate class="form-control">
                          <label for="password_user" style="color: #fff">Ingrese password</label>
                      </div>
                      <center>
                        <button type="submit" id="btnLoginDos" class="btn btn-outline-primary waves-effect"><b style="color: #fff;">Ingresar <i class="fa fa-sign-in"></i></b></button>
                      </center>
                  </form>
            </div>
            <div class="col-lg-2 col-sm-3 col-xs-1"></div>
          </div>
        </div>
    <!-- end content -->
    </div>
  <!-- end hero-wrapper -->
</header>
<script src="<?php echo base_url('assets/js/logica/soy_login_iniciar.js'); ?>"></script>