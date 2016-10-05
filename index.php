<?php
define('ROOT', dirname(__FILE__) . '/');
define('APP', dirname(__FILE__) . '/app/');
define('IMG_DIR', dirname(__FILE__) . '/app/images/');

include ROOT . 'autoload.php';

//Стартанем ;)
app::getInstance()->start();