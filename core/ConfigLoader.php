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
		$configFilePath = $this->_configDirectoryPath . DIRECTORY_SEPARATOR . $configFileName.'.php';

		if (!file_exists($configFilePath)) {
			throw new RestinyFileNotFoundException($configFileName.' file not found', 0);
		}
		
		$fileContent = require_once $configFilePath;

		return require_once $configFilePath;
	}

	public function setConfigDirectoryPath($path) {
		$this->_configDirectoryPath = $path;
	}
}