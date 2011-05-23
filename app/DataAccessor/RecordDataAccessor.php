<?php

/**
 * 通讯录记录数据访问器
 *
 * @author Zhangyuyi
 * @version $Id$
 */

class RecordDataAccessor extends DataAccessor {

	const DB_NAME = 'phonebook.db';
	const DB_TABLE_NAME = 'record';

	public function __construct() {
		parent::__construct(self::DB_NAME);
	}

	public function getRecord($recordId) {
		$sql = 'SELECT * ';
		$sql .= 'FROM '.self::DB_TABLE_NAME .' ';
		$sql .= 'WHERE `record_id`=?';

		$statement = $this->getConnector()->prepare($sql);
		$statement->execute(array($recordId));
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
	
	public function addRecord(array $record) {
		$sql = 'INSERT INTO ';	
		$sql .= '`' . self::DB_TABLE_NAME . '` ';
		$sql .= 'VALUES (null, ?, ?)';
		
		$statement = $this->getConnector()->prepare($sql);
		return $statement->execute($record);
	}
	
	public function editRecord($recordId, array $record) {
		$sql = 'UPDATE ';	
		$sql .= '`' . self::DB_TABLE_NAME . '` ';
		$sql .= 'SET `name`=?, `cellphone`=?';
		$sql .= 'WHERE `record_id`=?';

		$statement = $this->getConnector()->prepare($sql);		
		return $statement->execute(array($record['name'], $record['cellphone'], $recordId));
	}
	
	public function deleteRecord($recordId) {
		$sql = 'DELETE FROM ';			
		$sql .= '`' . self::DB_TABLE_NAME . '` ';
		$sql .= 'WHERE `record_id`=?';
	
		$statement = $this->getConnector()->prepare($sql);
		return $statement->execute(array($recordId));
	}
}

?>
