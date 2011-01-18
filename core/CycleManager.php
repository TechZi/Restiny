<?php

class CycleManager {
	public static function run() {
		try {
			$request = new Request();
	
			$resource = ResourceRouter::loadResource($request, $resource);
	
			$requestMethod = strtolower($request->getRequestMethod());
					
			if (method_exists($resource, $requestMethod)) {
				$resource->$method();
			}
		} catch (RestinyHttpException $e) {
			echo $e->getMessage();
			
		} catch (Exception $e) {
			$e;
		}
		
	}
	
}
