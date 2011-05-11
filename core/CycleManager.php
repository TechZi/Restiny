<?php
/**
 * 请求管理类。将一次请求-响应做为一个cycle
 *
 * @author Zhangyuyi
 * @version $Id$
 */
class CycleManager {
	public static function run() {
		try {
			$request = new Request();
			$response = new Response();

			if (!Representor::isVaildHttpAccept($request->getRequesetAccept())) {
				throw new RestinyRepresentorException('HTTP Accept is not support', Response::METHOD_NOT_ALLOWED);
			}

			$representorName = ucfirst($request->getRequesetAccept()) . 'Representor';
			$representor = new $representorName;

			$resource = ResourceRouter::loadResource($request->getRequestUri());
			$requestMethod = strtolower($request->getRequestMethod());
			if (!method_exists($resource, $requestMethod)) {
				throw new RestinyResourceException('Resource is not support [' . $requestMethod . '] method', Response::METHOD_NOT_ALLOWED);
			}
			$resource->$method();

			$response->setCode(Response::OK);
			$response->setHeader('Content-type', $representor->getContentType());
			$response->setBody($representor->generateRepresentor($resource->getOutputData()));

			$response->respond();
			
		} catch (RestinyHttpException $e) {
			$response = new Response();

			$response->setCode($e->getCode());
			$response->setBody($e->getMessage());

			$response->respond();

			exit();
		}
	}

}
