<section id="soy_blog" class="myportada" style="background-image: url(<?php echo base_url('assets/images/soyPoratadaBlogs.jpg'); ?>);">
</section>
<script src="https://apis.google.com/js/platform.js" async defer>
</script>

<a href="<?php echo site_url('Soy_blogs/index'); ?>" class="btn btn-outline-default btn-rounded waves-effect btn-sm pull-right"> <i class="fa fa-mail-reply"></i> Atras</a>
<section class="clients" >
	<div id="single-blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<!-- start:single content -->
						<div id="main-single-content">
						<?php if ($blog->foto_noticia){ ?>
							<img src="<?php echo base_url('assets/images/blogs/').$blog->foto_noticia; ?>" class="img-responsive">
						<?php  }else{ ?>
							<img src="<?php echo base_url('assets/images/soy_poratadaperfil.jpg'); ?>" class="img-responsive">
						<?php  } ?>
							
							<div class="content-single">
								<h2>
									<?php echo $blog->tema_noticia; ?>
								</h2>
								<div class="tag">
									<p>	
										<span>
										<i class="fa fa-user" data-original-title="" title=""></i> 
											
												<?php echo $perfil->nombre_perfil; ?>
											
										</span> 
										<span><i class="fa fa-calendar" data-original-title="" title=""></i>
											<?php echo $blog->fecha_noticia; ?>
										</span>
										<span>
										<i class="fa fa-eye" data-original-title="" title=""></i> 
											+ <?php if ($blog->contador_noticia){ ?>
												<?php echo $blog->contador_noticia; ?>	
											<?php  }else{ ?>
											0
											<?php  } ?>
											
										</span>
										
										<?php if ($this->session->userdata(soyLogin())): ?>

					                        <?php if ($blog->usuario_id_usuario==$this->session->userdata(soyId())): ?>
												<a href="<?php echo site_url('Soy_blogs/editar').'/'.encode_url($blog->id_noticia); ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
												<button type="button" onclick="eliminarBlog(this);" data-url="<?php echo site_url('Soy_blogs/eliminar').'/'.encode_url($blog->id_noticia); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
					                        	
					                        <?php endif ?>
					                        	
					                    <?php endif ?>

									</p>
								</div>
								<div class="hr-single"></div>
								<div>
									<?php echo $blog->descripcion_noticia; ?>
								</div>
								<a class="" target="_blank" href="http://www.facebook.com/share.php?u=<?php echo site_url('Soy_blogs/ver').'/'.encode_url($blog->id_noticia); ?>"><i class="fa fa-facebook-official"></i><small><strong> Compartir</strong></small></a>
<br>

								<g:plus action="share"></g:plus>
								<div class="hr-single"></div>
								<!-- start:comments -->
								<div id="comments-list">
									<!-- start:comments list -->
									<div class="comment">
										<h3>Lista de comentarios</h3>
										
										<?php if ($comentarios){ ?>
											
											<ul class="comments">
												
												<?php foreach ($comentarios->result() as $resC): ?>
													
												
					                                <li class="clearfix">
					                                	<?php if ($resC->foto_usuario){ ?>
					                                		<img src="<?php echo base_url('assets/images/foto/').$resC->foto_usuario; ?>" class="avatar" alt="user">	
					                                	<?php }else{ ?>
															<img src="<?php echo base_url('assets/images/soy_sinfoto.png'); ?>" class="avatar" alt="user">
					                                	<?php } ?>
					                                    
					                                    <div class="post-comments">
					                                        <p class="meta"> 
					                                        	<a href="<?php echo site_url('Soy_security/perfilUsuario').'/'.encode_url($resC->id_usuario); ?>"><?php echo $resC->nombre_usuario; ?> <?php echo $resC->apellido_usuario; ?></a> Dice:
					                                        	<?php if ($this->session->userdata(soyLogin())): ?>

					                                        	<?php if ($resC->id_usuario==$this->session->userdata(soyId())): ?>
					                                        	
	<button onclick="eliminarComentario(this);" data-url="<?php echo site_url('Soy_Comentarios/eliminar').'/'.encode_url($resC->id_comentario).'/'.encode_url($blog->id_noticia); ?>" class="pull-right btn-link">
		<i class="fa fa-trash" style="color: #fc0079;"></i>	
	</button>
					                                        	<button class="pull-right btn-link" data-id="<?php echo encode_url($resC->id_comentario); ?>" data-res="<?php echo $resC->descripcion_comentario; ?>" onclick="editarComentario(this);">
					                                        		<i class="fa fa-pencil" style="color: #0079fc;"></i>
					                                        	</button>
					                                        	
					                                        	<?php endif ?>
					                                        	<?php endif ?>
					                                        	
					                                        </p>
					                                        
					                                        <p>
					                                            <?php echo $resC->descripcion_comentario; ?>
					                                        </p>
					                                        <small class="pull-right"><?php echo $resC->fecha_comentario; ?></small>
					                                        <br>
					                                    </div>
					                                </li>
												<?php endforeach ?>
				                            </ul>

										<?php }else{ ?>
											<div class="alert alert-info">
											  <strong>No existe comentarios</strong>, se el primero en comentar esté grandioso blog.
											</div>
										<?php } ?>
										
			                            
									</div>
									<!-- end:comments list -->
									<!-- start:form comment -->
									

										
									
									<div class="form-comment">

										<?php if ($this->session->userdata(soyLogin())) {  ?>

											<?php if ($usuarioConec->nombre_usuario && $usuarioConec->apellido_usuario){ ?>
												
													<form method="POST" action="<?php echo site_url('Soy_Comentarios/guardar'); ?>" id="formComentario">

													<?php if ($this->session->flashdata('erroFormComentario')): ?>
														<div class="alert alert-info">
														  <strong>
														  <?php echo $this->session->flashdata('erroFormComentario'); ?>
														  </strong>
														</div>
													<?php endif ?>
														<input type="hidden" required="" value="<?php echo encode_url($blog->id_noticia); ?>" name="id" id="id" >
														<!--Naked Form-->
														<div class="card-block">
														    <div class="md-form">
														        <i class="fa fa-pencil prefix"></i>
														        <textarea rows="20" cols="100"  type="text" id="comentario" name="comentario" class="md-textarea"></textarea>
														        <label for="comentario">Ingrese comentario....</label>
														    </div>
														        <button type="submit" id="btnNuevoCoemntario" class="btn btn-outline-primary waves-effect"><i class="fa fa-commenting"></i> Comentar</button>
														</div>
														<!--Naked Form-->
													</form>

											<?php }else{ ?>
													<div class="alert alert-warning">
													  <strong>
													  	<a href="<?php echo site_url('Soy_security/soy_perfil'); ?>">
													  		Por favor, actualice sus datos de perfil para comentar.
													  	</a>
													</div>
											<?php } ?>
											


											<?php }else{ ?>
												<div class="alert alert-warning">
												  <strong>
												  	<a href="<?php echo site_url('Soy_Login/soy_iniciar'); ?>">
												  		Inicie sesión en soysoftware para comentar.
												  	</a><br>
												  </strong>Si no tienes cuenta. SUBCRIBE GRATIS
												</div>
											<?php } ?>

										
									</div>
									<!-- end:form comment -->
								</div>
								<!-- end:comments -->
							</div>
						</div>
						<!-- end:single content -->
					</div>
					<div class="col-lg-4 col-md-4">
						<!-- start:sidebar -->
						<div id="sidebar">
							<!-- start:about -->
							<div class="widget-sidebar">
								<h3 class="title-widget-sidebar">
									Acerca del autor
								</h3>
								<div class="content-widget-sidebar">
									<div class="card hovercard">
						                <div class="cardheader">

						                </div>
						                <div class="avatar">
						                	<?php if ($usuario->foto_usuario){ ?>
						                		<img alt="" src="<?php echo base_url('assets/images/foto/').$usuario->foto_usuario; ?>">	
						                	<?php }else{ ?>
												<img alt="" src="<?php echo base_url('assets/images/soy_sinfoto.png'); ?>">
						                	<?php } ?>
						                    
						                </div>
						                <div class="info">
						                    <div class="title">
						                        <strong>
						                        	<a href="<?php echo site_url('Soy_security/perfilUsuario').'/'.encode_url($usuario->id_usuario); ?>">
						                        		<?php echo $usuario->nombre_usuario.' '.$usuario->apellido_usuario; ?>
						                        	</a>
						                        </strong>
						                    </div>
						                    <div class="desc">
						                    	<?php echo $usuario->descripcion_usuario; ?>
						                    </div>
						                </div>
						                <div class="bottom">
						                <?php if ($usuario->facebook): ?>
						                	<a class="" target="_blank" rel="publisher"
						                       href="<?php echo $usuario->facebook; ?>">
						                        <i class="fa fa-facebook fa-2x"></i>
						                    </a>
						                <?php endif ?>
						                	
						                   <?php if ($usuario->youtube): ?>
							                   	<a class="" target="_blank" rel="publisher"
							                       href="<?php echo $usuario->youtube; ?>">
							                        <i class="fa fa-youtube-play fa-2x" style="color: red;"></i>
							                    </a>
						                   <?php endif ?>
						                   <?php if ($usuario->twitter): ?>
						                   	<a class="" target="_blank" href="<?php echo $usuario->twitter; ?>">
						                        <i class="fa fa-twitter fa-2x"></i>
						                    </a>
						                   <?php endif ?>
						                   	 


						                    
						                </div>
						            </div>
							</div>

							</div>
							<!-- end:about -->
							<!-- start:widget recent post -->
							<div class="widget-sidebar">
								<h3 class="title-widget-sidebar">
									Blog's del autor
								</h3>
								<div class="content-widget-sidebar">
									<ul>
										<?php if ($blogsUsuario){ ?>
											<?php foreach ($blogsUsuario->result() as $key): ?>
												<li class="recent-post">
													<div class="thumbnail">
														
														<?php if ($key->foto_noticia){ ?>
															<img src="<?php echo base_url('assets/images/blogs/').$key->foto_noticia; ?>" class="img-responsive">
														<?php  }else{ ?>
															<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="img-responsive">
														<?php  } ?>
													</div>
													<a href="<?php echo site_url('Soy_blogs/ver').'/'.encode_url($key->id_noticia); ?>"><h5>
														<?php echo $key->tema_noticia; ?>
													</h5></a>
													<p><small><i class="fa fa-calendar" data-original-title="" title=""></i>

														<?php echo $key->fecha_noticia; ?>
	
													</small></p>
												</li>
												<hr>
											<?php endforeach ?>
										<?php  } else { ?>
											<div class="alert alert-info">
											  <strong>No existe blogs</strong>, relacionado con esté Autor.
											</div>
										<?php  } ?>
									</ul>
								</div>
							</div>
							<!-- end:widget recent post -->
							
						</div>
						<!-- end:sidebar -->
					</div>
				</div>
			</div>
	</div>
</section>




<!--Modal: editar comentario form-->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="title"><i class="fa fa-pencil"></i> Actualizar comentario</h4>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
                <form action="<?php echo site_url('Soy_Comentarios/actualizar'); ?>" method="post" id="formComentarioEdi">
	                <input type="hidden" id="idCome" name="idCome" class="form-control">
					<input type="hidden" id="idNoticia" name="idNoticia" value="<?php echo encode_url($blog->id_noticia); ?>" class="form-control">
	                <div class="md-form form-sm">
	                    <i class="fa fa-pencil prefix"></i>
	                    <textarea type="text" id="descripcionEd" name="descripcionEd" class="md-textarea mb-0"></textarea>
	                    <label id="labeldescripcionEd" for="descripcionEd">Comentario</label>
	                </div>

	                <div class="text-center mt-1-half">
	                    <button type="submit" id="btnActualizarComentario" class="btn btn-outline-primary waves-effect">Guardar <i class="fa fa-save"></i></button>
						<button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">Cancelar <i class="fa fa-times"></i></button>
	                </div>
               </form>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: editar comentario form-->


<?php if ($this->session->flashdata('okComentario')): ?>
	<script>
		 alertify.success("<?php echo $this->session->flashdata('okComentario'); ?>");
	</script>
<?php endif ?>

<?php if ($this->session->flashdata('noComentario')): ?>
	<script>
		 alertify.message("<?php echo $this->session->flashdata('noComentario'); ?>");
	</script>
<?php endif ?>

<?php if ($this->session->flashdata('noBlog')): ?>
	<script>
		alertify.message("<?php echo $this->session->flashdata('noBlog'); ?>");
	</script>
	
<?php endif ?>

<script src="<?php echo base_url('assets/js/logica/soy_blog_ver.js'); ?>"></script>