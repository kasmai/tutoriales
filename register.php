<?php
include 'conDB.php';
include 'header.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Mirai Nikki</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link href="hm/css/hover.css" rel="stylesheet" media="all">
	<link rel="icon" type="image/png" href="favicon (1).ico">
</head>
<body class="log">
	<div class="container mregister">
		<div id="login">
		<div class="item thumb2 log" data-width="282">
				 <h2>Registrar</h2>
				<form name="registro" id="registro" action="registro.php" method="POST">
				 <p>
				 <label for="user_login">Nombre Completo <br />
				 <input type="text" name="full_name" id="full_name" class="input" size="32" value="" required/></label>
				 </p>
				 
				 <p>
				 <label for="user_pass">E-mail<br />
				 <input type="email" name="email" id="email" class="input" value="" size="32" required /></label>
				 </p>
				 
				 <p>
				 <label for="user_pass">Nombre De Usuario<br />
				 <input type="text" name="username" id="username" class="input" value="" size="20" required /></label>
				 </p>
				 
				 <p>
				 <label for="user_pass">Contraseña<br />
				 <input type="password" name="password" id="password" class="input" value="" size="32" required /></label>
				 </p>
				 
				<p class="submit">
				 <input type="submit" name="registro" id="registro" class="button" value="Registrar" />
				 </p>
				 
				 <p class="regtext">Ya tienes una cuenta? <a class="reg" href="login.php" >Entra Aquí!</a>!</p>
				</form>
				 
				 </div>
				 </div>
		</div>
			
</body>
</html>