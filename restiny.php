<?php
/**
 * Restiny框架引导类
 *
 * @author Zhangyuyi
 * @version $Id$
 */

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

	public function init($isWantToRun = true) {
		spl_autoload_register(array($this, '_autoload'));

		if ($isWantToRun) {
			CycleManager::run();
		}
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
		$appFilePath = '';
		$coreFilePath = '';

		$appIterator = new RecursiveDirectoryIterator(APP_PATH);
		$this->_recursiveFindFile($appIterator, $className, $appFilePath);
		if (file_exists($appFilePath)) {
			return $appFilePath;
		}

		$coreIterator = new RecursiveDirectoryIterator(CORE_PATH);
		$this->_recursiveFindFile($coreIterator, $className, $coreFilePath);
		if (file_exists($coreFilePath)) {
			return $coreFilePath;
		}

		return false;
	}

	private function _recursiveFindFile(RecursiveDirectoryIterator $iterator, $className, &$filePath) {
		for ( ; $iterator->valid(); $iterator->next()) {
			if ($iterator->isDot()) {
				continue;
			}

			if ($iterator->isDir() && $iterator->hasChildren()) {
				$this->_recursiveFindFile($iterator->getChildren(), $className, $filePath);
			}

			if ($iterator->isFile() && $className == strstr($iterator->getFilename(), '.', true) && substr($iterator->getFilename(), -3) == 'php') {
				$filePath = strval($iterator->current());

				return ;
			}

		}
	}
}


function d() {
	$args = func_get_args();
	foreach ($args as $arg) {
		var_dump($arg);
	}
}