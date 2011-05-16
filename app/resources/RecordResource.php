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
		$recordId = $this->params['recordId'];

		$dataAccessor = new RecordDataAccessor();

		$record = $dataAccessor->getRecord($recordId);

		if (empty($record)) {
			//TODO code=200 但是内容为空
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



		$i = $dataAccessor->addRecord(array($this->getParam('name'), $this->getPatam('cellphone_number')));

		var_dump($i);
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

	}
}

?>
