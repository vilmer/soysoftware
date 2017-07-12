<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_Comentarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}

		$this->load->model('Comentario');
		$this->load->model('Usuario');
	}

	public function guardar()
	{
		$data = array(
						'descripcion_comentario' 	=> $this->input->post('comentario') , 
						'fecha_comentario'			=> 	date('Y-m-d H:i:s'),
						'noticia_id_noticia'		=>	decode_url($this->input->post('id')),
						'usuario_id_usuario'		=>	$this->session->userdata(soyId())
					);

		// validar formulario

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('descripcion_comentario', 'Comentario', 'trim|required|min_length[2]|max_length[250]',
				array(
						'required'		=>	'Por favor, comentario',
						'min_length'	=>	'Mínimo, 2 caracteres en comentario',
						'max_length'	=>	'Máximo, 250 caracteres en comentario'
					)
			);

		$this->form_validation->set_rules('noticia_id_noticia', 'fieldlabel', 'trim|required',
				array(	
						'required'	=>	'Opss, algo salio mal'
					)
			);	

		if ($this->form_validation->run() == TRUE) {
			
			$resUsuario=$this->Usuario->obtenerPorId($this->session->userdata(soyId()));
			if ($resUsuario->nombre_usuario && $resUsuario->apellido_usuario ) {
				$this->Comentario->guardar($data);
				$this->session->set_flashdata('okComentario', 'Comentario realizado exitoso.');
				redirect('Soy_blogs/ver'.'/'.$this->input->post('id'),'refresh');
			}else{
				$this->session->set_flashdata('noComentario', 'Actualice sus datos, para poder comentar.');
				redirect('Soy_blogs/ver'.'/'.$this->input->post('id'),'refresh');	
			}
			


		} else {
			$this->session->set_flashdata('erroFormComentario', validation_errors());
			redirect('Soy_blogs/ver'.'/'.$this->input->post('id'),'refresh');
		}

	}

	public function actualizar()
	{
		$data = array(
						'idNoticia' 				=>	decode_url($this->input->post('idNoticia')) , 
						'idCome'					=> 	decode_url($this->input->post('idCome')),
						'descripcionEd'				=>	$this->input->post('descripcionEd'),
						'fecha_comentario'		=>	date('Y-m-d H:i:s')
					);

		// validar formulario

		$this->form_validation->set_data($data);
		
		$this->form_validation->set_rules('idNoticia', 'Id, noticia', 'trim|required',array('required'=>'Opps, id noticia requerida'));
		$this->form_validation->set_rules('idCome', 'Id, comentario', 'trim|required',array('required'=>'Opps, id comentario requerida'));
		$this->form_validation->set_rules('descripcionEd', 'Comentario', 'trim|required|min_length[2]|max_length[250]',

				array(
						'required'		=>	'Por favor, comentario',
						'min_length'	=>	'Mínimo, 2 caracteres en comentario',
						'max_length'	=>	'Máximo, 250 caracteres en comentario'
					)

			);

		if ($this->form_validation->run() == TRUE) {
			$resC=$this->Comentario->obtnerPorId(decode_url($this->input->post('idCome')));

			if ($resC->usuario_id_usuario==$this->session->userdata(soyId()) && $resC->noticia_id_noticia==decode_url($this->input->post('idNoticia'))) {
				
				$dataEd = array(
									'descripcion_comentario'=>	$this->input->post('descripcionEd')
							 );

				$this->Comentario->actualizar(decode_url($this->input->post('idCome')),$dataEd);	
				$this->session->set_flashdata('okComentario', 'Comentario actualizado exitoso.');
				redirect('Soy_blogs/ver'.'/'.$this->input->post('idNoticia'),'refresh');
			}else{
				$this->session->set_flashdata('okComentario', 'Opps, no puedes actualizar este comentario.');
				redirect('Soy_blogs/ver'.'/'.$this->input->post('idNoticia'),'refresh');
			}
			
			


		} else {
			$this->session->set_flashdata('erroFormComentario', validation_errors());
			redirect('Soy_blogs/ver'.'/'.$this->input->post('idNoticia'),'refresh');
		}
	}


	public function eliminar($idC,$idN)
	{
		if (decode_url($idC) && decode_url($idN)) {
				$resC=$this->Comentario->obtnerPorId(decode_url($idC));
				if ($resC) {
					if ($resC->usuario_id_usuario==$this->session->userdata(soyId()) && $resC->noticia_id_noticia==decode_url($idN) ) {
						
						$resCE=$this->Comentario->eliminar(decode_url($idC));
						if ($resCE) {
							$this->session->set_flashdata('okComentario', 'Comentario eliminado exitoso');
							redirect('Soy_blogs/ver'.'/'.$idN,'refresh');	
						}else{
							$this->session->set_flashdata('noComentario', 'Comentario no  eliminado, ya que se encuentra relaciona con otras partes del sistema');
							redirect('Soy_blogs/ver'.'/'.$idN,'refresh');	
						}
						
					}else{
						$this->session->set_flashdata('noComentario', 'Opps, no puedes eliminar este comentario.');
						redirect('Soy_blogs/ver'.'/'.$idN,'refresh');
					}
					
				}else{
					$this->session->set_flashdata('noComentario', 'Opps, comentario no encontrado.');
					redirect('Soy_blogs/ver'.'/'.$idN,'refresh');
				}
		}else{
			redirect('Soy_security/error','refresh');
		}	
	}

}

/* End of file Soy_Comentarios.php */
/* Location: ./application/controllers/Soy_Comentarios.php */