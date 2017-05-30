<?php
include 'conDB.php';
include 'header.php';
?>
<?php
session_start();
?>

<?php
 
if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}
 
if(isset($_POST["login"]))
{
 
if(!empty($_POST['username']) && !empty($_POST['password'])) 
{
 $username=$_POST['username'];
 $password=$_POST['password'];
 
$query =mysql_query("SELECT * FROM UserSite WHERE username='".$username."' AND password='".$password."'");
 
$numrows=mysql_num_rows($query);
 if($numrows!=0)
{
	 while($row=mysql_fetch_assoc($query))
	 {
	 $dbusername=$row['username'];
	 $dbpassword=$row['password'];
	 }
 
	if($username == $dbusername && $password == $dbpassword)
	 
	{
	 
	 $_SESSION['session_username']=$username;
	 
	/* Redirect browser */
	 header("Location: intropage.php");
 	}
 } 
	 else {
	 
		$message = "Nombre de usuario ó contraseña invalida";
	 }
	 
	} 
else {
	 $message = "Todos los campos son requeridos";
	}
}
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
			<div class="item thumb2 log" data-width="282">	
			<center><h2>Ingresa</h2></center>	
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
			 <p class="regtext">No estas registrado? <a class="log" href="register.php" >Registrate Aquí</a>!</p>
			 </form>


			</div>
		</div>
									
		 <?php include("includes/footer.php"); ?> 
 			<?php if (!empty($message)) {echo "<p class=\"error\">" . $message . "</p>";} ?>

		
		<!-- Scripts -->
			
</body>
</html>