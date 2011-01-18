<?php

class ResourceRouter {
	/**
	 * 载入Resource
	 * 
	 * @param Request $request
	 */	
	public static function loadResource(Request $request, Response $response) {
		$resourcesConfig = Config::loadConfig('resources');	
		
		$requestUri = $request->getRequestUri();
		foreach ($resourcesConfig as $config) {
			preg_match('#'.$config.'#', $requestUri, $matches);
			
			if (empty($matches)) {
				continue ;
			}		

			$resourceName = $config;
			$requestParams = $request->getRequestParams();
			foreach ($matches as $key => $match) {
				if (is_int($key)) {
					continue ;
				}
				
				$requestParams[$key] = $match;	
			}
				
		}
		
		$request->setRequestParams($requestParams);

		$resourceFilePath = APP_PATH.DIRECTORY_SEPARATOR.$resourceName.'.php';
		
		if (!file_exists($resourceFilePath)) {
			throw RestinyResourceNotFoundException(Response::NOT_FOUND, 'Resource not found');
		}
		
		require_once($resourceFilePath);	
		
		if (!class_exists($resourceName, false)) {
			throw RestinyResourceNotFoundException(Response::NOT_FOUND, 'Resource not found');
		}
		
		$resource = new $resourceName($request, $response);
		
		return $resource;	

		/**
		$method = strtolower($request->getRequestMethod());
				
		if (method_exists($resource, $method)) {
			$resource->$method();
		}
		**/
		
	}
	
}