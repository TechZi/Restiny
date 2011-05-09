<?php
/**
 * 资源父类
 * 
 * @author Zhangyuyi
 * @version $Id$
 */

class Resource {
	private $_params = array();
	private $_outputData = array();
	
	public function __construct(array $params) {
		$this->_params = $params;
	}

	public function setOutputData(array $data) {
		$this->_outputData = $data;
	}
	
	public function getOutputData() {
		return $this->_outputData;
	}	
	
	public function getParams() {
		return $this->_params;
	}

	public function getParam($key) {
		return $this->_params[$key];	
	}

	public function get() {}
	public function post() {}
	public function put() {}
	public function delete() {}
}