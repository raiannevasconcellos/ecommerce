<?php 

namespace Hcode;

class Model {

	private $values = [];

	public function __call($name, $args){
			// pra saber se foi o método SET ou GET utilizado.. então eu peço pra ele me retornar as 3 primeiras letras da palavra

		$method = substr ($name, 0, 3); 	// aqui quer dizer, a partir da posição 0 traga 0,1,2.

		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case "get":
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
			break;

			case "set":
				$this->values[$fieldName] = $args[0];
			break;
			
		}

	}

	public function setData($data=array()){

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}	($value);	//coloca-se dentro de chaves pra deixar dinâmico e eu conseguir concatenar a palavra set com a key que virá do bando de dados [pode ser idusuario, idlogin, etc]

		}
	}

	public function getValues (){

		return $this->values;

	}


}



 ?>