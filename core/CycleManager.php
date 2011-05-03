<?php
/**
 * 请求管理类。将一次请求-响应做为一个cycle
 *
 * @author zhangyuyi
 * @version $Id$
 */
class CycleManager {
	public static function run() {
		try {
			$request = new Request();
			$response = new Response();

			$resource = ResourceRouter::loadResource($request, $response);

			$requestMethod = strtolower($request->getRequestMethod());

			if (method_exists($resource, $requestMethod)) {
				$resource->$method();
			}
		} catch (RestinyHttpException $e) {
			$response = new Response();

			$response->setCode($e->getCode());
			$response->setBody($e->getMessage());

			$response->respond();

			exit();
		}
	}

}
