<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestinyResourceException
 *
 * @author Dell
 */
class RestinyResourceException extends RestinyException {
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}

?>
