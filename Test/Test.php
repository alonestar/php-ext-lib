<?php
require_once dirname ( dirname ( __FILE__ ) ) . '/common.php';
/**
 * FIXME:需要将本目录下test.sql导入数据库,并配置如下数据库信息
 */
$dbConfigs = array (
		'host' => '127.0.0.1',
		'port' => '3306',
		'username' => 'root',
		'password' => '',
		'dbname' => 'test',
		'charset' => 'UTF8'
);

// 需要加入测试队列的信息
$testCaseArr = array (
		array (
				'name' => 'test Db_MysqlPdo lock table',
				'dir' => 'Db/MysqlPdo/LockTable.php'
		),
		array (
				'name' => 'test Db_MysqlPdo transaction',
				'dir' => 'Db/MysqlPdo/Transaction.php'
		),
		// cli模式下不支持curl,测试无法成功
		// array (
		// 'name' => 'test Network',
		// 'dir' => 'Network/Network.php'
		// )
		array (
				'name' => 'test Tools_Xml convert array to XML',
				'dir' => 'Tools/Xml/Xml.php'
		)
);

try {
	foreach ( $testCaseArr as $testCaseInfo ) {
		require_once APPLICATION_PATH . '/Test/' . $testCaseInfo ['dir'];
	}
	exit ( 'Test Success!' );
} catch ( Exception $e ) {
	throw $e;
}
