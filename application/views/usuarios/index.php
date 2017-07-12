<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<section id="soy_start" class="myportada" style="background-image: url(<?php echo base_url('assets/images/soyPortadaUsuario.jpg'); ?>);">
</section>

<section class="listaUsuarios" id="soy_contacto">
  <div class="container">
    <div class="row">
      <!-- end col-12 -->
		<div class="col-lg-12 col-md-12 col-xs-12">
		<br>
			<div class="panel panel-primary">
			  <div class="panel-heading">
<a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-default btn-sm"> <i class="fa fa-mail-reply"></i> Atras</a> Lista de Usuarios </div>
			  <div class="panel-body">
			  	<?php if ($usuarios){ ?>
				<div class="table-responsive">
				<table id="example" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>Email</th>
			                <th>Usuario</th>
			                <th>Descripcion</th>
			                <th>Redes sociales</th>
			                <th>Fecha</th>
			                <th>Estado</th>
			                
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>#</th>
			                <th>Email</th>
			                <th>Usuario</th>
			                <th>Descripcion</th>
			                <th>Redes sociales</th>
			                <th>Fecha</th>
			                <th>Estado</th>
			                
			            </tr>
			        </tfoot>
			        <tbody>
					
					<?php $i=0; ?>
			        <?php foreach ($usuarios->result() as $key): ?>
			        	<?php $i++; ?>
			        
			            <tr>
			                <td><?php echo $i; ?></td>
			                <td><?php echo $key->email_usuario; ?></td>
			                <td><?php echo $key->nombre_usuario; ?> <?php echo $key->apellido_usuario; ?></td>
			                <td><?php echo $key->descripcion_usuario; ?></td>
			                <td>
			                	<?php if ($key->facebook): ?>
			                		<a href="<?php echo $key->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a>	
			                	<?php endif ?>

			                	<?php if ($key->twitter): ?>
			                		<a href="<?php echo $key->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>	
			                	<?php endif ?>

			                	<?php if ($key->youtube): ?>
			                		<a href="<?php echo $key->youtube; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>	
			                	<?php endif ?>
			                	
			                </td>
			                <td>
			                	<?php echo $key->fecha_usuario; ?>
			                </td>
			                <td>
			                	<?php if ($key->estado_usuario){ ?>
			                		<button class="btn btn-success btn-sm" onclick="estadoUsuario(this);" data-url="<?php echo site_url('Soy_Usuarios/cambiarEstado').'/'.encode_url($key->id_usuario); ?>" ><i class="fa fa-check"></i></button>
			                	<?php }else{ ?>
			                		<button class="btn btn-danger btn-sm" onclick="estadoUsuario(this);" data-url="<?php echo site_url('Soy_Usuarios/cambiarEstado').'/'.encode_url($key->id_usuario); ?>" ><i class="fa fa-times"></i></button>
			                	<?php } ?>
			                </td>
			            </tr>

			        <?php endforeach ?>
			        </tbody>
			    </table>
			</div>
		    <?php }else{ ?>
			    <div class="alert alert-info alert-dismissable">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			      <strong>Información.!</strong> No existe ningún contactos por el momento.
			    </div>
		    <?php } ?>
			  </div>
			</div>
			
		</div>

      <!-- end col-6 --> 
    </div>
    
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end news -->


<?php if ($this->session->flashdata('okUsuario')): ?>
	<script>
		alertify.success("<?php echo $this->session->flashdata('okUsuario'); ?>");
	</script>
<?php endif ?>
<script src="<?php echo base_url('assets/js/logica/soy_usuarios_index.js'); ?>"></script>