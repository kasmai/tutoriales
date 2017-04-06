<?php

	function conecta()
	{	
		$dbhost= 'localhost';
		$dbname = 'MiraiNikki';
		$usuario = 'root';
		$contraseña = 'root';

	try {
       $db = new PDO("mysql:host=$dbhost;dbname=$dbname",$usuario, $contraseña,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
       $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
       print_r("._.");
       return($db);

   } catch(PDOException $e) {
       print "<p>Error: Conexion Fallida.</p>\n";
       print "<p>Error: " . $e->getMessage() . "</p>\n";
       exit();
   }

	}
		#echo conecta();
?>