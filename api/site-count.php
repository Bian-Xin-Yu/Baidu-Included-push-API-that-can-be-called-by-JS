<?php
header('Access-Control-Allow-Origin: *');
require_once './api-database.php';
$Http = $_SERVER["QUERY_STRING"];
if ($Http == null){
	exit('参数不合法');
}
$outValue = Query_the_count_of_site_in_Site($Http);
if (is_numeric($outValue)){
	echo $outValue;
}else{
	exit($outValue);
}
?>
