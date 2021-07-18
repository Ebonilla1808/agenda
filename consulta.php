
<h1>Consulta de contactos</h1>
<?php 
	require_once("contacto.php");
	$obj = new Contacto();
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
			</tr>";
	}
	echo "</tbody>
	</table>";	
		
 ?>