<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soy_soysoftware extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata(soyLogin())) {
			redirect('Soy_Login/soy_iniciar','refresh');
		}
	}
	public function index()
	{
		$cabeza = array(
			'titulo' 	=> 'Administración'
		);
		$this->load->view('header',$cabeza);
		$this->load->view('admin/index');
		$this->load->view('foot');
	}

}

/* End of file Soy_soysoftware.php */
/* Location: ./application/controllers/Soy_soysoftware.php */