<fieldset>
	<legend>INSERTAR CONTACTO</legend>
	<form action="" method="post">
	Nombre: <input type="text" name="nom"><br>
	Apellidos: <input type="text" name="ape"><br>
	Edad: <input type="text" name="eda"><br>
	Correo: <input type="text" name="cor"><br>
	Telefono: <input type="text" name="tel"><br>
	<input type="submit" value="Guardar contacto" name="guardar">
</form>

</fieldset>

<?php 
	if (isset($_POST['guardar'])) {
		$nombre = $_POST['nom'];
		$apellido = $_POST['ape'];
		$edad = $_POST['eda'];
		$correo = $_POST['cor'];
		$telefono = $_POST['tel'];

		require_once('contacto.php');
		$obj = new Contacto();
		$obj -> alta($nombre, $apellido, $edad, $correo, $telefono);
		echo "<H1> Contacto insrertado </H1>";

	}
 ?>