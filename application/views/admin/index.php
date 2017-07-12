<header id="soy_start" class="hero-text-particles">
  <div id="particles-js"></div>
  <div class="container">
    <div class="hero-wrapper">
        <div class="content">
         
          <!-- end text-rotater --> 
          <h1 style="color: #fff;">
      
            " Soluciones inteligentes para un mundo digital.. "
          </h1><br>
          <?php if ($this->session->userdata(soyMiperfil())==soyPA()): ?>
            <a href="<?php echo site_url('Soy_Contactos/index'); ?>" class="hero-btn btn-outline-danger">Contactos</a>
            <a href="<?php echo site_url('Soy_Usuarios/index'); ?>" class="hero-btn btn-outline-default">Usuarios</a>

          <?php endif ?>
            
            <a href="<?php echo site_url('Soy_blogs/index'); ?>" class="hero-btn btn-outline-secondary">Blog</a> 
            <a href="<?php echo site_url('Soy_security/soy_perfil'); ?>" class="hero-btn btn-outline-info">Mi Perfil</a>
          <div class="container">
            <img src="<?php echo base_url('assets/images/soy_apps.png'); ?>" alt="Image">
          </div>
    <!-- end container -->
    </div>
    <!-- end content -->
    </div>
  <!-- end hero-wrapper -->
</header>
<?php if ($this->session->flashdata('bienvenido')): ?>
  <script>
    alertify.defaults = {
         notifier:{
                delay:5,
                position:'bottom-right',
                closeButton: false
            },
          glossary:{
              ok: 'Aceptar'
          },
          theme:{
              ok:'btn btn-outline-primary btn-rounded waves-effect'
          }
      };

    alertify.alert(
      'Muy Bien',
      "<?php echo $this->session->flashdata('bienvenido'); ?>",
      function(){ 
        alertify.message('Disfrutalo, :D'); 
    });

</script>  
<?php endif ?>
<script>
 
</script>