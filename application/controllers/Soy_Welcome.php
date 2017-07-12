<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Blog');
		$this->load->model('Usuario');
		$this->load->model('Perfil');
	}

	public function index()
	{	
		$cabeza = array(
			'titulo' 	=> 'Bienvenido a SOYSOFTWARE'
		);
		$this->load->view('header',$cabeza);
		$data = array('blogs' => $this->Blog->lista());
		$this->load->view('welcome',$data);
		$this->load->view('foot');
	}

	public function suscribir()
	{
		$idP="";
		$resP=$this->Perfil->obtenerPorNombre(soyPU())->id_perfil;
		if ($resP) {
			$idP=$resP;
		}else{
			$data = array('nombre_perfil' => soyPU());
			$idP=$this->Perfil->guardarRetornarId($data);
		}
		$nuevoPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
		$data = array(
						'email_usuario' 		=>	$this->input->post('EmailSuscribirse'),
						'password_usuario'		=>	$this->encrypt->encode($nuevoPassword),
						'perfil_id_perfil'		=>	$idP,
						'estado_usuario'		=>	1,
						'fecha_usuario'			=>	date('Y-m-d H:i:s')
						);
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('email_usuario', 'Email', 'trim|required|valid_email|callback_validarExistenciaEmail[email_usuario]',
											array(
												'required'=>'Ingrese email..',
												'valid_email'=>	'Email no válido..',
												'validarExistenciaEmail'=>'Email, ya está registrada..'
											)
										);
		if ($this->form_validation->run() == TRUE) {
			

			$this->email->clear();
		    $config['mailtype'] = "html";
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('info@soysoftware.com','SOYSOFTWARE #innovación');
		    $this->email->to($this->input->post('EmailSuscribirse')); 
		    $this->email->subject('Registro exitoso');
		    $this->email->message($this->load->view('security/enviarEmail', $data, TRUE));  

		    if ($this->email->send()) {
		    	$this->Usuario->guardar($data);
		    	$this->session->set_flashdata('okEmail', 'Por favor, revisa tú correo '.$this->input->post('EmailSuscribirse').' enviamos información para que puedas iniciar sessíon. :)');
				redirect('Soy_Welcome/index','refresh');
		    }else{
		    	$this->session->set_flashdata('noEmail', 'Lo siento ocurrio un error. Por favor vuelva intentar.');
				redirect('Soy_Welcome/index'.'#susbribirse','refresh');
		    }

		} else {
			$this->session->set_flashdata('erroFormSuscribir', validation_errors());
			redirect('Soy_Welcome/index'.'#susbribirse','refresh');
		}
	}

	public function validarExistenciaEmail($str)
	{
		if ($this->Usuario->obtenerPorEmail($str)) {
			return false;
		}else{
			return true;
		}
	}

	
	
}
