<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Model {

	public function perfilAdmin()
	{
		$this->db->where('nombre_perfil', soyPA());
		$resP=$this->db->get('perfil');
		if ($resP->num_rows()>0) {
			return $resP->row();
		}else{
			return false;
		}
	}


	public function obtenerPorNombre($nombre)
	{
		$this->db->where('nombre_perfil', $nombre);
		$resP=$this->db->get('perfil');
		if ($resP->num_rows()>0) {
			return $resP->row();
		}else{
			return false;
		}
	}

	public function obtenerPorId($idPerfil)
	{
		$this->db->where('id_perfil', $idPerfil);
		$resP=$this->db->get('perfil');
		if ($resP->num_rows()>0) {
			return $resP->row();
		}else{
			return false;
		}
	}

	public function guardarRetornarId($data)
	{
		$this->db->insert('perfil', $data);
		$this->db->affected_rows();
		return $this->db->insert_id();
	}
}

/* End of file Perfil.php */
/* Location: ./application/models/Perfil.php */