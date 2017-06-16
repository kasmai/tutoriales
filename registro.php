<?php
include 'conDB.php';

   $db_connection = conecta();

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$full_name = utf8_decode($_POST['full_name']);
$email = utf8_decode($_POST['email']);
$username = utf8_decode($_POST['username']);
$password = utf8_decode($_POST['password']);

	$query = "SELECT username FROM UserSite WHERE username = ".$username.";";
	try 
	{
		$stmt = $db_connection->prepare($query);
	       $stmt->bindParam(1, $username);
	       $stmt->execute();

	       		$result = $stmt->fetchAll();

	       		
	       		if($result == null)
	       		{
					
					
					$query = "INSERT INTO UserSite (full_name,email,username,password) VALUES (?,?,?,?);";
					 try{
					       $stmt = $db_connection->prepare($query);
					       $stmt->bindParam(1,$full_name);
					       $stmt->bindParam(2,$email);
					       $stmt->bindParam(3,$username);
					       $stmt->bindParam(4,$password);
					       $stmt->execute();
					       echo "<br>Registro insertado";

					      }
					   catch (PDOException $ex) {
					       echo $ex->getMessage();
					   	}

					 header('Location: after-log.html');	
	       		}
	       		if($result != null)
	       		{
	       			$message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
					echo $message;
	       		}	       		
	       		 $con = null; 
	} 
	catch (PDOException $ex) 
	{	
		echo $ex->getMessage();
	}
mysql_close($db_connection);

		
?>