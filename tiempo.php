<?php
 
require_once('lib/nusoap.php');

$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
$client = new nusoap_client($wsdl,'wsdl');

echo '
<form method="POST">
	<input type="text" name="ciudad" />
	<input type="submit" />
</form>';

if(!empty($_POST['ciudad'])){
	$params = array('CountryName' => $_POST['ciudad']);
	$result = $client->call('GetCitiesByCountry',$params);

	$prueba2 = implode('',$result);
	$prueba = new SimpleXMLElement($prueba2);

	echo '<table>';
	echo '<tr><td style="font-size:28px;">Ciudades</td></tr>';
		for($i = 0; $i < sizeof($prueba); $i++){
			echo '<tr><td>'.$prueba->Table[$i]->City.'<td></tr>';
		}
	echo '</table>';
}