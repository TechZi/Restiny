<?php

/**
 * 配置载入器 
 * 
 * @author Zhangyuyi
 * @version $Id$
 *
 */

class ConfigLoader {
	public function loadConfig($configFileName, $configDirectoryPath = '') {
		if (empty($configDirectoryPath)) {
			$configDirectoryPath = APP_PATH.DIRECTORY_SEPARATOR.'config';
		}

		//TODO 进程级的缓存
		$configFilePath = $configDirectoryPath . DIRECTORY_SEPARATOR . $configFileName.'.php';

		if (!file_exists($configFilePath)) {
			throw new RestinyFileNotFoundException($configFileName.' config file not found', 0);
		}

		return require_once $configFilePath;
	}
}