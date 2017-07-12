<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario');
		$this->load->model('Perfil');
	}
	public function soy_autenticar()
	{

			$accion=$this->input->post('id');
			
			if (!($accion=='soysotware_a' || $accion=="soysotware_b")) {
				$this->session->set_flashdata(array('usuarioNo'=>'Ops, no entiendo lo que estás ??.!!ndo..!'));
				redirect(site_url('Soy_Login/soy_iniciar'),'refresh');
			}else{


				$data=array();
				
				if ($accion=="soysotware_a") {
					$data['email_usuario'] 	=$this->input->post('email');
					$data['password_usuario']	=$this->input->post('password');
				}
				if ($accion=="soysotware_b") {
					$data['email_usuario'] 	=$this->input->post('email_user');
					$data['password_usuario']	=$this->input->post('password_user');

				}


				$this->form_validation->set_data($data);
				
				// email validate
				$this->form_validation->set_rules('email_usuario', 'Email', 'trim|required|valid_email',
															array(
																'required'=>'Por favor, introduzca una dirección de correo electrónico válida',
																'valid_email'=>	'Dirección de correo electrónico no válida'
																)
													);
				$this->form_validation->set_rules('password_usuario', 'fieldlabel', 'trim|required|min_length[5]',
														array(
																'required'		=>	'Por favor password',
																'min_length'	=>	'Ingrese mínimo 6 caracteres en password'
															)
													);

				if ($this->form_validation->run() == TRUE) {
					$datosUsuario=$this->Usuario->obtenerPorEmail($data['email_usuario']);
					if ($datosUsuario) {
						$claveDecode=$this->encrypt->decode($datosUsuario->password_usuario);

						if ($claveDecode==$data['password_usuario']) {
							if ($datosUsuario->estado_usuario) {

								$datosPerfil=$this->Perfil->obtenerPorId($datosUsuario->perfil_id_perfil);

								$array = array(
									soyLogin() => true,
									soyId()=>	$datosUsuario->id_usuario,
									soyPhoto()=>	$datosUsuario->foto_usuario,
									soyMiperfil()=>	$datosPerfil->nombre_perfil
								);
								
								$this->session->set_userdata( $array );

								$this->session->set_flashdata('bienvenido', 'Bienvenido a Soysoftware: '.$datosUsuario->email_usuario);
								redirect('Soy_soysoftware/index','refresh');
							}else{
								$this->session->set_flashdata(array('usuarioNo'=>'Opps, Su cuenta está suspendida por el momento, por favor envíanos un mensaje a info@soysoftware.com, y uno de nuestro equipo te respondera inmediato.'));
								redirect(site_url('Soy_Login/soy_iniciar'),'refresh');		
							}
						}else{
							$this->session->set_flashdata(array('usuarioNo'=>'Password ingresada incorrecta.!'));
							redirect(site_url('Soy_Login/soy_iniciar'),'refresh');	
						}
					}else{
						$this->session->set_flashdata(array('usuarioNo'=>'Usuario no registrado en el sistema.!'));
						redirect(site_url('Soy_Login/soy_iniciar'),'refresh');	
					}

				} else {
					$this->session->set_flashdata(array('errorFormValidacion'=>validation_errors()));
					redirect(site_url('Soy_Login/soy_iniciar'),'refresh');
				}
			}

	}


	public function soy_iniciar()
	{
		$cabeza = array(
			'titulo' 	=> 'Iniciar'
		);
		$this->load->view('header',$cabeza);
		$this->load->view('login/iniciar');
		$this->load->view('foot');
	}

	
	public function soy_resetearPassword()
	{
		$cabeza = array(
					'titulo' 	=> 'Recuperar contraseña'
				);
		$this->load->view('header',$cabeza);
		$this->load->view('login/resetearPassword');
		$this->load->view('foot');
	}

	public function soy_resetarPasswordEmail()
	{
		$nuevoPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
		$data = array(
						'email_usuario' 		=>	$this->input->post('email_userResetearPassword'),
						'password_usuario'		=>	$this->encrypt->encode($nuevoPassword)
						);
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('email_usuario', 'Email', 'trim|required|valid_email|callback_validarExistenciaEmail[email_usuario]',
											array(
												'required'=>'Ingrese email..',
												'valid_email'=>	'Email no válido..',
												'validarExistenciaEmail'=>'Email, no registrado en soysoftware..'
											)
										);
		if ($this->form_validation->run() == TRUE) {
			

			$this->email->clear();
		    $config['mailtype'] = "html";
		    $this->email->initialize($config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('info@soysoftware.com','SOYSOFTWARE #innovación');
		    $this->email->to($this->input->post('email_userResetearPassword')); 
		    $this->email->subject('Recuperar contraseña');
		    $this->email->message($this->load->view('security/enviarEmailResetearPassword', $data, TRUE));  

		    if ($this->email->send()) {
		    	$resU=$this->Usuario->obtenerPorEmail($this->input->post('email_userResetearPassword'));
		    	if ($resU->estado_usuario) {
		    			$this->Usuario->actualizar($resU->id_usuario,$data);
				    	$this->session->set_flashdata('okEmail', 'Por favor, revisa tú correo '.$this->input->post('email_userResetearPassword').' enviamos información para que puedas iniciar sessíon. :)');
						redirect('Soy_Welcome/index','refresh');
		    	}else{
		    		$this->session->set_flashdata('noEmail', 'Opps, Su cuenta está suspendida por el momento, por favor envíanos un mensaje a info@soysoftware.com, y uno de nuestro equipo te respondera inmediato.');
				redirect('Soy_Welcome/index','refresh');
		    		
		    	}
		    
		    }else{
		    	$this->session->set_flashdata('noEmail', 'Lo siento ocurrio un error. Por favor vuelva intentar.');
				redirect('Soy_Welcome/index','refresh');
		    }

		} else {
			$this->session->set_flashdata('erroFormResetearPassword', validation_errors());
			redirect('Soy_Login/soy_resetearPassword','refresh');
		}
	}

	public function validarExistenciaEmail($str)
	{
		if ($this->Usuario->obtenerPorEmail($str)) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */