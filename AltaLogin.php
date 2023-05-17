<?php

	if (isset($_POST['ok'])) {

		require_once("./classes/Login.class.php");

		$nc = $_POST['nc'];
		$email = $_POST['email'];
		$dom = $_POST['dom'];
		$cp = intval($_POST['cp']);
		$nt = $_POST['nt'];

	//Instanciando
	$login1 = new Login($nc, $email, $dom, $cp, $nt);

	$loginjson = json_encode($login1 , JSON_PRETTY_PRINT);	

	//Capturar la info en un archivo
	$archivoinfo = __DIR__ . "/logins.json";

	if (!file_exists($archivoinfo)) {
		$file = fopen($archivoinfo, "w");
		fwrite($file, "[\n");

	} 
	else{
		$file = fopen($archivoinfo, "c");
		fseek($file, -2 , SEEK_END);
		fwrite($file, ",\n");
	}

	fwrite($file, $loginjson);
	fwrite($file, "\n]");
	fclose($file);

	echo("Registrando Login. Será redirigido a nuestro formulario.");
	header("refresh:3; url= 'login.php'");

	}

		else{
			echo"No está permitido entrar directamente a esta página.";
			header("refresh:3; url= 'login.php'");

	}
?>