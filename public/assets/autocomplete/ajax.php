<?php
/**
 * @author Wellington Ribeiro - IdealMind.com.br
 * @since 31/10/2009
 */
 

 
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
	
mysql_connect( $hostname, $username, $password ) or die ( 'Erro ao tentar conectar ao banco de dados.' );
mysql_select_db( $dbname );

$q = mysql_real_escape_string( $_GET['q'] );

$sql = "SELECT * FROM estados where locate('$q',estado) > 0 order by locate('$q',estado) limit 10";

$res = mysql_query( $sql );

while( $campo = mysql_fetch_array( $res ) )
{
	//echo "Id: {$campo['id']}\t{$campo['sigla']}\t{$campo['estado']}<br />";
	$id = $campo['id'];
	$estado = $campo['estado'];
	$sigla = $campo['sigla'];
	$estado = addslashes($estado);
	$html = preg_replace("/(" . $q . ")/i", "<span style=\"font-weight:bold\">\$1</span>", $estado);
	echo "<li onselect=\"this.setText('$estado').setValue('$id','$estado','$sigla');\">$html ($sigla)</li>\n";
}

?>