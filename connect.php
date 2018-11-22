<?php
DEFINE('host','localhost');
DEFINE('user','riddhijain');
DEFINE('pass','');
DEFINE('databasename','Homs');
global $db_con;
$db_con= mysqli_connect(host,user,pass,databasename);

if(!$db_con)
{
die('error connecting to the database');
}
?>
