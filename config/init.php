<?
session_start();
require("db.php");
require("func.php");
require("admin/config/dbconfig.php");
$link=getlink();
$db->seo($cmd, $id, $link, $data);


?>