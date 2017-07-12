<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro exitoso</title>
	<style>
		.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table-rounded {
    border: none;
}
.zui-table-rounded thead th {
    background-color: #CFAD70;
    border: none;
    text-shadow: 1px 1px 1px #ccc;
    color: #333;
}
.zui-table-rounded thead th:first-child {
    border-radius: 10px 0 0 0;
}
.zui-table-rounded thead th:last-child {
    border-radius: 0 10px 0 0;
}
.zui-table-rounded tbody td {
    border: none;
    border-top: solid 1px #957030;
    background-color: #EED592;
}
.zui-table-rounded tbody tr:last-child td:first-child {
    border-radius: 0 0 0 10px;
}
.zui-table-rounded tbody tr:last-child td:last-child {
    border-radius: 0 0 10px 0;
}
	</style>
</head>
<body>


<?php if ($email_usuario && $password_usuario){ ?>
		
	
		<table class="zui-table zui-table-rounded" width="100%">
		 <thead><tr><th>Nueva contraseña</th></tr>
	        <tr>
	            
	            <th colspan="3"><h2>Opps,,, <br>A todos nos pasa esto. Has solicitado recuperar contraseña nueva..</h2></th>
	        </tr>
	    </thead>
	<tbody>
	<tr>
		<td rowspan="5">
			<img src="https://png.icons8.com/ios/1600/007AFF/the-dragon-team-filled" alt="soysoftware" width="150px;" height="190px;" />
		</td>
		
	</tr>
	<tr>
		<td>
			<strong>Usuario</strong></td>
		<td>
			<?php echo $email_usuario ?>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Contraseña nueva</strong>
		</td>
		<td>
			<?php  echo $this->encrypt->decode($password_usuario) ?>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Mensaje</strong>
		</td>
		<td>
			<p>El mundo esta hecho para ser conquistado y es hacia allá a donde caminamos..<br>
			Att: David Criollo <br>
				<small>CEO SOYSOFTWARE</small>
			</p>
		</td>
	</tr>
	<tr>
		<td><strong>Nota</strong></td>
		<td>
			<p>
				<em>Solo t&uacute; tienes acceso a est&aacute; informaci&oacute;n, si es un error por favor le pedimos que ignore est&eacute; mensaje.</em>
			</p>
		</td>
	</tr>
	</tbody>
</table>


	<?php }else{ ?>
		<p>Lo sentimos no se pudo enviar datos..</p>
		<p>Por favor, dejenos un email a <b>info@soysoftware.com</b> y uno de nuestros equipos le atenderán enseguida.</p>
	<?php } ?>
	
	
</body>
</html>

