<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Model {

	public function guardar($data)
	{
		$this->db->insert('contacto', $data);
		return $this->db->affected_rows();
	}	


	public function lista()
	{
		$this->db->order_by('fecha_contacto', 'desc');
		$sql=$this->db->get('contacto');
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}


	public function obtenerPorId($idC)
	{
		$this->db->where('idcontacto', $idC);
		$sql=$this->db->get('contacto');
		if ($sql->num_rows()>0) {
			return $sql->row();
		}else{
			return false;
		}
	}


	public function actualizar($idC,$data)
	{
		$this->db->where('idcontacto', $idC);
		$this->db->update('contacto', $data);	
		return $this->db->affected_rows();
	}
}

/* End of file Contacto.php */
/* Location: ./application/models/Contacto.php */