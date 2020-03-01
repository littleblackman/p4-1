 <?php

 session_start();
 include_once('_config.php');
 Autoloader::register();
 require_once(ROUTER.'Router.php');
$routeur = new Routeur();
$routeur->route();
