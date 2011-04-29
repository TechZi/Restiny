<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'testIndex.php';
/**
 * test case.
 */
class TestRequest extends PHPUnit_Framework_TestCase {

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		// TODO Auto-generated TestRequest::setUp()
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated TestRequest::tearDown()
		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	public function testRequestConstructException() {
		$_SERVER['REQUEST_METHOD'] = 'getc';
		$_SERVER['REQUEST_URI'] = '/feed/';
//		$this->setExpectedException('RestinyHttpException', 'Request method is not allowed');

		$request = new Request();
		d($request);
	}

	public function testRequestConstruct() {
		$_SERVER['REQUEST_METHOD'] = 'get';
		$_SERVER['REQUEST_URI'] = '/feed/';

		$_GET = array(
			'uid' => '1000000001',
			'uname' => 'zhangyy'
		);

		$request = new Request();

		$this->assertEquals('GET', $request->getRequestMethod());
		$this->assertEquals('/feed/', $request->getRequestUri());

		$this->assertEquals($_GET, $request->getRequestParams());
	}

}

