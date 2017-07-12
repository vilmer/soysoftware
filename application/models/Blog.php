<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model {

	public function guardar($data)
	{
		$this->db->insert('noticia', $data);		
		$this->db->affected_rows();
		return  $this->db->insert_id();
	}	

	public function lista()
	{	
		$this->db->order_by('fecha_noticia', 'desc');
		$this->db->where('estado_noticia', true);
		$sql=$this->db->get('noticia');
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}

	public function numeroBlog(){
		$sql=$this->db->query("Select count(*) as number from noticia where estado_noticia=true")->row()->number;
		return intval($sql);
	}

	public function numeroBlogAdmin(){
		$sql=$this->db->query("Select count(*) as number from noticia")->row()->number;
		return intval($sql);
	}
	public function paginacion($numeroPag)
	{	
		$this->db->order_by('fecha_noticia', 'desc');
		$this->db->where('estado_noticia', true);
		$sql= $this->db->get('noticia', $numeroPag, $this->uri->segment(3));
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}

	public function paginacionAdmin($numeroPag)
	{	
		$this->db->order_by('fecha_noticia', 'desc');
		$sql= $this->db->get('noticia', $numeroPag, $this->uri->segment(3));
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}

	

	public function obtenerPorId($idn)
	{
		$this->db->where('id_noticia', $idn);
		$sql=$this->db->get('noticia');
		if ($sql->num_rows()>0) {
			return $sql->row();
		}else{
			return false;
		}
	}

	public function atualizar($idB,$data)
	{
		$this->db->where('id_noticia', $idB);
		$this->db->update('noticia', $data);
		return $this->db->affected_rows();
	}

	public function obtenerBlogsPorIdUsuario($idU)
	{
		$this->db->where('usuario_id_usuario', $idU);
		$this->db->where('estado_noticia', true);
		$this->db->order_by('fecha_noticia', 'desc');
		$sql=$this->db->get('noticia');
		if ($sql->num_rows()>0) {
			return $sql;
		}else{
			return false;
		}
	}

	public function actualizar($id,$data)
	{
		$this->db->where('id_noticia', $id);
		$this->db->update('noticia', $data);
		$this->db->affected_rows();
		return  $this->db->insert_id();
	}

	public function eliminar($idB)
	{
		$this->db->db_debug = FALSE;
        try {
            $this->db->where('id_noticia', $idB);
            $query = $this->db->delete("noticia");
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

/* End of file Blog.php */
/* Location: ./application/models/Blog.php */