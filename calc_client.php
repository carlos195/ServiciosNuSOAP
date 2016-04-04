<?php
 
require_once('lib/nusoap.php');

echo '<form method="POST">
	<input type="text" name="num1" /><br/>
	<input type="text" name="num2" /><br/>
	<input type="submit" name="suma" value="Sumar" /><input type="submit" name="resta" value="Restar" />
	<input type="submit" name="multiplicar" value="Multiplicar" /><input type="submit" name="dividir" value="Dividir" />
</form>';

$wsdl="http://localhost/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
if(!empty($_POST['num1']) && !empty($_POST['num2'])){
	$params = array('a' => $_POST['num1'], 'b'=> $_POST['num2']);
	if(!empty($_POST['suma'])){
		$result= $client->call('Add', $params);
	}
	if(!empty($_POST['resta'])){
		$result= $client->call('Rest', $params);
	}
	if(!empty($_POST['multiplicar'])){
		$result= $client->call('Mult', $params);
	}
	if(!empty($_POST['dividir'])){
		$result= $client->call('Div', $params);
	}
echo '<h2>Resultat</h2><pre>';
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<p><b>Error: '.$err.'</b></p>';
	} else {
		// Display the result
		print_r($result);
	}
}

?>



