
<section id="soy_blog" class="myportada" style="background-image: url(<?php echo base_url('assets/images/soyPoratadaBlogVer.jpg'); ?>);">
</section>

<?php if ($this->session->userdata(soyLogin())): ?>
	<a href="<?php echo site_url('Soy_blogs/nuevo'); ?>" class="btn btn-outline-primary btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-file-text"></i> Crear Blog</a>	
<?php endif ?>

<a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-mail-reply"></i> Atras</a>
<section class="news">
  <div class="container">
    <div class="row">
      <!-- end col-12 -->
	
	<?php if ($blogs){ ?>
		<?php foreach ($blogs->result() as $key): ?>
			
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.05s">
			        <div class="news-box">
			          <figure class="left-image">
			          	
			          <?php if ($key->foto_noticia){ ?>
			          		<img src="<?php echo base_url('assets/images/blogs/').$key->foto_noticia; ?>" alt="Image" width="90px;" height="200px;">
			          	<?php }else{ ?>
			          		<img src="<?php echo base_url('assets/images/soy_poratadaperfil.jpg'); ?>" alt="Image" width="90px;" height="200px;" class="">
			          	<?php } ?>
			          </figure>
			          <!-- end left-image -->
			          <div class="right-content">
			            <h4>
			            	<a href="<?php echo site_url('Soy_blogs/ver').'/'.encode_url($key->id_noticia); ?>">
			            		<?php echo substr($key->tema_noticia,0,20); ?>..
			            	</a>
			            </h4>
			            <small class="text-justify">
			            <?php 
			            	echo substr($key->descripcion_noticia, 0, 100);
			            ?>..
			            	
			            </small>
			            <strong><?php echo $key->fecha_noticia; ?></strong> 

			            <?php if ($this->session->userdata(soyMiperfil())==soyPA()): ?>
			            	<?php if ($key->estado_noticia){ ?>
			            		<button type="button" onclick="aprobarNoticia(this);" data-url="<?php echo site_url('Soy_blogs/aprobarNoticia').'/'.encode_url($key->id_noticia); ?>" data-estado="1" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i></button>
			            	<?php }else{ ?>
			            		<button type="button" onclick="aprobarNoticia(this);" data-url="<?php echo site_url('Soy_blogs/aprobarNoticia').'/'.encode_url($key->id_noticia); ?>" data-estado="0" class="btn btn-danger btn-sm"><i class="fa fa-stop-circle-o"></i></button>
			            	<?php } ?>
			            <?php endif ?>
							
			            </div>
			          <!-- end right-content --> 
			        </div>
			        <!-- end news-box --> 
			        <hr>
			      </div>
					
		<?php endforeach ?>
	
			<div class="col-lg-12">
				<?php if (isset($paginacion)){ ?>
						<?php echo $paginacion; ?>
				<?php }else{ ?>
					<h1>no existe pa</h1>
				<?php } ?>
			</div>

	<?php }else{?>
		<div class="alert alert-info alert-dismissable">
	      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	      <strong>Información.!</strong> No existe ningún blog creado, por el momento.
	    </div>
	<?php } ?>


      <!-- end col-6 --> 
    </div>
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end news -->


<?php if ($this->session->flashdata('blogNuevoOk')): ?>
	<script>
		<?php
			$php_array = $this->session->flashdata('blogNuevoOk');
		?>
	    var data = [<?php echo '"'.implode('","', $php_array).'"' ?>];

	    alertify.defaults = {
	       notifier:{
	              delay:5,
	              position:'bottom-right',
	              closeButton: false
	          },
	        glossary:{
	            ok: 'si',
	            cancel: 'no'            
	        },
	        theme:{
	            ok:'btn btn-outline-primary btn-rounded waves-effect',
	            cancel:'btn btn-outline-secondary btn-rounded waves-effect'
	        }
	    };  
	    
	    alertify.confirm(
	      '<h1>Muy bien,</h1>',
	      data[0],
	      function(){
	        window.location.href = "<?php echo site_url('Soy_blogs/ver'); ?>"+"/"+data[1];
	      }, 
	      function(){ 
	        alertify.success('Disfrutalo, :)');
	      }
	    );

	</script>
	

<?php endif ?>
<script>

function aprobarNoticia(argument) {
	var msj="";
	if ($(argument).data('estado')=='0') {
		msj="Aprobar noticia";
	}else{
		msj="Anular noticia";
	}

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
			            ok: 'Si, aprobar <i class="fa fa-check"></i>',
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
		alertify.confirm(
			'<h1>Confirmación.</h1>',
			msj,
			function(){ 
				window.location.href = $(argument).data('url');
			}, 
			function(){ 
				alertify.success('Disfrutalo, :)');
			}
		);
}
</script>

<?php if ($this->session->flashdata('blogOkEstado')): ?>
	<script>
		alertify.success("<?php echo $this->session->flashdata('blogOkEstado'); ?>");
	</script>
<?php endif ?>

<?php if ($this->session->flashdata('okBlog')): ?>
	<script>
		alertify.success("<?php echo $this->session->flashdata('okBlog'); ?>");
	</script>
	
<?php endif ?>