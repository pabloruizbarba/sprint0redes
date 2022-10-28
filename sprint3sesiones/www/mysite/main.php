<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
	<head>
		<style>
			table,tr,td{
				border: 1px solid navy;
			}
			th{
				background-color: lime;
			}
			
			img:hover {
					transition: 1s all ease-in-out;
					transform: scale(1.1);
				}
			#yellow:hover{
				background-color:yellow;
				font-size:30px;
				}
		</style>
	</head>
	<body>
		<h1>Conexión establecida</h1>
		<a href="/logout.php">Logout</a><br>
		<a href="/cambiar.html">Cambiar contraseña</a>
		<?php
			// Lanzar una query
			$query = 'SELECT * FROM tPeliculas';
			$result = mysqli_query($db, $query) or die('Query error');
			echo '<table>';
			echo '<tr><th>id</th><th>Nombre</th><th>Imagen</th><th>Director</th><th>Año</th></tr>';
			// Recorrer el resultado
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr><td>';
				echo $row['id'];
				echo '</td>'; 
				echo '<td id="yellow">';
				echo $row['nombre'];
				echo '</td>';
				echo '<td><a href="/detail.php?pelicula_id='.$row[0];
				echo '">';
				echo '<img width="200px" height="300px" src="';
				echo $row['url_imagen'];
				echo '"></a></td>';
				echo '<td>';
				echo $row['director'];
				echo '</td>';
				echo '<td>';
				echo $row['anyo'];
				echo '</td></tr>';
			}
			echo '</table>';
			mysqli_close($db);
		?>
	</body>
</html>
