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
	public static function loadResource(Request $request, Response $response) {
		$configLoader = new ConfigLoader();
		$resourcesConfig = $configLoader->loadConfig('resources');

		$requestUri = $request->getRequestUri();

		foreach ($resourcesConfig as $uri => $resourceName) {
			preg_match('#'.$uri.'#', $requestUri, $matches);

			if (empty($matches)) {
				continue ;
			}

			$requestParams = $request->getRequestParams();
			foreach ($matches as $key => $match) {
				if (is_int($key)) {
					continue ;
				}

				$requestParams[$key] = $match;
			}

		}

		$request->setRequestParams($requestParams);

		$resourceFilePath = APP_PATH.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.$resourceName.'.php';

		if (!file_exists($resourceFilePath)) {
			throw new RestinyResourceException('Resource not found', Response::NOT_FOUND);
		}

		require_once($resourceFilePath);

		if (!class_exists($resourceName, false)) {
			throw new RestinyResourceException('Resource not found', Response::NOT_FOUND);
		}

		$resource = new $resourceName($requestParams);

		return $resource;
	}

}