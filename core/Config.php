<?php

class Config {
	public static function loadConfig($configFileName) {
		$configFilePath = APP_PATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$configFileName.'php';
		
		if (!file_exists($configFilePath)) {
			throw new RestyFileNotExistException();	
		}
		
		require $configFilePath;
			
		return ;	}
}