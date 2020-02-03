<?php
class Autoloader{
	public static function register()
	{
		
		// CREER LES CONSTANTES
		// exemple define('MODEL', 'D:\wamp\www\P4\model\';
		
    		spl_autoload_register(array(__CLASS__, 'autoload'));
	}
	
	public static function autoload($class)
	{
		if(file_exists(MODEL.$class.'.php'))
		{
			include_once ($class.'.php');
		}else if(file_exists(CORE.$class.'.php'))
		{
			include_once (CORE.$class.'.php');
		}else if(file_exists(CONTROLLER.$class.'.php'))
		{
			include_once (CONTROLLER.$class.'.php');
		}
    	
    }
 
}
