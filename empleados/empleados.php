<?php
/*
session_start();
if(isset($_SESSION['user'])):*/?>
<?php
	include('../../BHermanosM-main/header.php');
	//Confirmar si el empleado ha sido registrado
	if(isset($_GET['registrado'])){
		$resultado = $_GET['registrado'];
		if($resultado=="s"){
			echo"<script> alert('EL EMPLEADO HA SIDO REGISTRADO'); </script>";
		}else
		{
			echo "<script> alert('NO SE PUDO REGISTRAR AL EMPLEADO - ERROR');</script>";
		}
	}
	//Confirmar si la informacion del empleado ha sido cambiada
	if(isset($_GET['cambiado'])){
		$resultado = $_GET['cambiado'];
		if($resultado=="s"){
			echo"<script> alert('LA INFORMACIÓN DEL EMPLEADO HA SIDO MODIFICADA'); </script>";
		}else
		{
			echo "<script> alert('NO SE PUDO MODIFICAR LA INFORMACION DEL EMPLEADO - ERROR');</script>";
		}
	}
	/*Mostrar el numero del empleado registrado
	if(isset($_GET['success'])){

		echo"<script> alert('LA INFORMACIÓN DEL EMPLEADO HA SIDO MODIFICADA'); </script>";
	}*/

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../index.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 		 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
	<body>
		<form style="background-color: #ff621b; opacity: 0.90;">
			<div style="border: 1px solid #292b2c;" >
				<h4 class="mx-auto">EMPLEADOS</h4>
			</div>
        </form>

	
	<br>
	<div class="row col-12">
		<div class="col-10"></div>
		<div class="col-2" id='botton'>
			<a href="../../BHermanosM-main/includes/signup.inc.php" class="btn btn-primary">Registrar Empleado</a> 
		</div>
	</div>
	<div class="m-5">
	<table class="table table-striped table-bordered table-sm ">
		<tr>
			<th>Opciones</th>
			<th>Numero de Empleado</th>
			<th>Nombre del Empleado</th>
			<th>Celular</th>
			<th>Correo Electronico</th>
			<th>Administrador</th>
		</tr>
		<?php
			require ("../../BHermanosM-main/conexion.php");
			
			//Crear la conexion al servidor de base de datos
			$conn = new mysqli($servidor, $usuario, $pwd, $bd);
			
			//Verificar la conexion al servidor de base de datos
			if($conn->connect_error){
				die("Error al momento de conectar al servidor: " . $conn->connect_error);
			}
			
			//Obtener los registros  de la base de datos
			$sql = "SELECT * from usuarios";
			$result = $conn->query($sql);

			
			if($result->num_rows > 0){
				while($row = $result->fetch_object()){
					echo "<tr>";
						echo "<td><a href='editar_empleado.php?clave=".$row->idUsuarios."'><img src='../../BHermanosM-main/IMGS/editar.png'>Editar</a>
						<a href='eliminar_empleado.php?clave=".$row->idUsuarios."'><img src='../../BHermanosM-main/IMGS/eliminar.png'>Eliminar</a></td>";
						echo "<td>" . $row->idUsuarios . "</td>";
						echo "<td>" . $row->nombre . "</td>";
						echo "<td>" . $row->celular . "</td>";
						echo "<td>" . $row->correo . "</td>";
							$sql = "SELECT correo from administradores WHERE correo = '$row->correo'";
							$admi = $conn->query($sql);
							if($admi->num_rows > 0){
								echo "<td>"."Si"."</td>";
							} else {
								echo "<td>"."No"."</td>";
							} 

					echo "</tr>";
				}
				$result->free();
			}
			$conn->close();
		?>
	</table>

	

	</div>
	</body>
    </html>
	<?php 
include("../../BHermanosM-main/footer.php");
 ?>
<?//php else: include_once'login.php'; endif?>