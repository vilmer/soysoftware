<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Model {

	

	public function obtenerPorIdBlog($idB)
	{
		$sql="select * from comentario, usuario WHERE comentario.noticia_id_noticia=? and usuario.id_usuario=comentario.usuario_id_usuario ORDER BY comentario.fecha_comentario ASC";
		$data = array('comentario.noticia_id_noticia' => $idB );
		$res=$this->db->query($sql,$data);
		
		if ($res->num_rows()>0) {
			return $res;
		}else{
			return false;
		}
	}


	public function guardar($data)
	{
		$this->db->insert('comentario', $data);
		return $this->db->affected_rows();
	}

	public function obtnerPorId($idC)
	{
		$this->db->where('id_comentario', $idC);
		$res=$this->db->get('comentario');
		if ($res->num_rows()>0) {
			return $res->row();
		}else{
			return false;
		}
	}

	public function actualizar($idC,$data)
	{
		$this->db->where('id_comentario', $idC);
		$this->db->update('comentario', $data);
		return $this->db->affected_rows();
	}

	public function eliminar($idC)
	{
        $this->db->db_debug = FALSE;
        try {
            $this->db->where('id_comentario', $idC);
            $query = $this->db->delete("comentario");
            if ($query) {
            	return $this->db->affected_rows();    
            }else{
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
	}
}

/* End of file Comentario.php */
/* Location: ./application/models/Comentario.php */