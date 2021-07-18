<h1>Eliminar contacto</h1>
<form action="" method="post">
	<select name="idEliminar">
		<?php 
			require_once('contacto.php');
			$obj = new Contacto();
			if(isset($_POST['eliminar'])){
				$obj -> baja($_POST['idEliminar']);
			}
			$resultado = $obj -> consultar();
			while ($registro = $resultado -> fetch_assoc()) {
				echo "<option value='".$registro['id']."'>".$registro['nombre']." ".$registro['apellidos']." ". $registro['correo']."</option>}
				option";
			}
		 ?>
	</select> <br><br>
	<input type="submit" value="Eliminar contacto" name="eliminar">
</form>

<?php 
	if(isset($_POST['eliminar'])){
		echo "CONTACTO ELIMINADO";
	}
 ?>