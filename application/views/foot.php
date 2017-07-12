


<footer class="footer" id="susbribirse">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php if ($this->session->userdata(soyLogin())){ ?>
        <h2 style="color: #fff;">¡Muchas gracias por formar parte de esta gran experiencia!</h2>
          <span><strong>David Criollo <br>CEO, Soysoftware</strong></span>
           <div class="md-form  text-center">
              <a href="<?php echo site_url('Soy_security/soy_exit') ?>" class="btn btn-warning waves-effect"><i class="fa fa-sign-out"></i> Salir</a>
          </div>
        <?php }else{ ?>

        <form class="newsletter"  action="<?php echo site_url('Soy_Welcome/suscribir'); ?>" id="formSusbribirse" method="post">
          <h4>¡SUSCRÍBETE GRATIS!</h4>
          <small>
            Suscríbete gratis, ahora mismo para crear Blogs, comentar y compartir con tus redes sociales. Y recibir información actualizada de nuestras actividades.
          </small>
          <br>
          <?php if ($this->session->flashdata('erroFormSuscribir')): ?>
            <div class="alert alert-warning alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>
                <?php echo $this->session->flashdata('erroFormSuscribir'); ?>
              </strong>
            </div>
          <?php endif ?>
            <div class="md-form ">
                <i class="fa fa-envelope prefix" style="color: #fff;"></i>
                <input type="email" id="EmailSuscribirse" name="EmailSuscribirse" required="" class="form-control" style="color: #fff">
                <label for="EmailSuscribirse" style="color: #fff;">Escriba su correo electrónico</label>
            </div>
    
          <div class="md-form  text-center">
              
              <button type="submit" id="btnSuscribirse" class="btn btn-pink btn-rounded">Suscribirse <i class="fa fa-heart-o"></i></button>
          </div>
          
        </form>
       <?php } ?>
        <!-- end newsletter --> 
      </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container -->
  <div class="sub-footer wow fadeIn">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 text-left"><span>© 2017 <a href="<?php echo site_url('Soy_Welcome/index'); ?>"><strong>SOY</strong>SOFTWARE</a> | Todos los derechos reservados.</span></div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-4 text-center">
          <ul class="social-media">
            <li> <a href="http://facebook.com/soysoftware" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
            <li> <a href="https://twitter.com/soysoftware" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li> <a href="https://www.youtube.com/channel/UCM62GzCZxd3pZbUmlpI5-Yg" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
          </ul>
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-4 text-right"><span>#innovación</span></div>
        <!-- end col-4 --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </div>
  <!-- end sub-footer --> 
</footer>
<!-- end footer --> 
<a href="#" class="scrollup"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a> 

<!-- JS EXTRA FILES --> 

<script type="text/javascript">
(function($) {
  $(window).load(function(){
    $("body").addClass("page-loaded");  
  });
})(jQuery)
</script> 
<script src="<?php echo base_url('assets/js/mdb.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.easing.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/scrolling-nav.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.fancybox.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/odometer.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/jPushMenu.js'); ?>"></script> 
<script src='<?php echo base_url('assets/js/particles.min.js'); ?>'></script> 
<script src="<?php echo base_url('assets/js/particles.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/logica/soy_foot.js'); ?>"></script>
</body>
</html>