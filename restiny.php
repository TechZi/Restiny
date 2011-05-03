<?php
/**
 * Restiny框架引导类
 *
 * @author zhangyuyi
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
		//TODO 需要改进查找文件的方法
		$appFilePath = APP_PATH.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.$className.'.php';
		
//		$coreFilePath = CORE_PATH.DIRECTORY_SEPARATOR.$className.'.php';
			
		$iterator = new RecursiveDirectoryIterator(CORE_PATH);
		
		$coreFilePath = $this->_recursiveFindFile($iterator, $className);
		
//		var_dump($coreFilePath);

		return file_exists($appFilePath) ?
					$appFilePath :
					file_exists($coreFilePath) ?
						$coreFilePath :
						false;
	}

	private function _recursiveFindFile(RecursiveDirectoryIterator $iterator, $className) {
		for ( ; $iterator->valid(); $iterator->next()) {
			if ($iterator->isDot()) {
				continue;
			}
			var_dump(strval($iterator->getFilename()));
			if ($iterator->isFile() && $className == strstr($iterator->getFilename(), '.', true)) {
				return strval($iterator->current());
			}

			if ($iterator->isDir() && $iterator->hasChildren()) {
				$this->_recursiveFindFile($iterator->getChildren(), $className);
			}

		}
	}
}
$r =new Restiny();
$r->init();

function d() {
	$args = func_get_args();
	foreach ($args as $arg) {
		var_dump($arg);
	}
}