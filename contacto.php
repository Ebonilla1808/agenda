<?php 
	include('conexion.php');

	/**
	 * 
	 */
	class Contacto extends Conexion
	{
		public function alta($nombre, $apelido, $edad, $correo, $telefono){
			$this -> sentencia = "INSERT INTO contactos VALUES ('','$nombre','$apelido',$edad,'$correo','$telefono')";
			$bandera = $this -> ejecutar_sentencia();
		}

		public function consultar(){
			$this -> sentencia = "SELECT * FROM contactos";
			$resultado = $this -> obtener_sentencia();
			return $resultado;
		}

		public function baja($id){
			$this-> sentencia="DELETE FROM contactos WHERE id=$id";
			$bandera = $this -> ejecutar_sentencia();
		}

		public function cargar($id){
			$this -> sentencia = "SELECT * FROM contactos WHERE id =".$id;
			$resultado = $this -> obtener_sentencia();
			return $resultado;
		}


		public function modificar($nombre, $apelido, $edad, $correo, $telefono, $id){
			$this -> sentencia = "UPDATE contactos SET nombre='$nombre', apellidos='$apelido', edad='$edad', correo='$correo', telefono='$telefono' WHERE id='$id'";
			$bandera = $this -> ejecutar_sentencia();
		}
	}
 ?>