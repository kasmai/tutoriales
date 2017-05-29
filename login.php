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
		
		<div class="container mlogin">
			<div class="item thumb2" data-width="282">	
			<center><h2>Log in</h2></center>	
			<form name="loginform" id="loginform" action="" method="POST">
			 <p>
			 <label for="user_login">Nombre De Usuario<br />
			 <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
			 </p>
			 <p>
			 <label for="user_pass">Contraseña<br />
			 <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
			 </p>
			 <p class="submit">
			 <input type="submit" name="login" class="button" value="Entrar" />
			 </p>
			 <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
			</form>


			</div>
		</div>
									
		
		
		<!-- Scripts -->
			
</body>
</html>