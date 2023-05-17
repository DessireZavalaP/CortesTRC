<?php

	if (isset($_POST['ok'])) {

		require_once("./classes/corte.class.php");

		$corte = $_POST['corte'];
		$kg = intval($_POST['kg']);
		$piezas = intval($_POST['piezas']);
		$marmol = intval($_POST['marmol']);
		$saz = $_POST['saz'];
		

		//Instanciando
	$corte1 = new Corte($corte, $kg, $piezas, $marmol, $saz);

	$cortejson = json_encode($corte1 , JSON_PRETTY_PRINT);

	//Capturar la info en un archivo
	$archivoinfo = __DIR__ . "/cortes.json";

	if (!file_exists($archivoinfo)) {
		$file = fopen($archivoinfo, "w");
		fwrite($file, "[\n");

	} 

	else{
		$file = fopen($archivoinfo, "c");
		fseek($file, -2 , SEEK_END);
		fwrite($file, ",\n");
	}

	fwrite($file, $cortejson);
	fwrite($file, "\n]");
	fclose($file);

	echo("La Orden con su pedido ha sido registrada exitosamente. Será redirigido a nuestro formulario.");
	header("refresh:3; url= 'cortes.php'");

	}

		else{
			echo"No está permitido entrar directamente a esta página."; //si trata de entrar y no mandó el formulario se muestra este mensaje
			header("refresh:3; url= 'cortes.php'");//se refresca la página en 5 seg y me redirige a donde está el formulario
		}

?>