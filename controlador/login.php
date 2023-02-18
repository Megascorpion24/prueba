<?php 
	
	if (!is_file("modelo/".$pagina.".php")){
		
		echo "Falta definir la clase ".$pagina;
		exit;
	}  

	require_once("modelo/".$pagina.".php");

	if(is_file("vista/".$pagina.".php")){
 
		$objeto = new inicio_sesion(); //variable que toma en memoria todos los metodos de la clase inicio_sesion en Modelo 

		if(isset($_POST['accion_inicio_sesion'])){
			
			$objeto->set_cedula_inicio($_POST['cedula_inicio']);

			$cedula = $objeto->busca_cedula();
			$contraseña_encontrada = $objeto->busca_contrasena();

			$verifica=password_verify($_POST['contrasena_inicio'],$contraseña_encontrada);

			if ($cedula!="Error en datos ingresados" and $verifica==1) {

				$rol = $objeto->busca_id_rol();

				session_start();
				$_SESSION['cedula'] = $cedula;
				$_SESSION['rol'] = $rol;

				$objeto->set_rol($rol);

				$mensaje= "ok";//el ok e para el envio ajax
			} 

			
			
			else{
				$mensaje = "Datos Incorrectos";//mensaje que mostrara si no existe usuario registrado
			}
			
			echo $mensaje;
			  
			exit;
		}
		
		require_once("vista/".$pagina.".php");
	} 
	else{
		echo "PAGINA EN CONSTRUCCION";
	}
?>


?>