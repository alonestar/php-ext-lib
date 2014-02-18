<?php
require_once APPLICATION_PATH . '/Library/Network.php';

$url = "http://www.hao123.com/";
$params = array (
		'a' => 'a',
		'b' => 'b'
);
$cookie = array (
		'c' => 'c',
		'd' => 'd'
);

$result = Network::makeRequest ( $url, $params, $cookie );
if ( !$result['result'] ) {
	throw new Exception('[test Network fail]msg:network invoke fail');
}
