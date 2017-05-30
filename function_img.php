<?php

include 'conDB.php';
	#$id=2;

	#$file = 'images/owners/2/gy_10.png';
	
	/*$image = imagecreatefromjpeg($file);
	ob_start();
	imagejpeg($image);
	$jpg = ob_get_contents();
	ob_end_clean();
	$jpg = str_replace('##','##',mysql_escape_string($jpg));
	$tamaño = getimagesize($file);
	$ancho = $tamaño[0];           
	$alto = $tamaño[1];  
	$val = exif_imagetype($file) ;
	$tipo = image_type_to_mime_type($val);
	$tamaño = filesize($file);
	$ruta = $file;
	 print_r("Ruta: ".$file ."<br>Ancho:". $ancho ."<br>Alto: ". $alto . "<br>Tipo de imagen: " . $tipo . "<br>Tama&ntilde;o : " . $tamaño . " bytes");*/
function insertUser($full_name,$email,$username,$password)
{
	$con = conecta();
	$query = "INSERT INTO UserSite (full_name,email,username,password) VALUES (?,?,?,?);";
	 try{
	       $stmt = $con->prepare($query);
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
} 
function insImgOwners($alto,$ancho,$tipo,$ruta)
{
	$con = conecta();
	$query = "INSERT INTO imgUser (alto,ancho,tipo,ruta) VALUES (?,?,?,?);";
	 try{
	       $stmt = $con->prepare($query);
	       $stmt->bindParam(1,$alto);
	       $stmt->bindParam(2,$ancho);
	       $stmt->bindParam(3,$tipo);
	       $stmt->bindParam(4,$ruta);
	       $stmt->execute();
	       echo "<br>Registro insertado";
	   	}
	   catch (PDOException $ex) {
	       echo $ex->getMessage();
	   	}
} 
function viewImg($id)
{
	$con = conecta();
	$query = "SELECT ruta FROM imgUser WHERE ID_img = ".$id.";";
	try 
	{
		$stmt = $con->prepare($query);
	       $stmt->bindParam(1, $id);
	       $stmt->execute();

	       		$result = $stmt->fetchAll();

	       		if($result != null)
	       		{
	       			$miruta = $result[0][0];
	       			echo '<a href='.$miruta.' class="image"><img src='.$miruta.' alt=""></a>';
	       		}
	       		else if($result == null)
	       		{
					
					echo "Intente nuevamente";	       		
	       		}	       		
	       		 $con = null; 
	} 
	catch (PDOException $ex) 
	{	
		echo $ex->getMessage();
	}
}

#insImgOwners($alto,$ancho,$tipo,$ruta);
#<img src="obtenerfotografia.php?id=21"/>
#viewImg($id);
#phpinfo();

?>