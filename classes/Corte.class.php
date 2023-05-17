<?php

	class Corte implements JsonSerializable{

		//Atributos
		private $corte;
		private $kg;
		private $piezas;
		private $marmol;
		private $saz;
		

		//Contructor
		function __construct($cor, $kilog, $npiezas, $mar, $sazon){
			$this -> corte = $cor;
			$this -> kg = $kilog;
			$this -> piezas = $npiezas;
			$this -> marmol = $mar;
			$this -> saz = $sazon;
	
		}

		function getCorte(){//para insertar cada elemento en la tabla
			echo "<tr>";
				echo "<td>$this->corte</td>";
				echo "<td>$this->kg</td>";
				echo "<td>$this->piezas</td>";
				echo "<td>$this->marmol</td>";
				echo "<td>$this->saz</td>";
			echo "</tr>";
		}

		function jsonSerialize(){
			return get_object_vars($this);

		}

	}
?>