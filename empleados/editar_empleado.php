<?php/*
	session_start();
if(isset($_SESSION['user'])):*/?>
<?php
	include('../../BHermanosM-main/header.php');
	
	function ConsultarDatos($id)
	{
		require ("../../BHermanosM-main/conexion.php");
		$conn = new mysqli($servidor, $usuario, $pwd, $bd);
		
		$qry = "SELECT * FROM usuarios WHERE idUsuarios = '$id'";
		$resultado=mysqli_query($conn, $qry) or die(mysql_error());
		$filas = mysqli_fetch_assoc($resultado);
		return[
			$filas['idUsuarios'],
			$filas['nombre'],
			$filas['correo'],
			$filas['celular'],
			$filas['contrasena'],
		];
	}
	
	$consulta = ConsultarDatos($_GET['clave']);
	
	
	if(isset($_GET['result'])){
		$resultado = $_GET['result'];
		if($resultado=="s"){
			echo"<script> alert('La clave que ingreso ya existe, ingrese otra por favor'); </script>";
		}
	}
?>

<br>
<link rel="icon" href="../../BHermanosM-main/IMGS/clientes.ico">
<title>Editar Empleado </title>

  <form class="col-md-5 border border-dark rounded mx-auto" style="padding: 1%;" method="post" action = "guardar_cambios_empleado.php?original=<?php echo"$consulta[0]"; ?>">
		<h2>Editar información del Empleado <strong><?php echo "$consulta[1]"; ?></strong></h2>

		<div class="form-group col-md-6">
		  <label for="inputNombre">Nombre</label>
		  <input type="text" class="form-control" name="Nombre" required value="<?php echo"$consulta[1]"; ?>">
		</div>
		
		<div class="form-group col-md-6">
		  <label for="inputTelefono">Telefono</label>
		  <input type="number" class="form-control" name="Telefono"  min="10 " value="<?php echo"$consulta[3]"; ?>" required>
		</div>
		
		<div class="form-group col-md-6">
		  <label for="inputCorreo">Correo Electronico</label>
		  <input type="email" class="form-control" name="Correo" value="<?php echo"$consulta[2]"; ?>" required>
		</div>

		<div class="form-group col-md-10">
		  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
		  <a href="../../BHermanosM-main/empleados/empleados.php" class="btn btn-primary">Cancelar</a> 
		</div>
	
	</form>
	</form>


<?php
	include("../../BHermanosM-main/footer.php");
?>
<?//php else: include_once'login.php'; endif?>