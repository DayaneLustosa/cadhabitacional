<?php
class Library_Form_FormatFields {
	public function mask($str) {
		$str = ( string ) $str;
		$toremove = array (
			'(',
			')',
			'-',
			' ',
			'.'
		);
		$tosubstitute = array (
			'',
			'',
			'',
			'',
			''
		);
		return str_replace ( $toremove, $tosubstitute, $str );
	}

	public function toDecimal($str) {
		$str = ( string ) $str;
		$toremove = array (
			'.',
			','
		);
		$tosubstitute = array (
			'',
			'.'
		);
		return str_replace ( $toremove, $tosubstitute, $str );
	}

	public function removeAcentos($str) {
		$str = ( string ) $str;
		$toremove = array (
			'á','à','ã','â',
			'é','ê',
			'í',
			'ó','ô','õ',
			'ú','ü',
			'ç',
			'Á','À','Ã','Â',
			'É','Ê',
			'Í',
			'Ó','Ô','Õ',
			'Ú','Ü',
			'Ç'
		);
		$tosubstitute = array (
			'a','a','a','a',
			'e','e',
			'i',
			'o','o','o',
			'u','u',
			'c',
			'A','A','A','A',
			'E','E',
			'I',
			'O','O','O',
			'U','U',
			'C'
		);
		return str_replace ( $toremove, $tosubstitute, $str );
	}

	function formatar($string, $tipo = "") {
		$string = preg_replace ( "[^0-9]", "", $string );
		switch ($tipo) {
			case 'fone' :
			$string = '(' . substr ( $string, 0, 2 ) . ') ' . substr ( $string, 2, 4 ) . '-' . substr ( $string, 6 );
			break;
			case 'cep' :
			$string = substr ( $string, 0, 5 ) . '-' . substr ( $string, 5, 3 );
			break;
			case 'cpf' :
			$string = substr ( $string, 0, 3 ) . '.' . substr ( $string, 3, 3 ) . '.' . substr ( $string, 6, 3 ) . '-' . substr ( $string, 9, 2 );
			break;
			case 'cnpj' :
			$string = substr ( $string, 0, 2 ) . '.' . substr ( $string, 2, 3 ) . '.' . substr ( $string, 5, 3 ) . '/' . substr ( $string, 8, 4 ) . '-' . substr ( $string, 12, 2 );
			break;
			case 'rg' :
			$string = substr ( $string, 0, 2 ) . '.' . substr ( $string, 2, 3 ) . '.' . substr ( $string, 5, 3 );
			break;
			case 'data' :
			$date = explode ( '-', $string );
			$date = $date [2] . '/' . $date [1] . '/' . $date [0];
			// retorna a string com a data na ordem correta e formatada
			$string = $date;
			break;
			case 'year' :
			$date = explode ( '-', $string );
			$year = $date [0];
			// retorna a string com a data na ordem correta e formatada
			$string = $year;
			break;
		}
		return $string;
	}
}