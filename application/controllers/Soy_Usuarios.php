<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_Usuarios extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}
		$this->load->model('Usuario');
	}
	public function index()
	{
		if ($this->session->userdata(soyMiperfil())==soyPA()){
			$cabeza = array(
					'titulo' 	=> 'Lista de usuarios'
				);
			$data = array('usuarios' => $this->Usuario->lista($this->session->userdata(soyId())));
			$this->load->view('header',$cabeza);
			$this->load->view('usuarios/index',$data);
			$this->load->view('foot');
		}else{
			$this->session->set_flashdata('msjError', 'Opps, algo salio mal..No tienes permisos para está acción');
		 	redirect('Soy_security/error','refresh');
		}
	}

	public function cambiarEstado($idU)
	{
		if ($this->session->userdata(soyMiperfil())==soyPA()){
			if (decode_url($idU)) {
				$resU=$this->Usuario->obtenerPorId(decode_url($idU));
				if ($resU) {
					if ($resU->estado_usuario) {
						$estado=false;
					}else{
						$estado=true;
					}
					$data = array('estado_usuario' => $estado );
					$this->Usuario->actualizar(decode_url($idU),$data);
					$this->session->set_flashdata('okUsuario', 'Usuario cambiado estado exitoso.');
					redirect('Soy_Usuarios/index','refresh');
				}else{
					$this->session->set_flashdata('msjError', 'Opps, algo salio mal..Usuario no encontrado en el sistema');
		 			redirect('Soy_security/error','refresh');	
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

/* End of file Soy_Usuarios.php */
/* Location: ./application/controllers/Soy_Usuarios.php */