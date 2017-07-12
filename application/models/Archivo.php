<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Model {

	public function subirArchivo($path = '', $mensaje = '',$nombreArchivo='')
    {
             
	    $config['upload_path'] = $path;
	    $config['allowed_types'] = 'jpg|png';
	    $config['file_name']=md5(rand() * time());
	    
	    $this->load->library('upload', $config);
	    
	    if ( ! $this->upload->do_upload($nombreArchivo)){
	        $error = $this->upload->display_errors();
	            
	        if($mensaje == ''){ ?>
	            <script type="text/javascript" charset="utf-8">
	            	
	            	alertify.error("Error al subir la imagen");
	            </script> 
	        <?php }else{?>

			    <script type="text/javascript" charset="utf-8">
			    	alertify.warning("<?php echo $mensaje ?>");
			    </script> <?php
    		}
        	return null;
		}else{
	        $file_data = $this->upload->data();
	        return $file_data['file_name'];
		}
	}	

}

/* End of file Archivo.php */
/* Location: ./application/models/Archivo.php */