<?php
require_once("config.php");
spl_autoload_register(function ($class){
    require_once( __DIR__.'/model/' . $class . '.php');
},true);


