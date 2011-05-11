<?php

/**
 * Resource 导航器
 *
 * @author Zhangyuyi
 * @version $Id$
 */

class ResourceRouter {
	/**
	 * 载入Resource
	 *
	 * @param Request $request
	 */
	public static function loadResource($requestUri, array $resourcesConfig = array(), $resourceFilePath = '') {
		if (empty($resourcesConfig)) {
			$resourcesConfig = ConfigLoader::loadConfig('resources');	
		}	

		if (empty($resourceFilePath)) {
			$resourceFilePath = APP_PATH.DIRECTORY_SEPARATOR.'resources';
		}	
		
		foreach ($resourcesConfig as $uri => $resourceName) {
			preg_match('#'.$uri.'#', $requestUri, $matches);

			if (empty($matches)) {
				continue ;
			}

			foreach ($matches as $key => $match) {
				if (is_int($key)) {
					continue ;
				}

				$requestParams[$key] = $match;
			}
			
			if (!empty($matches) && !empty($requestParams)) {
				break ;
			}
		}

		$resourceName = $resourceName . 'Resource';
		$resourceFile = $resourceFilePath . DIRECTORY_SEPARATOR . $resourceName . '.php';	

		if (!file_exists($resourceFile)) {
			throw new RestinyResourceException('Resource not found', Response::NOT_FOUND);
		}

		require_once($resourceFile);

		if (!class_exists($resourceName, false)) {
			throw new RestinyResourceException('Resource not found', Response::NOT_FOUND);
		}

		$resource = new $resourceName($requestParams);

		return $resource;
	}

}