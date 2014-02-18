<?php
require_once APPLICATION_PATH . '/Library/Tools/Xml.php';


$testArr = array('a'=>'1','b'=>array(1,2,3,4));
$compareXML = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<a>1</a>
<b>
    <a0>1</a0>
    <a1>2</a1>
    <a2>3</a2>
    <a3>4</a3>
</b>

XML;


$xmlObj = new Tools_Xml();
$xmlObj->setArray($testArr);
$xmlObj->generateXML();

$return = $xmlObj->XML;

if ( $compareXML!==$return ) {
	throw new Exception("[test Tools_Xml fail]msg:compare xml not equal with array");
}
