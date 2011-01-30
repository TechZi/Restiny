<?php

class Resource {
	/**
	 * Request对象引用
	 * 
	 * @var Request
	 */
	protected $request = null;
	
	/**
	 * Response对象引用
	 * 
	 * @var Response
	 */
	protected $response = null;	
	
	public function __construct(Request $request, Response $response) {
//		$resourcesConfig = Config::loadConfig('resources');

		$this->request = $request;		
		
		$this->response = $response;
	}
	
	
}