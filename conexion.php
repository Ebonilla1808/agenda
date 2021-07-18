<?php 
	class Conexion
	{
		private $host ='localhost';
		private $usuario = 'root';
		private $pass = '';
		private $bd = 'agenda';
		public $sentencia;
		private $rows = array();
		private $conexion;
		

		private function abrir_conexion(){
			$this -> conexion = new mysqli($this -> host, $this -> usuario,$this -> pass, $this -> bd);
		}

		private function cerrar_conexion(){
			$this -> conexion -> close();
		}

		public function ejecutar_sentencia(){
			$this -> abrir_conexion();
				$bandera = $this -> conexion -> query($this -> sentencia);
			$this -> cerrar_conexion();
			return $bandera;
		}

		public function obtener_Sentencia(){
			$this -> abrir_conexion();
			$result = $this -> conexion ->query($this->sentencia);
			return $result;
		}
	}

 ?>