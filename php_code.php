
<?php 
include("DataBase/cnxsql.php");
$id="";
$nombre = "";
$tel = "";
$mail= "";
$update = false;


//Ingresar contacto
if (isset($_POST["save"])) {
  $id=$_POST["id"];
  $tel = $_POST["tel"];
  $nombre = $_POST["nombre"];
  $mail = $_POST["mail"];

  $solicitud= "INSERT INTO contacto (tel, name, mail) VALUES ('$tel', '$nombre', '$mail')";

  if (!mysqli_query($db,$solicitud)) {
      echo("Error description: " . mysqli_error($db));
    }

  $_SESSION["msg"]= "Contacto agregado";   
  header('location: index.php');
}

//Actualizar contacto
if(isset($_POST["update"])){   
  $id=$_POST["id"];
  $tel = $_POST["tel"];
  $nombre = $_POST["nombre"];
  $mail = $_POST["mail"];

  $solicitud= "UPDATE contacto SET name='$nombre', tel = '$tel', mail='$mail' WHERE id=$id";

  if (!mysqli_query($db,$solicitud)) {
    echo("Error description: " . mysqli_error($db));
  }
  else{
    
    header('location: index.php');
  }
}

//Borrar contacto
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  
  if(!mysqli_query($db, "DELETE FROM contacto WHERE id=$id")){
    echo("Error description: " . mysqli_error($db));
  }
  else{
	  header('location: index.php');
  }
	
}
?>