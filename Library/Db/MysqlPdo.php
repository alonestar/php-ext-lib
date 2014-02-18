<?php
class Db_MysqlPdo {
	private $_dbHost = null;
	private $_dbPort = null;
	private $_dbUser = null;
	private $_dbPwd  = null;
	private $_dbName = null;
	private $_dbCharset = null;
	private $_options   = array(PDO::ATTR_PERSISTENT => false);

	private $_dbAdapter = null;
	static $_instance   = null;

	/**
	 *
	 * @param array $dbConfigs 全部参数必传,以下是示例
	 * $dbConfigs = array (
	 *		'host'     => '127.0.0.1',
	 *		'port'     => '3306',
	 *		'username' => 'root',
	 *		'password' => '',
	 *		'dbname'   => 'test',
	 *		'charset'  => 'UTF8',
	 * );
	 * @return MysqlPdo
	 */
	public static function getInstance( $dbConfigs ) {
		$dbKey = serialize($dbConfigs);
		if (null === self::$_instance[$dbKey]) {
			self::$_instance[$dbKey] = new self ( $dbConfigs );
		}
		return self::$_instance[$dbKey];
	}

	private function __construct( $dbConfigs ) {
		$this->_dbHost = $dbConfigs['host'];
		$this->_dbPort = $dbConfigs['port'];
		$this->_dbUser = $dbConfigs['username'];
		$this->_dbPwd  = $dbConfigs['password'];
		$this->_dbName = $dbConfigs['dbname'];
		$this->_dbCharset = $dbConfigs['charset'];
	}

	private function _getDbAdapter() {
		if ( null === $this->_dbAdapter ) {
			$dbhTmp = "mysql:host={$this->_dbHost};port={$this->_dbPort};dbname={$this->_dbName}";
			$this->_dbAdapter = new PDO ( $dbhTmp , $this->_dbUser, $this->_dbPwd, $this->_options );
			$this->_dbAdapter->query("SET NAMES {$this->_dbCharset}");
		}
		return $this->_dbAdapter;
	}

	public function execute( $sql , $paramArr = array() ) {
		$sth = $this->_getDbAdapter()->prepare( $sql );
		/**
		 * 使用这种方式有bug
		 * eg:update test2 set b=:b , c=:c  where a=62
		 * 这里b,c的值均会修改为:c的值
		 * 详见http://www.laruence.com/2012/10/16/2831.html的说明
		 */
// 		if ( is_array($paramArr) && !empty($paramArr) ) {
// 			foreach ( $paramArr as $key => $value ) {
// 				if ( is_array( $value ) ) {
// 					$valueTmp = $value['value'];
// 					$typeTmp  = $value['type'];
// 					$sth->bindParam($key, $valueTmp, $typeTmp);
// 				} else {
// 					$sth->bindParam($key, $value);
// 				}
// 			}
// 		}
		// 使用execute($paramArr)的方式不用关心bindparam类型的问题
		if ( $sth->execute($paramArr) && '00000'===$sth->errorCode() ) {
			return $sth;
		} else {
			$error = implode( '|' , $sth->errorInfo() );
			throw new Exception($error);
			return false;
		}
	}

	public function lastInsertId() {
		return $this->_getDbAdapter()->lastInsertId();
	}

	public function beginTransaction() {
		return $this->_getDbAdapter()->beginTransaction();
	}

	public function commit() {
		return $this->_getDbAdapter()->commit();
	}

	public function rollBack() {
		return $this->_getDbAdapter()->rollBack();
	}

}























