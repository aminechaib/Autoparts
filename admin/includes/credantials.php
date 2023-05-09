<?php 

define("DB_SERVER", "localhost");
define("DB_USER", "root");
if(PHP_OS == 'WINNT'){
    define("DB_PASS", "");
}else{
    define("DB_PASS", "");
}
define("DB_NAME", "autopart_db");