<?php
	require_once('lib/nusoap.php');

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/serv');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/serv';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Rest', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Div', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->register('Mult', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/serv');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

	function Add($a, $b){
		return $a + $b;
	}
	function Rest($a, $b){
		return $a - $b;
	}
	function Div($a, $b){
		return $a / $b;
	}
	function Mult($a, $b){
		return $a * $b;
	}
?>

