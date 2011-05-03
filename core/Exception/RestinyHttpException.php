<?php

class RestinyHttpException extends RestinyException {
	public function __construct($message, $code) {
		$response = new Response();

		$response->setCode($code);
		$response->setBody($message);

		$response->respond();
	}
}