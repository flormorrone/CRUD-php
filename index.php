<?php
session_start();

include("DataBase/cnxsql.php");
include("php_code.php");
$update=false;

if(isset($_GET["edit"])){
	$update=true;	
	$id=$_GET["edit"];
	$search="SELECT * FROM contacto WHERE id=$id";

	$sol= mysqli_query($db,$search);

	if(is_iterable($sol)==1){
		$dato= mysqli_fetch_array($sol);
		$nombre=$dato["name"];
		$tel=$dato["tel"];
		$mail=$dato["mail"];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contactos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body>
<?php $resultado = mysqli_query($db, "SELECT * FROM contacto");?>
	<header>
		<h1 class="titulo">Contactos</h1>
	</header>
	<main>
		<div class="container">
			<div class="item">
				<table class="table">
					<thead>
						<tr>
						<th scope="col">Nombre</th>					
						<th scope="col">Telefono</th>
						<th scope="col">Mail</th>
						<th scope="col">&nbsp</th>
						</tr>
					</thead>
					<tbody>
					<?php while($data= mysqli_fetch_array($resultado)){?>
						<tr>
						<td><?php echo $data["name"];?></td>    
						<td><?php echo $data["tel"];?></td>
						<td><?php echo $data["mail"];?></td>
						<td id="icons"><a class="material-icons"  href="index.php?edit=<?php echo $data['id']; ?>">edit</a><a class="material-icons" href="php_code.php?del=<?php echo $data['id']; ?>">delete</a></td>
						</tr>   
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="item">
			<form method="post"  action="php_code.php">	
				<div class="form-group" >
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<label for="exampleInputPassword1">Nombre</label> <br>
					<input type="text" name="nombre" class="form-control"  value="<?php echo $nombre; ?>" required>
				</div>
				<div class="form-group">
					<label>Telefono</label> <br>
					<input type="text" name="tel" class="form-control" value="<?php echo $tel; ?>" required>
				</div>				
				<div class="form-group">
					<label >Mail</label> <br>
					<input type="email" name="mail" class="form-control" value="<?php echo $mail; ?>" required>			
				</div>
				<?php if($update==true){  ?>	
					<button type="submit" name="update" class="btn">Actualizar</button>
				<?php }else { ?>			
				<button type="submit" name="save" class="btn" >Agregar</button>
				<?php } ?>
				</form>
			</div>
		</div>
	</main>
</body>
</html>