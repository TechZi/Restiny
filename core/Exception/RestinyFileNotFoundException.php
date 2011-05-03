<?php

/**
 * Restiny文件未找到异常
 *
 * @author zhangyuyi
 * @version $Id$
 */

class RestinyFileNotFoundException extends RestinyException {

	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}
