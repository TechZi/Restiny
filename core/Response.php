<?php

class Response {
	const METHOD_NOT_ALLOWED = 405;
	const NOT_FOUND = 404;

	private $_code = 0;
	private $_headers = array();
	private	 $_body = '';

	public function getCode() {
		return $this->_code;
	}

	public function setCode($code) {
		$this->_code = $code;
	}

	public function setHeader($key, $value) {
		$this->_headers[$key] = $value;
	}

	public function getHeader($key) {
		return $this->_headers[$key];
	}

	public function setHeaders(array $headers) {
		if (!is_array($headers)) {
			return false;
		}

		foreach ($headers as $key => $value) {
			$this->_headers[$key] = $value;
		}
	}

	public function getBody() {
		return $this->_body;
	}

	public function setBody($body) {
		$this->_body = $body;
	}

	public function respond() {
		header('HTTP/1.1 '.$this->getCode());

		foreach ($this->_headers as $key => $value) {
			header($key.': '.$value);
		}

		echo $this->getBody();
	}


}