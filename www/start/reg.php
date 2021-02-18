
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

<?php
include("header.php");
?>
    <?php

 

if(isset($_POST["username"]) && isset($_POST["password"]) ){

try {
       $mysql = new MMysql();
 
 $res = $mysql->field('id')
    ->where('username="'.$_POST["username"].'"')
    ->select('users');


       if(count($res)===0){
 $sql =  "insert users(username,password,remark) values('".$_POST["username"]."','".$_POST["password"]."','请获取admin的密码，从而得到key')";
     $message = $mysql->doSql($sql);

      if($message === 1){
         $message = "注册成功";
      }else{
         $message = "注册失败";
      }
    }
    else{
                 $message = "用户名存在，不能注册";
    }


 
} catch (Exception $e) {
         $message = "注册失败";

}



}

?>

        <div class="row">

        <?php 
  if(isset($message)){
echo '<div class="alert alert-'.($message === "注册成功" ? "success" :"danger").' text-center" role="alert">'.$message.'</div>';
}
?>

            <form action="" method="post" class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label>用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名" required>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" class="form-control" name="password" placeholder="请输入密码" required>
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" class="form-control" name="q_password" placeholder="请输入确认密码" required>
                </div>
                <p></p>
                <button class="btn btn-primary pull-left" type="submit">注册</button>
            </form>
            </div>
        <br/>

        <?php
include('footer.php')
?>
 
</div> <!-- /container -->
</body>
</html>