<?php
	require_once("classes/Login.class.php");
	$url = __DIR__ . "/logins.json";
	$loginsList = [];

	if (file_exists($url)) {
		$loginsJson = file_get_contents($url);

		$logins = json_decode($loginsJson);


		foreach ($logins as $login){
			$item = new Login(
				$login -> nc,
				$login -> email,
				$login -> dom,
				$login -> cp,
				$login -> nt
		
			);

			array_push($loginsList, $item);
		}

	}

?>

<!-- <?php

	//require_once("ValidarLogin.php");

?> -->



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN • Premium Steaks </title>
	<link rel="stylesheet" type="text/css" href="estiloform.css">
</head>
<body>
	<h1>Login</h1>
	<form method="POST" action="AltaLogin.php">
		<fieldset>
			<legend>Datos personales:</legend>
			<label for="nc">Nombre Completo:</label>
			<input type="text" name="nc" placeholder="Nombre Completo" pattern="[A-ZÑa-zñáéíóúÁÉÍÓÚ'° ]+" title="Utilice sólo letras" required>
			<br><br>
			<label for="email">Email:</label>
			<input type="email" name="email" placeholder="Email">
			<br><br>
			<label for="dom">Domicilio:</label>
			<input type="text" name="dom" placeholder="Colonia, Calle, Número" pattern="[a-zA-Z ]+, [a-zA-Z ]+, [0-9]{2,4}" title="Utilice comas entre cada dato: Colonia, Calle, Número">
			<br><br>
			<label for="cp">Código Postal:</label>
			<input type="text" name="cp" placeholder="Código Postal" pattern="[0-9]{5}" title="Deben ser al menos 5 números">
			<br><br>
			<label for="nt">Número de teléfono:</label>
			<input type="text" name="nt" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Utilice formato 000-000-0000">
		</fieldset>

			<input type="submit" name="ok" value="Entrar">
			<input type="reset" name="Borrar">

			<!-- <div>
				<?php
					//if ($errorNC || $errorEmail) {
						//echo "<span>$errorNC</span><span>$errorEmail</span>";	
					
				//?>
			</div>
 -->
	</form>

	<br><br>

	<a href="index.html">REGRESAR AL INDEX</a>

	<hr>

	<h2>Login realizados: </h2>
	<table border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>Nombre Completo</th>
			<th>Correo Electrónico</th>
			<th>Domicilio</th>
			<th>Código Postal</th>
			<th>Número de teléfono</th>
		</tr>

		<?php
			foreach($loginsList as $login){
				$login->getLogin();			

			}
		?>
		
	</table>


</body>
</html>
