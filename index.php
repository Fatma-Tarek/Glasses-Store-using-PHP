<?php

    require_once("autoload.php");
    define("_ALLOW_ACCESS",1);
    $db = new MySQLHandler("items");
    if(isset($_GET["index"]) && is_numeric($_GET["index"])){	
        require_once("views/single.php");
    }else{
        require_once("views/all.php");
		
    }



