<?php

/**
 * Restiny Http异常处理类
 *
 * @author zhangyuyi
 * @version $Id$
 */

class RestinyHttpException extends RestinyException {
	public function __construct($message, $code) {
		$response = new Response();

		$response->setCode($code);
		$response->setBody($message);

		$response->respond();
	}
}