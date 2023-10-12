<?php

require "../Modules/db.php" ;

$email = null;
$pass = null;

if(isset($_POST["email"])){
	$email = $_POST["email"];
}
if(isset($_POST["pass"])){
	$pass = $_POST["pass"];
}

if($email == null && $pass == null){
	header("Location: http://localhost:3000/view/Login.php?erro=Email e senha");
}else if($email == null){
	header("Location: http://localhost:3000/view/Login.php?erro=Email e senha");
}else if($pass == null){
	header("Location: http://localhost:3000/view/Login.php?erro=Email e senha");
}

$sqlcomand = $sqlcomand = "SELECT nome,email,senha FROM usuario WHERE email = \"$email\" AND senha = \"$pass\"";
$check = new Find(
	$sqlcomand
);


if(isset($check -> resultArray)){
	session_start();
	$_SESSION["newsession"]="Loged";
	echo $_SESSION["newsession"];
}else{
	session_start();
	$_SESSION["newsession"]="notLoged";
	echo $_SESSION["newsession"];
}

	for ($i = 0; $i <= count($check -> resultArray); $i++) {
		if(isset($check -> resultArray[$i])){
			echo "<p>" . $check -> resultArray[$i] . "</p>";
		}else {
			echo "<hr>";
		}
}
echo "<a href='/'>Home</a>";