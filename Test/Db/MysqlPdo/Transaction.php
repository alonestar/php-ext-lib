<?php
require_once APPLICATION_PATH . '/Library/Db/MysqlPdo.php';
global $dbConfigs;//见common.php
$gDb = Db_MysqlPdo::getInstance ( $dbConfigs );

if ($_REQUEST ['id'] == 1) {
	testTransaction1 ( $gDb );
} else if ($_REQUEST ['id'] == 2) {
	testTransaction2 ( $gDb );
} else if ($_REQUEST ['id'] == 3) {
	testTransaction3 ( $gDb );
}

function testTransaction1($gDb) {
	$sqlTmp = "select * From test3";

	try {
		$gDb->beginTransaction ();
		$sthTmp = $gDb->execute ( $sqlTmp );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );
		sleep ( 1 );
		echo date ( "Y-m-d H:i:s" ) . "<br/>";
		$sthTmp = $gDb->execute ( $sqlTmp . " for update" );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );
		sleep ( 1 );
		echo date ( "Y-m-d H:i:s" ) . "<br/>";
		$sthTmp = $gDb->execute ( $sqlTmp . " for update" );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );
		$gDb->commit ();
	} catch ( Exception $e ) {
		$gDb->rollBack ();
		echo $e->getTraceAsString (), '<br>';
		echo $e->__toString (), '<br>';
		throw $e;
	}
}
function testTransaction3($gDb) {
	$sqlTmp = "update test3 set b=?";
	$sqlTmp2 = "select * From test3";

	try {
		$gDb->beginTransaction ();
		$sthTmp = $gDb->execute ( $sqlTmp2 );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );

		echo date ( "Y-m-d H:i:s" ) . "<br/>";
		$sthTmp = $gDb->execute ( $sqlTmp, array (
				rand ( 1111, 9999 )
		) );
		echo date ( "Y-m-d H:i:s" ) . "<br/>";

		$sthTmp = $gDb->execute ( $sqlTmp2 );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );

		$gDb->commit ();
	} catch ( Exception $e ) {
		$gDb->rollBack ();
		echo $e->getTraceAsString (), '<br>';
		echo $e->__toString (), '<br>';
		throw $e;
	}
}
function testTransaction2($gDb) {
	$sqlTmp = "update test3 set b=?";
	$sqlTmp2 = "select * From test3";

	try {
		$gDb->beginTransaction ();
		$sthTmp = $gDb->execute ( $sqlTmp2 );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );

		echo "<br/>";
		$sthTmp = $gDb->execute ( $sqlTmp, array (
				9
		) );
		echo "<br/>";

		$sthTmp = $gDb->execute ( $sqlTmp2 );
		$resultArr = $sthTmp->fetchAll ( PDO::FETCH_ASSOC );
		var_export ( $resultArr );

		$gDb->commit ();
	} catch ( Exception $e ) {
		$gDb->rollBack ();
		echo $e->getTraceAsString (), '<br>';
		echo $e->__toString (), '<br>';
		throw $e;
	}
}