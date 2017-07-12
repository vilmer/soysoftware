
<header id="soy_start" class="hero-text-particles">
  <div id="particles-js"></div>
  <div class="container">
    <div class="hero-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-2 col-sm-3 col-xs-1"></div>
            <div class="col-lg-8 col-sm-6 col-xs-10">
             
                  <?php if ($this->session->flashdata('erroFormResetearPassword')): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>
                        <?php echo $this->session->flashdata('erroFormResetearPassword'); ?>
                      </strong>
                    </div>
                  <?php endif ?>
                      <div class="alert alert-info alert-dismissable">
                      <strong>¿Perdiste tu contraseña?</strong> Por favor, introduzca su dirección de correo electrónico.
                    </div>
                     <form action="<?php echo site_url('Soy_Login/soy_resetarPasswordEmail'); ?>" method="post" id="formLogin2">
                      <div class="md-form text-left" style="color: #fff">
                          <i class="fa fa-envelope prefix" style="color: #fff"></i>
                          <input type="email" id="email_userResetearPassword" name="email_userResetearPassword" required=""  style="color: #fff" class="form-control">
                          <label for="email_userResetearPassword" style="color: #fff">Ingrese email</label>
                      </div>
                      <center>
                        <button type="submit" id="btnResetearPassword" class="btn btn-outline-primary waves-effect"><b style="color: #fff;">Resetear contraseña <i class="fa fa-unlock"></i></b></button>
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

<script src="<?php echo base_url('assets/js/logica/soy_login_resetearpassword.js'); ?>"></script>