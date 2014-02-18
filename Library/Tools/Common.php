<?php
class Tools_Common {

	static function init() {
		ini_set("memory_limit","-1");
		set_time_limit(0);

		header ( 'Content-Type: text/html; charset=utf-8' );
		date_default_timezone_set('Asia/Shanghai');

		//报告所有错误
		error_reporting ( E_ALL );
		self::_initStripslashesAllParam();
	}

	private static function _initStripslashesAllParam() {
		if (get_magic_quotes_gpc ()) {
			$_REQUEST = self::_stripslashesDeep ( $_REQUEST );
			$_POST = self::_stripslashesDeep ( $_POST );
			$_GET = self::_stripslashesDeep ( $_GET );
			$_COOKIE = self::_stripslashesDeep ( $_COOKIE );
			@$_SESSION = self::_stripslashesDeep ( $_SESSION );
		}
	}

	private static function _stripslashesDeep($value) {
		if ( is_array($value) ) {
			foreach ($value as &$single) {
				$single = self::_stripslashesDeep($single);
			}
			return $value;
		} else {
			return stripcslashes($value);
		}
	}
}