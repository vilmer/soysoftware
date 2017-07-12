<section id="soy_start" class="myportada" style="background-image: url(<?php echo base_url('assets/images/soyPoratadaPerfil.jpg'); ?>);">
</section>
<section>
<a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-home"></i> Inicio</a><br>	<br>
<div class="container">
  <div class="row">
      <div class="fb span9 offset1">
      <br>
      <br>
        <p class="text-center"><?php echo $datos->email_usuario; ?></p>
          <div class="profilePhoto"> 
         <?php if ($datos->foto_usuario){ ?>
    		<img src="<?php echo base_url('assets/images/foto/').$datos->foto_usuario; ?>"  alt="user" width="100%;" height="155px;">	
    	<?php }else{ ?>
			<img src="<?php echo base_url('assets/images/soy_sinfoto.png'); ?>"  alt="user" width="100%;" height="155px;">
    	<?php } ?>
         	 
           </div>
           <div class="span3 offset2 "> 
            <p class="name"> <?php echo $datos->nombre_usuario; ?> <?php echo $datos->apellido_usuario; ?> </p>
            
          </div>

      </div>
      <div class="alert alert-info">
        <strong>Descripción usuario:</strong><br>
        <?php if ($datos->descripcion_usuario){ ?>
          <?php echo $datos->descripcion_usuario; ?>  
        <?php }else{ ?>
        ?
        <?php } ?>
        
        <ul><br>
          <?php if ($datos->facebook): ?>
          <a class="" target="_blank" rel="publisher"
               href="<?php echo $datos->facebook; ?>">
                <i class="fa fa-facebook fa-2x"></i>
            </a>
        <?php endif ?>
          
           <?php if ($datos->youtube): ?>
              <a class="" target="_blank" rel="publisher"
                 href="<?php echo $datos->youtube; ?>">
                  <i class="fa fa-youtube-play fa-2x" style="color: red;"></i>
              </a>
           <?php endif ?>
           <?php if ($datos->twitter): ?>
            <a class="" target="_blank" href="<?php echo $datos->twitter; ?>">
                <i class="fa fa-twitter fa-2x"></i>
            </a>
           <?php endif ?>
        </ul>
      </div>
      
      <hr>
  </div>
</div>
</section>
