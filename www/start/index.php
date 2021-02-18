
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

    $mysql = new MMysql();

    $res = $mysql->field('id,username,remark')
    ->where('id="'.$_SESSION['uid'].'"')
    ->select('users');

?>
    
        <table class="table table-condensed">
            <caption>User Info:</caption>
            <tbody>
                <tr>
                <td>Id:</td>
                <td><?php echo $res[0]['id']; ?></td>
                </tr>
                 <tr>
                <td>UserName:</td>
                <td><?php echo $res[0]['username']; ?></td>
                </tr>
                <td>Remark:</td>
                <td><?php echo $res[0]['remark']; ?></td>
                </tr>
            </tbody>
            </table>
            <!-- All Check is Using Session. -->

<?php
include('footer.php')
?>
 
</div> <!-- /container -->
</body>
</html>