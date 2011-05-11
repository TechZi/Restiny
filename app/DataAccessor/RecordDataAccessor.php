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
		$sql .= 'WHERE `record_id`=:id';

		$statement = $this->getConnector()->prepare($sql);
		$statement->bindValue(':id', $recordId);

		$result = $statement->execute();

		$r = $result->fetchArray();

		d($r);
	}

}

?>
