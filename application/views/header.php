
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo isset($titulo) ? $titulo : 'SOYSOFTWARE #innovación' ; ?></title>

<meta name="author" content="Soysoftware">
<meta name="description" content="Soluciones inteligentes para un mundo digital" />
<meta name="keywords" content="Soysoftware, Empresa de desarrollo de software - Ecuador, web, movil, acessoría, consultoría, hosting, dominios, soporte, innovación">

<!-- SOCIAL MEDIA META -->
<meta name="title" content="Soysoftware (Desarrollo de software) - Ecuador" />
<meta property="og:url" content="http://soysoftware.com/" />
<meta property="og:title" content="Soysoftware - Desarrollo de software" />
<meta property="og:site_name" content="Soysoftware (Desarrollo de software) - Ecuador" />

<meta property="og:type" content="website" />
<meta property="og:description" content="Soluciones inteligentes para un mundo digital" />
<!-- TWITTER META -->
<meta name="twitter:url" content="http://soysoftware.com/" />
<meta name="twitter:description" content="Soluciones inteligentes para un mundo digital" />
<meta name="twitter:site" content="@soysoftware" />
<meta name="twitter:title" content="Soysoftware (Desarrollo de software) - Ecuador" />



<!-- FAVICON FILES -->
<link href="<?php echo base_url('assets/images/favicon.png'); ?>" rel="shortcut icon">

<!-- CSS FILES -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/odometer.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery.fancybox.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/base.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/mdb.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/scrolling-nav.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/js/alertifyjs/css/alertify.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/js/alertifyjs/css/themes/bootstrap.min.css'); ?>" rel="stylesheet">
<!-- JS FILES --> 
<script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>  
<script src="<?php echo base_url('assets/js/alertifyjs/alertify.min.js'); ?>"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-fixed-top">
<div class="preloader"></div>
<!-- end preloader -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle toggle-menu menu-right push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span></span> </button>
      <a class="navbar-brand page-scroll" href="<?php echo site_url('Soy_Welcome/index'); ?>"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Image"></a> 
    </div>
    <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right social-media hidden-sm">
      <?php if ($this->session->userdata(soyLogin())): ?>
          <li> 
            <a href="<?php echo site_url('Soy_security/soy_perfil'); ?>"><i class="fa fa-user" aria-hidden="true"></i>
            </a> 
        </li>  
        <?php endif ?>
        <li> 
          <a href="http://facebook.com/soysoftware" target="_blank">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a> 
          </li>
        <li> 
          <a href="https://twitter.com/soysoftware" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i>
          </a> 
        </li>
        <li> 
          <a href="https://www.youtube.com/channel/UCM62GzCZxd3pZbUmlpI5-Yg" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i>
          </a> 
        </li>
        
        
      </ul>
      
      <?php if ($this->session->userdata(soyLogin())){ ?>
        <a href="<?php echo site_url('Soy_security/soy_exit') ?>" class="page-scroll btn btn-warning download-btnw hidden-sm btn-lg"><i class="fa fa-sign-out"></i></a>
      <?php }else{ ?>
      <button type="button" class="page-scroll download-btn hidden-sm btn btn-primary btn-lg" data-toggle="modal" data-target="#modalLogin">
        <i class="fa fa-user"></i>
      </button>
      <?php } ?>



      <ul class="nav navbar-nav navbar-right">
        <li> <a class="page-scroll" href="#soy_start">Inicio</a><span></span> </li>
        <li> <a class="page-scroll" href="#soy_nosotros">Nosotros</a><span></span> </li>
        <li> <a class="page-scroll" href="#soy_soluciones">Soluciones</a><span></span> </li>
        <li> <a class="page-scroll" href="#soy_innovacion">Innovación</a><span></span> </li>
        <li> <a class="page-scroll" href="#soy_blog">Blog</a><span></span> </li>
        <li> <a class="page-scroll" href="#soy_contacto">Contactos</a><span></span> </li>
      </ul>
    </div>
    <!-- end navbar-collapse --> 
  </div>
  <!-- end container --> 
</nav>
<!-- end navbar -->

<!--Modal: Login Form-->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
             <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="title"><i class="fa fa-user"></i> Iniciar sesión</h4>
            </div>
            <!--Body-->
            <form action="<?php echo site_url('Soy_Login/soy_autenticar'); ?>" method="post" id="formLogin">
            <input type="hidden" name="id" value="soysotware_a">
            <div class="modal-body">
                <div class="md-form form-sm">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" id="email" name="email" required="" class="form-control">
                    <label for="email">Ingrese email</label>
                </div>

                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="password" name="password" required="" class="form-control">
                    <label for="password">Ingrese contraseña</label>
                </div>
                <center>
                  <button type="submit" id="btnLoginUno" class="btn btn-outline-primary waves-effect">Ingresar <i class="fa fa-sign-in"></i></button>
                </center>
            </div>
            </form>
            <!--Footer-->
            <div class="modal-footer">
              <div class="row">
                <div class="col-xs-6 text-left">
                  
                </div>
                <div class="col-xs-6">
                  <a href="<?php echo site_url('Soy_Login/soy_resetearPassword'); ?>"> <i class="fa fa-key"></i>¿Olvidaste tu contraseña?</a>
                </div>
              </div>
                
                
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login Form-->

<script src="<?php echo base_url('assets/js/logica/soy_header.js'); ?>"></script>