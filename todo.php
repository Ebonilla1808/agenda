
<?php 
	require_once("contacto.php");
	$obj = new Contacto();
	if(isset($_POST['eliminar'])){
		$obj -> baja($_POST['id']);
		echo "CONTACTO ELIMINADO";
	}

	if (isset($_POST['cargarC'])) {
		
		$resultado = $obj -> cargar($_POST['id']);
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
	else{
	 ?>
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

	$resultado = $obj -> consultar();
	echo "<table  id =  'tablaContacto'>
		<caption>Contactos registrados en la agenda</caption>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Edad</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Eliminar</th>
				<th>Modificar</th>
			</tr>
		</thead>
		<tbody>";
	while ($registro = $resultado -> fetch_assoc() ) {
		echo "<tr>
				<td>".$registro['nombre']."</td>
				<td>".$registro['apellidos']."</td>
				<td>".$registro['edad']."</td>
				<td>".$registro['correo']."</td>
				<td>".$registro['telefono']."</td>
				<td>
					<form action='' method='post'>
						<input type='hidden' name='id' value='".$registro['id']."'>
						<input type='submit' name='eliminar' value='Eliminar'>
					</form>
				</td>
				<td>
					<form action='' method='post'>
						<input type='hidden' name='id' value='".$registro['id']."'>
						<input type='submit' name='cargarC' value='modificar'>
					</form>
				</td>
			</tr>";
	}
	echo "</tbody>
	</table>";	
		
 ?>