<?php

/**
 * @author zhangyuyi
 * @version $Id$
 */
class Representor {

	private $_data;

	public static function isVaildHttpAccept($httpAccept) {
		return in_array(strtolower($httpAccept), array('json', 'html', 'xml'));
	}

	public function setData(array $data) {
		$this->_data = $data;
	}
	
	protected function getData() {
		return $this->_data;
	}
}