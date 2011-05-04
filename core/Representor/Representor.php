<?php

class Representor {
	public static function isVaildHttpAccept($httpAccept) {
		return in_array(strtolower($httpAccept), array('json', 'html', 'xml'));
	}


}