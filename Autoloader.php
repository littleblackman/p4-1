<?php
class Autoloader{
	public static function register()
	{
    	//spl_autoload_register(array(__CLASS__, 'autoload'));
    	spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
    }
	/*public static function autoload($class)
	{
		if(file_exists(model.$class.'.php'))
		{
			include_once (model.$class.'.php');
		}else if(file_exists(index.$class.'.php'))
		{
			include_once (index.$class.'.php');
		}else if(file_exists(controller.$class.'.php'))
		{
			include_once (controller.$class.'.php');
		}
    	
    }*/
 
}