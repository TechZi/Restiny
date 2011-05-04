<?php

require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'testBootstrap.php');
require_once dirname(__FILE__) . '/../../core/Request.php';

/**
 * Test class for Request.
 * Generated by PHPUnit on 2011-05-04 at 04:04:52.
 */
class RequestTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Request
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {

	}

	/**
	 * @todo Implement testSetRequestParams().
	 */
	public function testSetRequestParams() {

	}

	/**
	 * @todo Implement testGetRequestParams().
	 */
	public function testGetRequestParams() {

	}

	/**
	 * @todo Implement testGetRequestMethod().
	 */
	public function testGetRequestMethod() {

	}

	/**
	 * @todo Implement testGetRequestUri().
	 */
	public function testGetRequestUri() {

	}

	/**
	 * @todo Implement testIsVaildRequestMethod().
	 */
	public function testIsVaildRequestMethod() {

	}

	public function testRequestConstructException() {
		$_SERVER['REQUEST_METHOD'] = 'getc';
		$_SERVER['REQUEST_URI'] = '/feed/';

		$this->setExpectedException('RestinyHttpException', 'Request method is not allowed');

		$request = new Request();
	}

	public function testRequestConstruct() {
		$_SERVER['REQUEST_METHOD'] = 'get';
		$_SERVER['REQUEST_URI'] = '/feed/myFeed.json';

		$_GET = array(
			'uid' => '1000000001',
			'uname' => 'zhangyy'
		);

		$request = new Request();

		$this->assertEquals('GET', $request->getRequestMethod());
		$this->assertEquals('/feed/myFeed.json', $request->getRequestUri());
		$this->assertEquals('json', $request->getRequesetAccept());


		$this->assertEquals($_GET, $request->getRequestParams());
	}

}

?>
