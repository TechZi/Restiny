<?php
/**
 * Restiny资源未找到异常类
 *
 * @author zhangyuyi
 * @version $Id$
 */

class RestinyResourceNotFoundException extends RestinyException {
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}