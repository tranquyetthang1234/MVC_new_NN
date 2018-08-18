<?php

define("BASE_DIR", "/tintuc/");
  $config = "http".((isset($_SERVER['HTTPS'])
   && !empty($_SERVER['HTTPS'])) ? "s" : "")."://".$_SERVER['HTTP_HOST'].BASE_DIR;
define("BASE_URL",$config);
//define('BASE_BACK', $_SERVER['HTTP_REFERER']);
define("HOST", "localhost");
define('DB_NAME',  "tintuc");
define('USER_DB', "root");
define('PASS_DB', " ");
define('DEFAULT_CONTROLLER','baiviet');
define('DEFAULT_ACTION','index');
