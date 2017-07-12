<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {

	public function obtenerPorEmail($email)
	{
		$this->db->where('email_usuario', $email);
		$resU=$this->db->get('usuario');	
		if ($resU->num_rows()>0) {
			return $resU->row();
		}else{
			return false;
		}
	}	

	public function actualizar($id,$data)
	{
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
		return $this->db->affected_rows();
	}

	public function obtenerPorId($id)
	{
		$this->db->where('id_usuario', $id);
		$resU=$this->db->get('usuario');	
		if ($resU->num_rows()>0) {
			return $resU->row();
		}else{
			return false;
		}
	}

	public function guardar($data)
	{
		$this->db->insert('usuario', $data);
		return $this->db->affected_rows();
	}

	public function lista($idUsCone)
	{
		$this->db->where('id_usuario !=', $idUsCone);
		$this->db->order_by('fecha_usuario', 'desc');
		$sql=$this->db->get('usuario');
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}

}

/* End of file Usuario.php */
/* Location: ./application/models/Usuario.php */