<?php 

use PMMigration\Tables as Table;

require_once "config.php";
require_once "autoload.php";

// Connect with DataBase
$DB = new PMMigration\Core\DB($config);

// Create table
$DB->add(new Table\UserTable());