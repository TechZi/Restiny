<?php

/**
 * 所有Restiny异常类的父类
 *
 * @author Zhangyuyi
 * @version $Id$
 */
class RestinyException extends Exception {
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}

?>
