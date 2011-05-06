<?php

class ConfigLoader {
	private $_configDirectoryPath = '';

	public function __construct($configDirectoryPath = '') {
		if (!empty($configDirectoryPath)) {
			$this->_configDirectoryPath = $configDirectoryPath;

			return ;
		}

		$this->_configDirectoryPath = APP_PATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR;
	}

	public function loadConfig($configFileName) {
		$configFilePath = $this->_configDirectoryPath . $configFileName.'.php';
d($configFilePath);
		if (!file_exists($configFilePath)) {
			throw new RestinyFileNotFoundException($configFileName.' file not found', 0);
		}

		return require $configFilePath;
	}

	public function setConfigDirectoryPath($path) {
		$this->_configDirectoryPath = $path;
	}
}