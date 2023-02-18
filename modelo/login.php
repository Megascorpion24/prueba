<?php  
  
require_once('modelo/conexion.php');

class inicio_sesion extends conexion{
  
	private $cedula_inicio;
	private $clave_inicio;
	private $fila_cedula;
	private $rol;
 
	public function set_cedula_inicio($valor){
		$this->cedula_inicio = $valor;
	}

	public function set_clave_inicio($valor){
		$this->clave_inicio = $valor;
	}

	public function set_rol($valor){
		$this->rol = $valor;
	}

	public function get_cedula_inicio(){
		return $this->cedula_inicio;
	}
	
	public function get_clave_inicio(){
		return $this->clave_inicio;
	}

	public function get_rol(){
		return $this->rol;
	}


	//metodos  

	public function busca_cedula(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			 
			$resultado = $co->prepare("SELECT usuarios.cedula from usuarios where cedula = :cedula_inicio");
			 
			$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
			
			$resultado->execute();
			 
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
				$this->fila_cedula=$fila[0][0];
				return $fila[0][0];
			}
			else{
				
				return "";
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function busca_clave(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			 
			$resultado = $co->prepare("SELECT  usuarios.clave from usuarios where cedula = :cedula_inicio");
			
			$resultado->bindParam(':cedula_inicio',$this->cedula_inicio);
			
			$resultado->execute();
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
				return $fila[0][0];
			}
			else{
				
				return "Error en datos ingresados";
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function busca_id_rol(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			 
			$resultado = $co->prepare("SELECT usuarios.id_rol from usuarios where usuarios.cedula = :cedula_inicio");
			
			$resultado->bindParam(':cedula_inicio',$this->fila_cedula);
			
			$resultado->execute();
			 
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			if($fila){
				
				return $fila[0][0];
			
			}
			else{
				return "";
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
	}

	
}

?>