
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NULL INFO</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="header clearfix">
 
<?php
include("header.php");
?>
    

    <?php


if(isset($_POST["username"]) && isset($_POST["password"])){

    $mysql = new MMysql();

    $res = $mysql->field('id,username,password,remark')
    ->where('username="'.$_POST["username"].'" and password="'.$_POST["password"].'"')
    ->select('users');

    if(count($res)===0){
        $message = "用户名或密码错误";
    }else if(count($res) > 0){
    $_SESSION['uid'] = $res[0]['id'];
        header("refresh:0; url=index.php");
    exit;
    }
    else {
        $message = "账号异常";
    }

}


?>

    
        <div class="row">

        <?php 
  if(isset($message)){
echo '<div class="alert alert-danger text-center" role="alert">'.$message.'</div>';
}
?>
            <form action="" class="col-lg-6 col-lg-offset-3" method="post">
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" class="form-control" name="password" placeholder="" required>
                </div>

                <p></p>
                <button class="btn btn-primary pull-right" lay-filter="login" type="submit">登录</button>

            </form>
            </div>


        <br/>


        <?php
include('footer.php')
?>
 

 
</div> <!-- /container -->
</body>
</html>