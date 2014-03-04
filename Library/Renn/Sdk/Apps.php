<?php
require_once 'Network.php';
class Renn_Sdk_Apps {
	protected $_restUrl = null;
	protected $_appKey = null;
	protected $_appId = null;
	protected $_format = null;
	protected $_v = '1.0';
	protected $_currenttime = null; // time()
	private static $_instance = null;
	public static function getInstance() {
		if (null === self::$_instance) {
			self::$_instance = new self ();
			self::$_instance->_currenttime = time ();
		}
		return self::$_instance;
	}
	public function invoke($api, $data, &$signStr = null) {
		$paramArr = $data;
		$paramArr ['method'] = $api;
		$paramArr ['appId'] = $this->_appId;
		$paramArr ['currentTime'] = $this->_currenttime;
		$paramArr ['v'] = $this->_v;
		$paramArr ['format'] = $this->_format;
		$paramArr ['sign'] = $this->_spellSig ( $paramArr, $signStr );
		$result = Network::makeRequest ( $this->_restUrl, $paramArr, array () );

		return $this->getResponse ( $result );
	}
	public function getResponse($responseMsg) {
		if (true !== $responseMsg ['result']) {
			throw new Exception ( 'network run error!error msg is ' . var_export ( $responseMsg ['msg'] ) );
			return false;
		} else if (empty ( $responseMsg ['msg'] )) {
			return array ();
		} else {
			$rtnArr = array();
			switch (strtoupper ( $this->_format )) {
				case 'XML' :
					$rtnArr = (array) simplexml_load_string ( $responseMsg ['msg'] );
					break;

				case 'JSON' :
					$rtnArr = json_decode ( $responseMsg ['msg'] , true );
					break;
			}
			//剥离最外层
			return current($rtnArr);
		}
	}

	/**
	 * 所有的参数ksort拼接方式拼接sig
	 */
	private function _spellSig($paramArr, &$backSign = null) {
		$apiKey = $this->_appKey;
		$signStr = '';
		ksort ( $paramArr );
		$excludeArr = array (
				'sig'
		);
		foreach ( $paramArr as $k => $v ) {
			if (! in_array ( $k, $excludeArr )) {
				$signStr .= "{$k}={$v}";
			}
		}
		$backSign = $signStr . '{API_KEY}';
		$signStr .= $apiKey;

		return md5 ( $signStr );
	}
	public function setRestUrl($_restUrl) {
		$this->_restUrl = $_restUrl;
	}
	public function setAppKey($_appKey) {
		$this->_appKey = $_appKey;
	}
	public function setAppId($_appId) {
		$this->_appId = $_appId;
	}
	public function setFormat($_format) {
		$this->_format = $_format;
	}
}