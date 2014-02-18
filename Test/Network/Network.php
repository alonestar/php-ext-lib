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
echo 111111111;
var_export($result);

