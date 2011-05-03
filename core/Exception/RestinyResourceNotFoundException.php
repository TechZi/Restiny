<?php
/**
 * @version $Id$
 */

class RestinyResourceNotFoundException extends RestinyException {
	public function __construct($message, $code) {
		$response = new Response();

		$response->setCode($code);
		$response->setBody($message);

		$response->respond();
	}
}