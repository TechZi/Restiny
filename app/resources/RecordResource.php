<?php

/**
 * 通讯录记录资源类
 *
 * @author Zhangyuyi
 * @version $Id$
 */
class RecordResource extends Resource {

	/**
	 * 查询记录
	 *
	 */
	public function get() {
		$recordId = $this->getParam('recordId');

		$dataAccessor = new RecordDataAccessor();
		$record = $dataAccessor->getRecord($recordId);

		if (empty($record)) {
			throw new RestinyResourceException("No.{$recordId} not found", '404');

			return ;
		}

		$this->setOutputData($record);
	}

	/**
	 * 创建记录
	 */
	public function post() {
		$dataAccessor = new RecordDataAccessor();
		$result = $dataAccessor->addRecord(array($this->getParam('name'), $this->getParam('cellphone_number')));
		
		$outputData = array(
			'data' => array(),
			'message' => 'Added successfullys'
		);

		if ($result) {
			$this->setOutputData($outputData);
		}
	}

	/**
	 * 修改记录
	 */
	public function put() {

	}

	/**
	 * 删除记录
	 */
	public function delete() {
		$dataAccessor = new RecordDataAccessor();

		$result = $dataAccessor->deleteRecord($this->getParam('recordId'));

		$outputData = array(
			'data' => array(),
			'message' => 'Deleted successfullys'
		);

		if ($result) {
			$this->setOutputData($outputData);
		}
	}
}

?>
