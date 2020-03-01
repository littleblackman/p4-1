<?php
class Autoloader{
	public static function register()
	{
		ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
		$root = $_SERVER['DOCUMENT_ROOT'];
		$host = $_SERVER['HTTP_HOST'];

		define('HOST', 'http://'.$host.'/projet4/');
		define('ROOT', $root.'/projet4/');

		define('CONTROLLER', ROOT.'controller/');
		define('VIEW', ROOT.'view/');
		define('MODEL', ROOT.'model/');
		define('ROUTER', ROOT.'router/');
		define('ISSET', ROOT.'public/');
		
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}
	
	public static function autoload($class)
	{
		if(file_exists(MODEL.$class.'.php'))
		{
			include_once (MODEL.$class.'.php');
		}else if(file_exists(VIEW.$class.'.php'))
		{
			include_once (VIEW.$class.'.php');
		}else if(file_exists(CONTROLLER.$class.'.php'))
		{
			include_once (CONTROLLER.$class.'.php');
		}
		else if(file_exists(ROUTER.$class.'.php'))
		{
			include_once (ROUTER.$class.'.php');
		}
		
    	
    }
 
}


