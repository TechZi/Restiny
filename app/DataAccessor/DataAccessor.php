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
//		$this->_sqliteConnector = new PDO('sqlite:E:\workspace\restiny\app\DataAccessor\phonebook.db');
		
		$this->_sqliteConnector = new PDO('sqlite:D:\php\workspace\restiny\trunk\app\DataAccessor\phonebook.db');
	}
	
	/**
	 *
	 * @return PDO
	 */
	public function getConnector() {
		return $this->_sqliteConnector;
	}

}

?>
