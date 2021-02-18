<?php
$_SESSION=array();
setCookie("PHPSESSID","",time()-1,"/");
    header("refresh:0; url=login.php");
	exit;
?>