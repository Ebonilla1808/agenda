<h1>Modificar contacto</h1>
<form action="" method="post">
	<select name="idModificar">
		<?php 
			require_once('contacto.php');
			$obj = new Contacto();
			$resultado = $obj -> consultar();
			while ($registro = $resultado -> fetch_assoc()) {
				echo "<option value='".$registro['id']."'>".$registro['nombre']." ".$registro['apellidos']." ". $registro['correo']."</option>}
				option";
			}
		 ?>
	</select> <br><br>
	<input type="submit" value="Cargar contacto" name="cargarC">
</form>

<?php 
	if (isset($_POST['cargarC'])) {
		$obj = new Contacto();
		$resultado = $obj -> cargar($_POST['idModificar']);
		if ($registro = $resultado -> fetch_assoc() ) {
			?>
			<fieldset>
			<form action="" method="post">
				Nombre: <input type="text" name="tnom" value="<?php  echo $registro['nombre']; ?>"><br>
				Apellidos: <input type="text" name="tape" value="<?php  echo $registro['apellidos']; ?>"><br>
				Edad: <input type="text" name="teda" value="<?php  echo $registro['edad']; ?>"><br>
				Correo: <input type="text" name="tcor" value="<?php  echo $registro['correo']; ?>"><br>
				Telefono: <input type="text" name="ttel" value="<?php  echo $registro['telefono']; ?>"><br>
				<input type="hidden" name="txid" value="<?php  echo $registro['id']; ?>">
				<input type="submit" value="Modificar contacto" name="modificar">
			</form>
			</fieldset>
			<?php 
		}
	}
	
	if (isset($_POST['modificar'])) {
		$nombre = $_POST['tnom'];
		$apellido = $_POST['tape'];
		$edad = $_POST['teda'];
		$correo = $_POST['tcor'];
		$telefono = $_POST['ttel'];
		$id = $_POST['txid'];

		require_once('contacto.php');
		$obj = new Contacto();
		$obj -> modificar($nombre, $apellido, $edad, $correo, $telefono, $id);
		echo "<H1> Contacto modificado </H1>";
	}
	



 ?>