<?php

	require_once("classes/Corte.class.php");
	$url = __DIR__ . "/cortes.json";
	$cortesList = [];

	if (file_exists($url)) {
		$cortesJson = file_get_contents($url);

		$cortes = json_decode($cortesJson);


		foreach ($cortes as $corte){
			$item = new Corte(
				$corte -> corte,
				$corte -> kg,
				$corte -> piezas,
				$corte -> marmol,
				$corte -> saz
			);

			array_push($cortesList, $item);
		}

	}



?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cortes TRC</title>
	<link rel="stylesheet" type="text/css" href="estiloform.css">
</head>
<body>
	<h1>.::Cortes TRC::.</h1>

	<form method="POST" action="AltaCorte.php"> 
		<!-- en el action va el altacorte.php -->
		<h2>---Carrito de Compra---</h2>
		<br>

		<fieldset>
			<legend>Tipo de corte: </legend>
			<label for="corte">Corte</label>
			<br>

			<select name="corte">

				<optgroup label="Cortes MTY">
					<option>Aguja Norteña $260.00</option>
					<option>Arrachera Abierta $520.00</option>
					<option>Arrachera Marinada $705.00</option>
				</optroup>	

				<optgroup label="Cortes Sonora">
					<option>Rib eye $360.00</option>
					<option>Tuetano $240.00</option>
					<option>Porter House $340.00</option>
				</optgroup>

				<optgroup label="Cortes Especiales">
					<option>New York prime añejado $472</option>
					<option>Top Sirloin $168.00</option>
					<option>Tomahawk Sonora $1,320.00</option>
				</optgroup>	

			</select>
		</fieldset>

		<fieldset>
			<legend>Gramos:</legend>
			<input type="radio" name="kg" value="400" checked>
			<label for="kg">400 gr</label>
			<br>
			<input type="radio" name="kg" value="500">
			<label for="kg">500 gr</label>
			<br>
			<input type="radio" name="kg" value="800">
			<label for="kg">800 gr</label>
			<br>
			<input type="radio" name="kg" value="900">
			<label for="kg">900 gr</label>
			<br>
			<input type="radio" name="kg" value="1000">
			<label for="kg">1000 gr</label>
		</fieldset>

		<fieldset>
			<legend>Piezas (máx 20):</legend>
			<label for="piezas">Piezas:</label>
  			<input type="number" name="piezas" min="1" max="20" value="1">
		</fieldset>

		<fieldset>
			<legend>Marmoleado:</legend>
			<input type="radio" name="marmol" value="1">
			<label for="marmol">GRADO 1 (Ligero)</label>
			<br>
			<input type="radio" name="marmol" value="2">
			<label for="marmol">GRADO 2 (Poco)</label>
			<br>
			<input type="radio" name="marmol" value="3">
			<label for="marmol">GRADO 3 (Moderado)</label>
			<br>
			<input type="radio" name="marmol" value="4">
			<label for="marmol">GRADO 4 (Ligero abundante)</label>
			<br>
			<input type="radio" name="marmol" value="5">
			<label for="marmol">GRADO 5 (Moderado abundante)</label>
			<br>
		</fieldset>
		
		<fieldset>
			<legend>Sazonado</legend>
			<label for="saz">Si</label>
			<input type="radio" name="saz" value="si">
			<label for="saz">No</label>
			<input type="radio" name="saz" value="no">
		</fieldset>		
		
				<input type="submit" name="ok" value="Comprar">
				<input type="reset" name="Borrar">
	</form>

	<br><br>

	<a href="index.html">REGRESAR AL INDEX</a>

	<hr>

	<h2>Lista de orden: </h2>
	<table border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>Tipo de Corte</th>
			<th>Kg</th>
			<th>Piezas</th>
			<th>Marmoleado</th>
			<th>Sazonado</th>
		</tr>

		<?php
			foreach($cortesList as $corte){
				$corte->getCorte();			

			}
		?>
		
	</table>





</body>
</html>