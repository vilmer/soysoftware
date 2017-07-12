<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<section id="soy_start" class="myportada" style="
    background-image: url(<?php echo base_url('assets/images/soyPortadaContactoUsuario.jpg'); ?>);
">
</section>
<br>

<section class="" id="soy_contacto">
  <div class="container">
    <div class="row">
      <!-- end col-12 -->
	
		<div class="col-lg-12 col-md-12 col-xs-12">
			
			<div class="panel panel-primary">
			  <div class="panel-heading">
			  <a href="<?php echo site_url('Soy_soysoftware/index'); ?>" class="btn btn-default btn-sm"> <i class="fa fa-mail-reply"></i> Atras</a>
			  Lista de contactos
			  </div>
			  <div class="panel-body">
			  	<?php if ($contactos){ ?>
				<div class="table-responsive">
				<table id="example" class="display" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>Email</th>
			                <th>Usuario</th>
			                <th>Título</th>
			                <th>Mensaje</th>
			                <th>Fecha</th>
			                <th>Visto</th>
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>#</th>
			                <th>Email</th>
			                <th>Usuario</th>
			                <th>Título</th>
			                <th>Mensaje</th>
			                <th>Fecha</th>
			                <th>Visto</th>
			            </tr>
			        </tfoot>
			        <tbody>
					
					<?php $i=0; ?>
			        <?php foreach ($contactos->result() as $key): ?>
			        	<?php $i++; ?>
			        
			            <tr>
			                <td><?php echo $i; ?></td>
			                <td><?php echo $key->email_contacto; ?></td>
			                <td><?php echo $key->nombre_contacto; ?></td>
			                <td><?php echo $key->titulo_contacto; ?></td>
			                <td><?php echo $key->mensaje_contacto; ?></td>
			                <td><?php echo $key->fecha_contacto; ?></td>
			                <td>
			                	<?php if ($key->estado_contacto){ ?>
			                		<button class="btn btn-success btn-sm" disabled=""><i class="fa fa-check"></i></button>
			                	<?php }else{ ?>
			                		<button class="btn btn-danger btn-sm" data-url="<?php echo site_url('Soy_Contactos/cambiarEstado').'/'.encode_url($key->idcontacto); ?>" onclick="cambiarEstado(this);"><i class="fa fa-times"></i></button>
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

<?php if ($this->session->flashdata('okContacto')): ?>
	<script>
		alertify.success("<?php echo $this->session->flashdata('okContacto'); ?>");
	</script>
<?php endif ?>

<script src="<?php echo base_url('assets/js/logica/soy_contacto_index.js'); ?>"></script>
