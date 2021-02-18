<?php

// ini_set("display_errors", "stderr");  //ini_set函数作用：为一个配置选项设置值，
// error_reporting(E_ALL);     //显示所有的错误信息

include("core/db.php");

session_start();

if(isset($_SESSION['uid'])){
$uid = $_SESSION['uid'];
}
else if($_SERVER['PHP_SELF'] != "/start/login.php" && $_SERVER['PHP_SELF'] != "/start/reg.php"){
    header("refresh:0; url=login.php");
	exit;
}


?>

<div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                
                <li role="presentation"><a href="/start/index.php">首页</a></li>
                <?php

if(isset($uid)){
  echo   '<li role="presentation"><a href="/start/logout.php">注销</a></li>';

}
else{
    echo '<li role="presentation"><a href="/start/login.php">登录</a></li>';
}

if(!isset($uid)){
    echo '<li role="presentation"><a href="/start/reg.php">注册</a></li>';
  }
  

                ?>
                
                
            </ul>
        </nav>
        <h3 class="text-muted">NULL INFO</h3>
</div>