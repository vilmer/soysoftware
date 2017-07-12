<?php defined('BASEPATH') OR exit('No direct script access allowed');



// session

function soyLogin()
{
	return 'soyLogin';
}
function soyId()
{
	return 'soyId';
}



function soyPhoto()
{
	return 'soyPhoto';
}
function soyMiperfil()
{
	return 'soyMiperfil';	
}


// perfiles
function soyPA(){
	return 'Admin';
}

function soyPU()
{
	return 'Usuario';
}

// proceso para verificar perfiles
function miPerfil_Cz($item){
	 $CI = & get_instance();
	$data=$CI->session->userdata(perfiles_Cz());
	foreach ($data as $value) {
		if ($value==$item) {
			return true;
		}
	}
	return false;
}

