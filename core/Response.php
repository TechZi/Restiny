<?php

class Response {
	const METHOD_NOT_ALLOWED = 405;
	const NOT_FOUND = 404;
	
	private $_responseCode = 0;
	
	public function getResponseCode() {
		return $this->_responseCode;
	}
	
	public function setResponseCode($code) {
		$this->_responseCode = $code;
	}
	
	public function respond() {
		
	}
}