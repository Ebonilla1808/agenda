<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AGENDA</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
	<header>
		<h1><a href="index.php">Agenda</h1></a>
	</header>
	<nav>
		<ul>
			<a href="?opc=alta"><li>Alta</li></a>
			<a href="?opc=baja"><li>Baja</li></a>
			<a href="?opc=consulta"><li>Consulta</li></a>
			<a href="?opc=modificacion"><li>Modificar</li></a>
			<a href="?opc=todo"><li>Todo</li></a>
		</ul>
	</nav>
	<section>
		<?php 
			if(isset($_GET["opc"])){
				switch ($_GET['opc']) {
					case 'alta':
						include('alta.php');
						break;
					case 'baja':
						include('baja.php');
						break;
					case 'consulta':
						include('consulta.php');
						break;
					case 'modificacion':
						include('modificacion.php');
						break;
					case 'todo':
						include('todo.php');
						break;
				}
			}

		 ?>
	</section>
</body>
</html>