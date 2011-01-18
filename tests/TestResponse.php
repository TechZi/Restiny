<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'testIndex.php';

/**
 * test case.
 */
class TestResponse extends PHPUnit_Framework_TestCase {
	private $_response = null;
	
	
	protected function setUp() {
		parent::setUp ();
	
		$this->_response = new Response();
	}
	
	protected function tearDown() {
		// TODO Auto-generated TestResponse::tearDown()
		parent::tearDown ();
		
		unset($this->_response);
	}
	
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	public function testSetResponseCode() {
		$code = Response::NOT_FOUND;
	
		$this->_response->setResponseCode($code);
		
		$this->assertEquals($code, $this->_response->getResponseCode());
	}
	
	public function testRespond() {
		
	}	
}

