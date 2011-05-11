<?php

/**
 * 数据访问器
 *
 * @author Zhangyuyi
 */
class DataAccessor {

	private $_sqliteConnector = null;

	public function __construct($dbName) {
		//TODO  实例化一个sqlite的连接
		$this->_sqliteConnector = new SQLite3($dbName);
	}

	public function getConnector() {
		return $this->_sqliteConnector;
	}

}

?>
