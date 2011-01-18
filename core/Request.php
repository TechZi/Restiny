<?php

class Request {
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_PUT = 'PUT';
	const METHOD_DELETE = 'DELETE';
	
	private $_requestMethod = '';	

	private $_requestUri = '';
	
	private $_requestParams = array();	
	
	public function __construct() {
		$this->_requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
		
		if (!$this->isVaildRequestMethod($this->_requestMethod)) {
			throw new RestinyHttpException('Request method is not allowed', Response::METHOD_NOT_ALLOWED);
		}
		
		$this->_requestUri = $_SERVER['REQUEST_URI'];

		if ($this->_requestMethod == 'GET') {
			$this->_requestParams = $_GET;
		} elseif ($this->_requestMethod == 'POST') {
			$this->_requestParams = $_POST;	
		}
	
	}
	
	public function setRequestParams($params) {
		$this->_requestParams = $params;
	}
	
	public function getRequestParams() {
		return $this->_requestParams;		
	}	

	public function getRequestMethod() {
		return $this->_requestMethod;
	}	

	public function getRequestUri() {
		return $this->_requestUri;
	}	
	
	public function isVaildRequestMethod($requestMethod) {
		return in_array($requestMethod, array(self::METHOD_GET, self::METHOD_POST, self::METHOD_PUT, self::METHOD_DELETE));
	}
	
	
	
}