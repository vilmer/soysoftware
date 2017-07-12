
<link rel="stylesheet" href="<?php echo base_url('assets/css/fileinput.min.css'); ?>">

<script src="<?php echo base_url('assets/js/fileinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/es.js'); ?>"></script>
<section class="myportada" id="soy_start" style="background-image: url(<?php echo base_url('assets/images/soyPortadaMiPerfil.jpg'); ?>);">
</section>

<?php if ($datos){ ?>
<?php if (($datos->nombre_usuario=="" || $datos->apellido_usuario=="")): ?>
	<script>
		alertify.defaults = {
			        // dialogs defaults
			        autoReset:true,
			        basic:false,
			        closable:true,
			        closableByDimmer:true,
			        frameless:false,
			        maintainFocus:true, // <== global default not per instance, applies to all dialogs
			        maximizable:true,
			        modal:true,
			        movable:true,
			        moveBounded:false,
			        overflow:true,
			        padding: true,
			        pinnable:true,
			        pinned:true,
			        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
			        resizable:true,
			        startMaximized:false,
			        transition:'pulse',

			        // notifier defaults
			        notifier:{
			            // auto-dismiss wait time (in seconds)  
			            delay:5,
			            // default position
			            position:'bottom-right',
			            // adds a close button to notifier messages
			            closeButton: false
			        },

			        // language resources 
			        glossary:{
			            // ok button text
			            ok: 'Entendido',
			            // cancel button text
			            cancel: 'Cancelar <i class="fa fa-times"></i>'            
			        },

			        // theme settings
			        theme:{
			            ok:'btn btn-outline-primary btn-rounded waves-effect',
			            // class name attached to cancel button 
			            cancel:'btn btn-outline-secondary btn-rounded waves-effect'
			        }
			    };
		 alertify.alert(
	      'Hola,',
	      "Por favor, actualice su información de perfil. para disfrutar de todo los beneficios...",
	      function(){ 
	        alertify.message('Gracias, :D'); 
	    });
	</script>
<?php endif ?>

	<a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-mail-reply"></i> Atras</a>
<section class="news" style="padding: 0px;">
  <div class="container">
    <div class="row">
      <!-- end col-12 -->
		<div class="col-lg-12 col-md-12 col-sm-12">

			<div class="panel panel-info">
			  <div class="panel-heading">
			  <?php echo $datos->email_usuario; ?>
			  <ul class="[ nav nav-justified ]">
				  <li class="active">
				  	<a href="#home" aria-controls="dustin" role="tab" data-toggle="tab">
                      <img class="img-circle" src="<?php echo base_url('assets/images/soy_perfil.png'); ?>" />

                    </a>
                    <center><span>Información</span></center>
                  </li>
				  <li>
				  	<a href="#menu2" aria-controls="anna" role="tab" data-toggle="tab">
                      <img class="img-circle" src="<?php echo base_url('assets/images/soy_password.png'); ?>" />
                    </a>
                    <center><span>Seguridad</span></center>
                  </li>
				  <li>
				  	<a href="#menu1" aria-controls="daksh" role="tab" data-toggle="tab">
                      <img class="img-circle" src="<?php echo base_url('assets/images/soy_foto.png'); ?>" />
                    </a>
                    <center><span>Foto</span></center>
                  </li>
				</ul>
			  	 
                   
                </ul>
			  </div>
			  <div class="panel-body">
			  <?php if ($this->session->flashdata('noUsuario')): ?>
					<div class="alert alert-info alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong><?php echo $this->session->flashdata('noUsuario'); ?></strong>
					</div>
			<?php endif ?>
			  	<div class="tab-content text-left">
				  <div id="home" class="tab-pane fade in active">
					
					<form action="<?php echo site_url('Soy_security/actualizarPerfil') ?>" method="post" id="formInfo">

						    <!--Body-->
						    <div class="md-form form-sm">
						        <i class="fa fa-user prefix"></i>
						        <input type="text"  id="nombre" required="" name="nombre" value="<?php echo $datos->nombre_usuario; ?>"  class="form-control">
						        <label for="nombre">Nombres</label>
						    </div>
							
							<div class="md-form form-sm">
						        <i class="fa fa-user-plus prefix"></i>
						        <input type="text" id="apellido" name="apellido" required="" value="<?php echo $datos->apellido_usuario; ?>"  class="form-control">
						        <label for="apellido">Apellidos</label>
						    </div>

						    <div class="md-form form-sm">
						        <i class="fa fa-pencil prefix"></i>
						        <textarea type="text" id="descripcion" required="" name="descripcion"  class="md-textarea"><?php echo $datos->descripcion_usuario; ?></textarea>
						        <label for="descripcion">Descripción</label>
						    </div>
							  <div class="md-form form-sm">
						        <i class="fa fa-facebook-official prefix"></i>
						        <input type="url" id="facebook" name="facebook"  value="<?php echo $datos->facebook; ?>"  class="form-control">
						        <label for="facebook">Url facebook</label>
						    </div>
						    <div class="md-form form-sm">
						        <i class="fa fa-twitter prefix"></i>
						        <input type="url" id="twitter" name="twitter"  value="<?php echo $datos->twitter; ?>"  class="form-control">
						        <label for="twitter">Url twitter</label>
						    </div>
						    <div class="md-form form-sm">
						        <i class="fa fa-youtube-play prefix"></i>
						        <input type="url" id="youtube" name="youtube"  value="<?php echo $datos->youtube; ?>"  class="form-control">
						        <label for="youtube">Url youtube</label>
						    </div>
						    <div class="text-right">

						        <button type="submit" id="btnActualizarInformacion" class="btn btn-outline-primary waves-effect"> <i class="fa fa-pencil-square-o"></i> Actualizar</button>
						        <a href="<?php echo site_url('Soy_security/perfilUsuario').'/'.encode_url($datos->id_usuario); ?>" class="btn btn-outline-secondary waves-effect"><i class="fa fa-user"></i> Ver mi perfil</a>
						    </div>
						  
					</form>
				    
				  </div>
				  <div id="menu1" class="tab-pane fade">
				    
				    <form action="<?php echo site_url('Soy_security/actualizarFoto'); ?>" id="formFoto"  method="post" enctype="multipart/form-data">
						<input id="archivo" required="" name="archivo" accept="image/*" type="file" class="file-loading">
						<button type="submit" id="btnFotoPerfil" class="btn btn-outline-primary waves-effect pull-right"> <i class="fa fa-pencil-square-o"></i> Actualizar</button>
					</form>
				    
				  </div>
				  <div id="menu2" class="tab-pane fade">
				  
				  	<br>
					
					<form action="<?php echo site_url('Soy_security/actualizarPassword'); ?>" method="post" id="formPassword">
						<div class="md-form form-sm">
					        <i class="fa fa-key prefix"></i>
					        <input type="password"  id="passworda" data-url="<?php echo site_url('Soy_security/verificarPasswordActual'); ?>" name="passworda" required="" class="form-control">
					        <label for="passworda">Contraseña antigua</label>
					    </div>
					    <!--Body-->
					    <div class="md-form form-sm">
					        <i class="fa fa-unlock-alt prefix"></i>
					        <input type="password" id="nuevoPassword" name="nuevoPassword" required="" class="form-control">
					        <label for="nuevoPassword">Nueva contraseña</label>
					    </div>
						
						<div class="md-form form-sm">
					        <i class="fa fa-unlock prefix"></i>
					        <input type="password" id="repitaNuevoPassword" name="repitaNuevoPassword" required=""  class="form-control">
					        <label for="repitaNuevoPassword">Repita contraseña nueva</label>
					    </div>

					    <div class="text-right">
					        <button type="submit" id="btnCambiarPassword" class="btn btn-outline-primary waves-effect"><i class="fa fa-pencil-square-o"></i> Actualizar</button>
					    </div>
					</form>
				
				    
				  </div>
				</div>
			  </div>
			</div>
		</div>


      <!-- end col-6 --> 
    </div>
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>

<script src="<?php echo base_url('assets/js/logica/soy_security_perfil.js'); ?>"></script>
<script>

	$("#archivo").fileinput({
		browseClass: "btn btn-outline-success waves-effect",
		previewFileType: "image",
		browseLabel: "Cambiar foto",
		 browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        showCaption: false,
        showUpload: false,
        allowedFileExtensions: ["jpg", "png"],
		language:'es',
       initialPreview: [
       		<?php if ($this->session->userdata(soyPhoto())){ ?>
       			"<?php echo base_url('assets/images/foto/').$this->session->userdata(soyPhoto()); ?>"
       		<?php }else{ ?>
       		"<?php echo base_url('assets/images/soy_sinfoto.png'); ?>"	
       		<?php  } ?>
            
        ],
        initialPreviewAsData: true,
        initialPreviewConfig: [
            {caption: "Foto de perfil",  showDelete: false}
        ],
        overwriteInitial: true,
        initialCaption: "The Moon and the Earth"
    });
</script>

<?php }else{ ?>	
	<script>
		 alertify.alert(
	      'Ops,',
	      "Algo salio mal, vuelve a intentar",
	      function(){ 
	        alertify.message('Gracias, :D'); 
	    });
	</script>
<?php } ?>
<!-- end news -->

<?php if ($this->session->flashdata('okUsuario')): ?>
	<script>
		alertify.success("<?php echo $this->session->flashdata('okUsuario'); ?>");
	</script>
<?php endif ?>

<?php if ($this->session->flashdata('noFoto')): ?>
	<script>
		alertify.error("<?php echo $this->session->flashdata('noFoto'); ?>");
	</script>
<?php endif ?>



