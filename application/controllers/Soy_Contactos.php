<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_Contactos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contacto');
	}

	public function index()
	{
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}else{
			if ($this->session->userdata(soyMiperfil())==soyPA()) {
				$data = array('contactos' => $this->Contacto->lista());

				$cabeza = array(
					'titulo' 	=> 'Lista de contactos'
				);
				$this->load->view('header',$cabeza);
				$this->load->view('contacto/index',$data);
				$this->load->view('foot');	
			}else{
				$this->session->set_flashdata('msjError', 'Opps, algo salio mal..No tienes permisos para está acción');
		 		redirect('Soy_security/error','refresh');
			}	
		}
	}


	public function guardar()
	{
		$data = array(
			'nombre_contacto'=>$this->input->post('nombreContacto'),
	        'titulo_contacto'=>$this->input->post('temaContacto'),
	        'mensaje_contacto'=>$this->input->post('mensajeContacto'),
	        'email_contacto'=>$this->input->post('emailContacto'),
	        'fecha_contacto'=>date('Y-m-d H:i:s'),
	        'estado_contacto'=>false
	    );
	    $this->form_validation->set_data($data);


	    // validar nombre
	    $this->form_validation->set_rules('nombre_contacto', 'Nombre contacto', 'trim|required|min_length[2]|max_length[250]',
	    	array(
	    			'required'	=>	'Por favor, nombre de contacto',
	    			'min_length'=>	'Mínimo, 2 caracteres en nombre contacto',
	    			'max_length'	=>	'Máximmo 250 caracteres en nombre contacto'
	    		)
	    );

		// validar tema
		$this->form_validation->set_rules('titulo_contacto', 'Título contacto', 'trim|required|min_length[2]|max_length[250]',
	    	array(
	    			'required'	=>	'Por favor, título de contacto',
	    			'min_length'=>	'Mínimo, 2 caracteres en título contacto',
	    			'max_length'	=>	'Máximmo 250 caracteres en título contacto'
	    		)
	    );

	    // validar mensaje
	    $this->form_validation->set_rules('mensaje_contacto', 'Mensaje contacto', 'trim|required|min_length[2]',
	    	array(
	    			'required'	=>	'Por favor, Mensaje de contacto',
	    			'min_length'=>	'Mínimo, 2 caracteres en mensaje contacto'
	    		)
	    );

	    // validar email
	    $this->form_validation->set_rules('email_contacto', 'Email contacto', 'trim|required|valid_email',
	    	array(
	    			'required'	=>	'Por favor, Mensaje de contacto',
	    			'valid_email'=>	'Email contacto inválido'
	    		)
	    );

	    if ($this->form_validation->run() == TRUE) {
	    	$this->Contacto->guardar($data);
	    	$this->session->set_flashdata('okContacto', 'Muy bien. Uno de nuestro equipo se pondra en contacto con Uds');
	    	redirect('Soy_Welcome/index','refresh');
	    } else {
	    	$this->session->set_flashdata('erroFormContacto', validation_errors());
	    	redirect('Soy_Welcome/index'.'#soy_contacto','refresh');
	    }
	    
	}


	public function cambiarEstado($idC)
	{
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}else{
			if ($this->session->userdata(soyMiperfil())==soyPA()) {
				if (decode_url($idC)) {
					$resC=$this->Contacto->obtenerPorId(decode_url($idC));
					if ($resC) {
						$data = array('estado_contacto' => true);
						$this->Contacto->actualizar(decode_url($idC),$data);
						$this->session->set_flashdata('okContacto', 'Contacto cambiado a visto exitoso');
						redirect('Soy_Contactos/index','refresh');
					}
				}else{
					$this->session->set_flashdata('msjError', 'Opps, algo salio mal..vuelva intentar');
		 		redirect('Soy_security/error','refresh');	
				}
			}else{
				$this->session->set_flashdata('msjError', 'Opps, algo salio mal..No tienes permisos para está acción');
		 		redirect('Soy_security/error','refresh');
			}	
		}
	}

}

/* End of file Soy_Contactos.php */
/* Location: ./application/controllers/Soy_Contactos.php */