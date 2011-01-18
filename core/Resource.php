<?php

class Resource {
	/**
	 * Request对象引用
	 * 
	 * @var Request
	 */
	private $_request = null;
	
	/**
	 * Response对象引用
	 * 
	 * @var Response
	 */
	private $_response = null;	
	
	public function __construct(Request $request, Response $response) {
		$resourcesConfig = Config::loadConfig('resources');
		
	}
}