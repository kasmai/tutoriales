<?php
	include 'conDB.php';
	$v1 = 15;
	$v2= 'aru';
	$v3= 'akise';
	$v4 = 'e';


	

	function newuser($nam,$lnam,$tipo)
	{
	 	$con = conecta();
	    $res = false;
	   	$query = 'INSERT INTO usuarios (nam,lnam,tipo) VALUES (?,?,?);';
	   try{
	       $stmt = $con->prepare($query);
	       $stmt->bindParam(1,$nam,PDO::PARAM_STR,100);
	       $stmt->bindParam(2,$lnam,PDO::PARAM_STR,100);
	       $stmt->bindParam(3,$tipo,PDO::PARAM_STR,1);
	       $stmt->execute();	
	       $res = true;
	       echo "Registro insertado";
	   	}
	   catch (PDOException $ex) {
	       echo $ex->getMessage();
	   	}
	   return $res;    
	}
	function deluser($id)
	{
		$con = conecta();
		$query = "DELETE FROM usuarios WHERE ID_user= ".$id.";";
		$consul = "SELECT ID_user FROM usuarios where ID_user = ?";
		$res = false;
		try 
		{
			$stmt = $con->prepare($consul);
			$stmt->bindParam(1, $id);
	       	$stmt->execute();
	       	$result = $stmt->fetchAll();
	       	$a = $result[0][0];
	       	if($a == $id)
	       	{
	       		$stmt = $con->prepare($query);
	       		$stmt->bindParam(1, $id);
	       		$stmt->execute();
	       		echo "Registro eliminado";
	       		$res = true;
	       	}
	       	else
	       	{
	       		echo "Intente nuevamente";
	       	}

		} 
		catch (PDOException $e) 
		{
			echo "Error: ".$e->getMessage();			
		}
	}
	function viewuser($id)
	{
		$con=conecta();
   		$sql="SELECT ID_user, UPPER(RTRIM(nam)), UPPER(RTRIM(lnam)), UPPER(RTRIM(tipo)) FROM usuarios where ID_user = ?";
   		$res = false;
	    try{
	       $stmt = $con->prepare($sql);
	       $stmt->bindParam(1, $id);
	       $stmt->execute();

	       		$result = $stmt->fetchAll();
	       		if($result != null)
	       		{
	       			print_r($result[0][0]." Nombre ". $result[0][1] ." ".$result[0][2]." Tipo usuario".$result[0][3]);
					$res = true;
	       		}
	       		else if($result = null)
	       		{
					
					echo "Intente nuevamente";	       		
	       		}	       		
	       		 $con = null; 
	   	}
	   	catch(PDOException $e){
	       echo $e->getMessage();    
	   	}
	   	if($res == false)
	   	{
	   		echo "Intente nuevamente";
	   	} 
	   	else
	   	{
	   		return $result;
	   	}        
   		
	}

	function upduser($id,$nam,$lnam,$tipo)
	{
		$con = conecta();
		$query = "UPDATE usuarios SET nam = ?, lnam = ?, tipo = ? WHERE ID_user = ".$id.";";		
		$consul = "SELECT ID_user FROM usuarios where ID_user = ?";

		$res = false;
		try 
		{
			$stmt = $con->prepare($consul);
			$stmt->bindParam(1, $id);
	       	$stmt->execute();
	       	$result = $stmt->fetchAll();
	       	$a = $result[0][0];
	       	if($a == $id)
	       	{
	       		$stmt = $con->prepare($query);
	       		$stmt->bindParam(1, $nam);
	       		$stmt->bindParam(2, $lnam);
	       		$stmt->bindParam(3, $tipo);
	       		$stmt->execute();
	       		echo "Registro modificado";
	       		$res = true;
	       	}
	       	else
	       	{
	       		echo "Intente nuevamente";
	       	}

		} 
		catch (PDOException $e) 
		{
			echo "Error: ".$e->getMessage();			
		}

	}
	#upduser($v1,$v2,$v3,$v4);
	#newuser($v2,$v3,$v4);
	#viewuser($v1);
	#deluser($v1);
	phpinfo();
?>
