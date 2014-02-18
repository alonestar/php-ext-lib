<?php
require_once APPLICATION_PATH . '/Library/Db/MysqlPdo.php';
global $dbConfigs;//见common.php
$gDb = Db_MysqlPdo::getInstance ( $dbConfigs );

testLockTable($gDb);
// echo '<hr>';
testTransaction($gDb);

function testLockTable( $gDb ) {
	$sqlLockTable = "lock table test2 write";
	$sqlUnLock    = "unlock tables";
	//解开下行将导致并发的问题产生
// 	$sqlLockTable = $sqlUnLock;
	try {
		$gDb->execute ($sqlLockTable);
		$sqlTmp = "select * from test2 where a=:a";
		$paramArr = array (
				':a' => '62',
		);
		$sthTmp = $gDb->execute ($sqlTmp,$paramArr);
		$resultArr = $sthTmp->fetchAll( PDO::FETCH_ASSOC );
		var_export($resultArr);
		//测试并发效果
		sleep(1);

		$sqlTmp = "update test2 set b=:b , c=:c  where a=62";
		$bTmp = $resultArr[0]['b']-1;
		$cTmp = $resultArr[0]['c']-2;
		echo '<br>',$bTmp,'|',$cTmp,'<br>';
		$paramArr = array (
				':b' => $bTmp,
				':c' => $cTmp,
		);
		$gDb->execute ($sqlTmp,$paramArr);

		$sqlTmp = "select * from test2 where a=:a";
		$paramArr = array (
				':a' => '62',
		);
		$sthTmp = $gDb->execute ($sqlTmp,$paramArr);
		$resultArr = $sthTmp->fetchAll( PDO::FETCH_ASSOC );
		var_export($resultArr);
		$gDb->execute ($sqlUnLock);
	} catch (Exception $e) {
		$gDb->execute ($sqlUnLock);
		echo $e->getTraceAsString(),'<br>';
		echo $e->__toString(),'<br>';
		throw $e;
	}
}


function testTransaction( $gDb ) {
	$sqlTmp1 = "insert into test(b,c) value(:b,:c)";
	$paramArr1 = array (
			':b' => "中文",
			':c' => "撒的发生"
	);
	try {
		$gDb->beginTransaction ();
		$gDb->execute ( $sqlTmp1, $paramArr1 );
		$pid = $gDb->lastInsertId ();

		$sqlTmp2 = "insert into test2(a,b,c) value(:a,:b,:c)";
		$paramArr2 = array (
				':a' => $pid,
				//详见Db_MysqlPdo L55行注释
// 				':a' => array (
// 						'value' => $pid,
// 						//数据库中的int类型必须单独说明
// 						'type' => PDO::PARAM_INT
// 				),
				':b' => "中文",
				':c' => "还是中文"
		);
		$gDb->execute ( $sqlTmp2, $paramArr2 );
		$gDb->commit();
	} catch ( Exception $e ) {
		$gDb->rollBack();
		echo $e->getTraceAsString(),'<br>';
		echo $e->__toString(),'<br>';
		throw $e;
	}

	$sqlTmp = "select * from test order by a desc limit 5";
	$paramArr = array (
			':a' => '62',
	);
	$sthTmp = $gDb->execute ($sqlTmp,$paramArr);
	$resultArr = $sthTmp->fetchAll( PDO::FETCH_ASSOC );
	var_export($resultArr);
	echo "<br>";

	$sqlTmp = "select * from test2 order by a desc limit 5";
	$paramArr = array (
			':a' => '62',
	);
	$sthTmp = $gDb->execute ($sqlTmp,$paramArr);
	$resultArr = $sthTmp->fetchAll( PDO::FETCH_ASSOC );
	var_export($resultArr);
}