<?php 


	// Crea la tabla si no esta creada
	$sql = "CREATE TABLE IF NOT EXISTS  contacto (id INT NOT NULL AUTO_INCREMENT, 
	name VARCHAR(100),
	tel INT NOT NULL,	
	mail VARCHAR(100),
	PRIMARY KEY (id))";

	// Conecta a BD

	$db = mysqli_connect('localhost', 'root', '123456789', 'clasephp');
	$crear = mysqli_query($db,$sql) or die ("error al crear BD $sql");

?>