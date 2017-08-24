<?php


function validar_campo($campo){
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


header('Content-type:application/json');

if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
	isset($_POST["correo"]) && !empty($_POST["correo"]) &&
	isset($_POST["mensaje"]) && !empty($_POST["mensaje"])) {
	
	
	$destinoMail = "klvst3r@gmail.com";

	$nombre = validar_campo($_POST["nombre"]);
	
	if (isset($_POST["telefono"])) {
		$telefono = validar_campo($_POST["telefono"]);
	}

	$correo = validar_campo($_POST["correo"]);
	$mensaje = validar_campo($_POST["mensaje"]);

	$contenido = "Nombre: ".$nombre."\n Teléfono: ".$telefono;
	$contenido .= "\n Correo: " . $correo;
	$contenido .= "\n Mensaje: " . $mensaje;

	mail($destinoMail,"Mensaje de contacto del cliente".$nombre, $contenido);

	//Lo cambiamos por un estado en lugar de un mensaje
	//return print("Ok");
	return print(json_encode('ok'));
}

	return print(json_encode('no'));
	//return print("No se puede enviar");