<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Archivo');
		$this->load->model('Blog');
		$this->load->model('Comentario');
		$this->load->model('Usuario');
		$this->load->model('Perfil');
	}
	public function index()
	{	
		$cabeza = array(
			'titulo' 	=> 'Blog'
		);

		if ($this->session->userdata(soyMiperfil())==soyPA()) {
			$resNumeroBlog=$this->Blog->numeroBlogAdmin();
		}
		else{
			$resNumeroBlog=$this->Blog->numeroBlog();
		}

		$this->load->view('header',$cabeza);
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'Soy_blogs/index';
		$config['total_rows'] = $resNumeroBlog;
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		if ($this->session->userdata(soyMiperfil())==soyPA()) {
			$listaBlog=$this->Blog->paginacionAdmin($config['per_page']);
			
		}else{
			$listaBlog=$this->Blog->paginacion($config['per_page']);
			
		}
		$data = array(
						'blogs' 		=>	$listaBlog,
						'paginacion'	=>	$this->pagination->create_links()
						);
		
		$this->load->view('blogs/index',$data);
		$this->load->view('foot');
	}


	public function nuevo()
	{

		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}else{
			$cabeza = array(
				'titulo' 	=> 'Nuevo blog'
			);
			$data = array('usuario' => $this->Usuario->obtenerPorId($this->session->userdata(soyId())));
			$this->load->view('header',$cabeza);
			$this->load->view('blogs/nuevo',$data);
			$this->load->view('foot');		
		}
		
	}

	public function crear()
	{
		$foto=$this->input->post('foto_noticia');
		$data = array(
						'tema_noticia' 			=>	$this->input->post('titulo'),
						'descripcion_noticia'	=>	$this->input->post('contenido'),
						'fecha_noticia'			=>	date('Y-m-d H:i:s'),
						'usuario_id_usuario'	=>	$this->session->userdata(soyId()),
						'contador_noticia'		=>	1,
						'estado_noticia'		=>	false	
					);

		$this->form_validation->set_data($data);
		// validar tema
		$this->form_validation->set_rules('tema_noticia', 'Título', 'trim|required|min_length[5]|max_length[250]',
			array(
					'required'		=>	'Por favor, título del blog',
					'min_length'	=>	'Mínimo 5 caracteres en título de blog',
					'max_length'	=>	'Máximo 250 caracteres en título de blog'
				)
		);
		// validar descripcion
		$this->form_validation->set_rules('descripcion_noticia', 'Contenido', 'trim|required|min_length[5]',
				array(
						'required'		=>	'Por favor, contenido del blog',
						'min_length'	=>	'Mínimo 5 caracteres en contenido'
					)
			);
		// validar foto
		$this->form_validation->set_rules($foto, 'Foto', 'trim|required',
				array(
						'required'=>	'Por favor, foto de blog'
					)
			);

		if ($this->form_validation->run() == TRUE) {
			$nombreArchivo=$this->Archivo->subirArchivo('./assets/images/blogs/','sin archivo','archivo');
			if ($nombreArchivo!=null) {
				$data['foto_noticia']=$nombreArchivo;	
			}else{
				$data['foto_noticia']='';
			}
			
			$idBlog=$this->Blog->guardar($data);

			$dataRes = array(
							'msj' => 'Nuevo blog creado exitoso. Uno de nuestro equipo analizará el contenido del blog para ser visible al público.<br> Desea ver blog creado.?',
							'id'=>encode_url($idBlog)
						);
			$this->session->set_flashdata('blogNuevoOk', $dataRes);
			redirect('Soy_blogs/index','refresh');
		} else {
			$this->session->set_flashdata('erroFormBlog', validation_errors());
			redirect('Soy_blogs/nuevo','refresh');
		}
	}

	public function ver($idB)
	{
		$cabeza = array(
					'titulo' 	=> 'Detalle blog'
				);

		$this->load->view('header',$cabeza);

		if (decode_url($idB)) {
			
			// si existe blog estado true, o es user admin o si blog suario es = usuario login accesso
			$resB=$this->Blog->obtenerPorId(decode_url($idB));
			if ($resB) {
				
			
				if ($this->Blog->obtenerPorId(decode_url($idB))->estado_noticia || $this->session->userdata(soyMiperfil())==soyPA() || $this->session->userdata(soyId())==$this->Usuario->obtenerPorId($this->Blog->obtenerPorId(decode_url($idB))->usuario_id_usuario)->id_usuario) {
					$data = array(
			 					'blog' 			=>	$this->Blog->obtenerPorId(decode_url($idB)),
			 					'usuario'		=>	$this->Usuario->obtenerPorId($this->Blog->obtenerPorId(decode_url($idB))->usuario_id_usuario),
			 					'perfil'		=>	$this->Perfil->obtenerPorId($this->Usuario->obtenerPorId($this->Blog->obtenerPorId(decode_url($idB))->usuario_id_usuario)->perfil_id_perfil),
			 					'comentarios'	=>	$this->Comentario->obtenerPorIdBlog(decode_url($idB)),
			 					'blogsUsuario'	=> 	$this->Blog->obtenerBlogsPorIdUsuario($this->Blog->obtenerPorId(decode_url($idB))->usuario_id_usuario),
			 					'usuarioConec'	=>$this->Usuario->obtenerPorId($this->session->userdata(soyId()))
			 				);
				 	$arrayContador = array('contador_noticia' => $this->Blog->obtenerPorId(decode_url($idB))->contador_noticia +1);
				 	$this->Blog->atualizar(decode_url($idB),$arrayContador);
				 	$this->load->view('blogs/ver',$data);	
				}else{
					$this->session->set_flashdata('msjError', 'Opps, no tienes acceso a esté blog. porque aún no esta aprobado');
					redirect('Soy_security/error','refresh');
				}
			}else{
				$this->session->set_flashdata('msjError', 'Opps, algo salio mal blog no existe..');
		 		redirect('Soy_security/error','refresh');
			}
		 	
		 }else{
		 	$this->session->set_flashdata('msjError', 'Opps, algo salio mal intente otravez');
		 	redirect('Soy_security/error','refresh');
		 }

		
		$this->load->view('foot');
		
	}


	public function aprobarNoticia($idN)
	{
		if (decode_url($idN)) {
			if (! $this->session->userdata(soyLogin())) {
				redirect('Soy_Login/soy_iniciar','refresh');
			}else{
				if ($this->session->userdata(soyMiperfil())==soyPA()) {
					$noticia=$this->Blog->obtenerPorId(decode_url($idN));
					if ($noticia->estado_noticia) {
						$estado=false;
					}else{
						$estado=true;
					}
					$data = array('estado_noticia' => $estado);
					$this->Blog->atualizar(decode_url($idN),$data);

					if ($estado) {
						$this->session->set_flashdata('blogOkEstado', 'Blog aprobada exitosa.');
						redirect('Soy_blogs/index','refresh');
					}else{
						$this->session->set_flashdata('blogOkEstado', 'Blog anulado exitosa.');
						redirect('Soy_blogs/index','refresh');
					}
					
				}else{
					$this->session->set_flashdata('msjError', 'Opps, algo salio mal');
					redirect('Soy_security/error','refresh');
				}
			}
		}else{
		 	$this->session->set_flashdata('msjError', 'Opps, algo salio mal intente otravez');
		 	redirect('Soy_security/error','refresh');
		 }
	}


	public function editar($idB)
	{
	
			if (! $this->session->userdata(soyLogin())) {
				redirect('Soy_Login/soy_iniciar','refresh');
			}else{
					if (decode_url($idB)) {
						$resB=$this->Blog->obtenerPorId(decode_url($idB));			
						if ($resB->usuario_id_usuario==$this->session->userdata(soyId())) {
							$data = array(
											'blog' => $resB,
											'usuario' => $this->Usuario->obtenerPorId($resB->usuario_id_usuario)
										);
							$cabeza = array(
								'titulo' 	=> 'Editar blog'
							);

							$this->load->view('header',$cabeza);
							$this->load->view('blogs/editar',$data);
							$this->load->view('foot');
						}else{
							$this->session->set_flashdata('msjError', 'Opps, algo salio mal, acción denegada');
					 		redirect('Soy_security/error','refresh');	
						}
					}else{
						$this->session->set_flashdata('msjError', 'Opps, algo salio mal intente otravez');
					 	redirect('Soy_security/error','refresh');
					}	
			}
		
		
	}


	public function actualizar()
	{
	
		$data = array(
						'idB'					=>	decode_url($this->input->post('idB')),
						'tema_noticia' 			=>	$this->input->post('titulo'),
						'descripcion_noticia'	=>	$this->input->post('contenido'),
					);

		$this->form_validation->set_data($data);
		// validar id blog

		$this->form_validation->set_rules('idB', 'Blog id', 'trim|required',array('required'=>'Opps, Blog id requerida'));
		// validar tema
		$this->form_validation->set_rules('tema_noticia', 'Título', 'trim|required|min_length[5]|max_length[250]',
			array(
					'required'		=>	'Por favor, título del blog',
					'min_length'	=>	'Mínimo 5 caracteres en título de blog',
					'max_length'	=>	'Máximo 250 caracteres en título de blog'
				)
		);
		// validar descripcion
		$this->form_validation->set_rules('descripcion_noticia', 'Contenido', 'trim|required|min_length[5]',
				array(
						'required'		=>	'Por favor, contenido del blog',
						'min_length'	=>	'Mínimo 5 caracteres en contenido'
					)
			);
	

		if ($this->form_validation->run() == TRUE) {
				$resB=$this->Blog->obtenerPorId(decode_url($this->input->post('idB')));			
				if ($resB->usuario_id_usuario==$this->session->userdata(soyId())) {

					$dataActualizar = array(
						'tema_noticia' 			=>	$this->input->post('titulo'),
						'descripcion_noticia'	=>	$this->input->post('contenido'),
					);

					$nombreArchivo=$this->Archivo->subirArchivo('./assets/images/blogs/','sin archivo','archivo');
					if ($nombreArchivo) {
						unlink('./assets/images/blogs/'.$resB->foto_noticia);
						$dataActualizar['foto_noticia']=$nombreArchivo;	
					}else{
						$dataActualizar['foto_noticia']=$resB->foto_noticia;
					}
					
					$idBlog=$this->Blog->actualizar($resB->id_noticia,$dataActualizar);

					$dataRes = array(
									'msj' => 'Blog actualizado exitoso. Uno de nuestro equipo analizara el contenido del blog para ser visible al público.<br> Desea ver blog actualizado.?',
									'id'=>$this->input->post('idB')
								);
					$this->session->set_flashdata('blogNuevoOk', $dataRes);
					redirect('Soy_blogs/index','refresh');

				}else{
					$this->session->set_flashdata('msjError', 'Opps, algo salio mal, acción denegada');
				 	redirect('Soy_security/error','refresh');
				}
		} else {
			$this->session->set_flashdata('erroFormBlog', validation_errors());
			redirect('Soy_blogs/nuevo','refresh');
		}
	}


	public function eliminar($idB)
	{
		
			if (! $this->session->userdata(soyLogin())) {
				redirect('Soy_Login/soy_iniciar','refresh');
			}else{

				if (decode_url($idB)) {
					$resB=$this->Blog->obtenerPorId(decode_url($idB));
					$resBPhoto=$resB->foto_noticia			;
					if ($resB->usuario_id_usuario==$this->session->userdata(soyId())) {
						$resBEliminar=$this->Blog->eliminar(decode_url($idB));
						if ($resBEliminar) {
							unlink('./assets/images/blogs/'.$resBPhoto);
							$this->session->set_flashdata('okBlog', 'Blog Eliminado exitos.');
							redirect('Soy_blogs/index','refresh');
						}else{
							$this->session->set_flashdata('noBlog', 'Blog no eliminado, ya que contiene otros contenidos.');
							redirect('Soy_blogs/ver'.'/'.$idB,'refresh');
						}
					}else{
						$this->session->set_flashdata('msjError', 'Opps, algo salio mal, acción denegada');
				 		redirect('Soy_security/error','refresh');
					}

				}else{
				 	$this->session->set_flashdata('msjError', 'Opps, algo salio mal intente otravez');
				 	redirect('Soy_security/error','refresh');
				 }
			}
		
	}

}

/* End of file Soy_blogs.php */
/* Location: ./application/controllers/Soy_blogs.php */