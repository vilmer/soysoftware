<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_security extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}
		$this->load->model('Usuario');
		$this->load->model('Archivo');
	}
	public function soy_exit()
	{
		$this->session->sess_destroy();
		redirect('Soy_Welcome/index','refresh');
	
	}

	public function soy_perfil()
	{
		$cabeza = array(
			'titulo' 	=> 'Perfil de usuario'
		);
		$this->load->view('header',$cabeza);
		$data = array('datos' => $this->Usuario->obtenerPorId($this->session->userdata(soyId())) );
		$this->load->view('security/perfil',$data);
		$this->load->view('foot');
	}

	public function actualizarPerfil()
	{
		$data = array(
							'nombre_usuario' =>	$this->input->post('nombre'),
							'apellido_usuario'=>	$this->input->post('apellido'),
							'descripcion_usuario'=>	$this->input->post('descripcion'),
							'facebook'			=>	$this->input->post('facebook'),
							'twitter'			=>	$this->input->post('twitter'),
							'youtube'			=>	$this->input->post('youtube')


					 );

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('nombre_usuario', 'Nombre de usuario', 'trim|required|min_length[2]|max_length[100]',
				array(
						'required'	=>	'Por favor, nombre',
						'min_length'	=>	'Mínimo, 2 caracteres en nombre',
						'max_length'	=>	'Máximo, 100 caracteres en nombre'
					)
			);

		// validar apellido
		$this->form_validation->set_rules('apellido_usuario', 'Apellido de usuario', 'trim|required|min_length[2]|max_length[100]',
				array(
						'required'	=>	'Por favor, apellido',
						'min_length'	=>	'Mínimo, 2 caracteres en apellido',
						'max_length'	=>	'Máximo, 100 caracteres en apellido'
					)
			);
		// validar descripcion
		$this->form_validation->set_rules('descripcion_usuario', 'Descripcion de usuario', 'trim|required|min_length[2]|max_length[100]',
				array(
						'required'	=>	'Por favor, descripcion',
						'min_length'	=>	'Mínimo, 2 caracteres en descripcion',
						'max_length'	=>	'Máximo, 250 caracteres en descripcion'
					)
			);

		if ($this->form_validation->run() == TRUE) {
			$this->Usuario->actualizar($this->session->userdata(soyId()),$data);
			$this->session->set_flashdata('okUsuario', 'Infomación actualizada exitosa, :D');
			redirect('Soy_security/soy_perfil','refresh');
		} else {
			$this->session->set_flashdata('noUsuario', validation_errors());
			redirect('Soy_security/soy_perfil','refresh');
		}
	}

	public function actualizarPassword()
	{
		$data = array(
						'password' =>	$this->input->post('passworda'),
						'nuevoPassword' =>	$this->input->post('nuevoPassword'),
						'repitaNuevoPassword' =>	$this->input->post('repitaNuevoPassword')
			);

		$this->form_validation->set_data($data);

		// validar password
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|callback_verificarClave',
											array(
													'required'=>'Ingrese contraseña de usuario..',
													'min_length'=>	'Ingrese minímo 6 caracteres',
													'verificarClave'=>	'Contraseña actual incorrecta'
												)
										);
		// valiodar nuevo password
		$this->form_validation->set_rules('nuevoPassword', 'Repita Password', 'trim|required|min_length[6]',
											array(
													'required'=>	'Ingrese nuevo contraseña..',
													'min_length'=>	'Ingrese minímo 6 carácteres..'
												)
										);
		// validar confirma password
		$this->form_validation->set_rules('repitaNuevoPassword', 'Repita password', 'trim|required|matches[nuevoPassword]',
												array(
														'required'=>	'Repita contraseña..',
														'matches'=>		'Contraseña no coinciden'
													)
											);
		if ($this->form_validation->run() == TRUE) {
			$dataPassword = array(
									'password_usuario' => $this->encrypt->encode($this->input->post('nuevoPassword'))
								);
			$this->Usuario->actualizar($this->session->userdata(soyId()),$dataPassword);
			$this->session->set_flashdata('okUsuario', 'Contraseña actualizado exitoso');
			redirect('Soy_security/soy_perfil','refresh');

		} else {
			$this->session->set_flashdata('noUsuario', validation_errors());
			redirect('Soy_security/soy_perfil','refresh');
		}
	}

	public function verificarClave($str)
	{
		if ($this->encrypt->decode($this->Usuario->obtenerPorId($this->session->userdata(soyId()))->password_usuario)==$str) {
			return true;
		}else{
			return false;
		}
	}

	public function verificarPasswordActual()
	{
		if ($this->encrypt->decode($this->Usuario->obtenerPorId($this->session->userdata(soyId()))->password_usuario)==$this->input->post('password')) {
			echo json_encode(true);
		}else{
			echo json_encode(false);
		}	
	}

	public function actualizarFoto()
	{
		$nombreArchivo=$this->Archivo->subirArchivo('./assets/images/foto/','sin archivo','archivo');
		$datosUsuario=$this->Usuario->obtenerPorId($this->session->userdata(soyId()));
		$array=array();
		if ($nombreArchivo) {
			$data['foto_usuario']=$nombreArchivo;	
			if (($datosUsuario->foto_usuario)) {
				unlink('./assets/images/foto/'.$datosUsuario->foto_usuario);
			}
			$array[soyPhoto()] = $nombreArchivo;

			$this->session->set_userdata($array);
			$this->Usuario->actualizar($this->session->userdata(soyId()),$data);
			$this->session->set_flashdata('okUsuario', 'Foto perfil actualizado exitoso.!');
			redirect('Soy_security/soy_perfil','refresh');

		}else{
			$this->session->set_flashdata('noFoto', 'Foto perfil no actualizado intente otra vez.');
			redirect('Soy_security/soy_perfil','refresh');
		}

	}


	public function error()
	{
		$cabeza = array(
			'titulo' 	=> 'Página no encontrado'
		);
		$this->load->view('header',$cabeza);
		$this->load->view('security/error_500');
		$this->load->view('foot');
	}


	public function perfilUsuario($idU)
	{
		if (decode_url($idU)) {
			$resU=$this->Usuario->obtenerPorId(decode_url($idU));
			if ($resU) {
				$cabeza = array(
					'titulo' 	=> 'Perfil de usuario'
				);
				$this->load->view('header',$cabeza);
				$data = array('datos' => $this->Usuario->obtenerPorId($resU->id_usuario));
				$this->load->view('security/perfilUser',$data);
				$this->load->view('foot');
			}else{
				$this->session->set_flashdata('msjError', 'Opps, algo salio mal. Usuario no encontrado');
		 		redirect('Soy_security/error','refresh');
			}
		}else{
			$this->session->set_flashdata('msjError', 'Opps, algo salio mal intente otravez');
		 	redirect('Soy_security/error','refresh');
		}
	}
}

/* End of file Soy_security.php */
/* Location: ./application/controllers/Soy_security.php */