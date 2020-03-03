<?php
/**
 * 
 */
class Session
{
	
	public function __construct()
	{
		session_start();
	}
	public function setFlash($message)
	{
		$_SESSION['flash'] = $message;
	}
	public function getFlash()
	{
		$message = null;
		if(isset($_SESSION['flash']))
		{ 	
			$message = $_SESSION['flash'];
			unset($_SESSION['flash']);
		}
		return $message;
	}
}
