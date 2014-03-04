<?php
// require_once dirname ( dirname ( dirname ( dirname ( __FILE__ ) ) ) ) . '/common.php';
require_once APPLICATION_PATH . '/Library/Renn/Sdk/Apps.php';
class Test_Renn_Sdk_Apps {
	protected $_restUrl = null;
	protected $_appKey = null;
	protected $_appId = null;
	protected $_format = null;
	private static $_appsInstance = null;
	private static $_appsTestData = null;
	public function __construct($testData, $configArr) {
		$this->_appsTestData = $testData;
		$this->_appsInstance = Renn_Sdk_Apps::getInstance ();
		$this->_appsInstance->setRestUrl ( $configArr ['restUrl'] );
		$this->_appsInstance->setAppKey ( $configArr ['appKey'] );
		$this->_appsInstance->setAppId ( $configArr ['appId'] );
		$this->_appsInstance->setFormat ( $configArr ['format'] );
	}
	private function users_addRecentlyServer() {
		$api = str_replace ( '_', '.', __FUNCTION__ );
		$data = array (
				'uid' => $this->_appsTestData ['userId'],
				'gameDomain' => $this->_appsTestData ['gameDomain'],
				'gameServerDomain' => $this->_appsTestData ['gameServerDomain']
		);
		$result = $this->_appsInstance->invoke ( $api, $data );
	}
	private function users_getRecentlyServer() {
		$api = str_replace ( '_', '.', __FUNCTION__ );
		$data = array (
				'uid' => $this->_appsTestData ['userId'],
				'gameDomain' => $this->_appsTestData ['gameDomain']
		);
		return $this->_appsInstance->invoke ( $api, $data );
	}
	private function users_getRecentlyGames() {
		$api = str_replace ( '_', '.', __FUNCTION__ );
		$data = array (
				'uid' => $this->_appsTestData ['userId']
		);
		return $this->_appsInstance->invoke ( $api, $data );
	}
	public function test($method) {
		return $this->$method ();
	}
}

$testData = array (
		'userId' => '314251298',
		'gameDomain' => 'test.renren.com',
		'gameServerDomain' => 'x1.test.renren.com'
);
$checkArr = array (
		'users_addRecentlyServer' => null,
		'users_getRecentlyServer' => array (
				'uid' => 314251298,
				'game_domain' => 'test.renren.com',
				'servers' => array (
						0 => 'x1.test.renren.com'
				)
		),
		'users_getRecentlyGames' => array (
				'uid' => 314251298,
				'games' => array (
						0 => 'test.renren.com',
				)
		)
);
$configArr = array (
		'restUrl' => 'http://apps.yygx.org/restserver',
		'appId' => '123456',
		'appKey' => 'b92f7b3f5bba0229477027dc2',
		'format' => 'JSON'
);
$testAppsObj = new Test_Renn_Sdk_Apps ( $testData, $configArr );
foreach ( $checkArr as $testMethodName => $checkArr ) {
	$result = $testAppsObj->test ( $testMethodName );
	$realStr = var_export( $result , true );
	$checkStr = var_export( $checkArr , true );
	if ( $realStr !== $checkStr ) {
		$msg = <<<MSG
test {$testMethodName} false !
realStr:{$realStr}
checkStr:{$checkStr}
MSG;
		throw new Exception( $msg );
	} else {
		echo "test {$testMethodName} ok !\n";
	}
}


