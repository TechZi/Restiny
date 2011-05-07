<?php

/**
 * Restiny Http异常处理类
 *
 * @author Zhangyuyi
 * @version $Id$
 */

class RestinyHttpException extends RestinyException {
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}