<?php

class Resource {
	private $_params = array();

	public function __construct(array $params) {
		$this->_params = $params;
	}

	public function	setOutputData(array $data) {
		$this->_outputData = $data;
	}

	public function get() {}
	public function post() {}
	public function put() {}
	public function delete() {}
}