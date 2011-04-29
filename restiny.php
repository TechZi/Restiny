<?php

define('APP_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'app');
define('CORE_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'core');

class Restiny {
	private static $_instance;

	public static function getInstance() {
		if (empty(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function init() {
		spl_autoload_register(array($this, '_autoload'));

		CycleManager::run();
	}

	private function _autoload($className) {
		$file = $this->_findFile($className);

		if ($file) {
			require $file;

			return true;
		}

		return false;
	}

	private function _findFile($className) {
		$appFilePath = APP_PATH.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.$className.'.php';

		$coreFilePath = CORE_PATH.DIRECTORY_SEPARATOR.$className.'.php';

		return file_exists($appFilePath) ?
					$appFilePath :
					file_exists($coreFilePath) ?
						$coreFilePath :
						false;
	}
}

function d() {
	$args = func_get_args();
	foreach ($args as $arg) {
		var_dump($arg);
	}
}