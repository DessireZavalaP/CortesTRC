<?php

	class Login implements JsonSerializable{


		//Atributos
		private $nc;
		private $email;
		private $dom;
		private $cp;
		private $nt;

		//Constructor
		function __construct($nombre, $correo, $domi, $codigop, $ntel){
			$this -> nc = $nombre;
			$this -> email = $correo;
			$this -> dom = $domi;
			$this -> cp = $codigop;
			$this -> nt = $ntel;
		}


		function getLogin(){
			echo "<tr>";
				echo "<td>$this->nc</td>";
				echo "<td>$this->email</td>";
				echo "<td>$this->dom</td>";
				echo "<td>$this->cp</td>";
				echo "<td>$this->nt</td>";
			echo "</tr>";
		}

		function jsonSerialize(){
			return get_object_vars($this);
		}

	}
?>