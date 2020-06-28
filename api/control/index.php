
<?php
session_start();
ob_start();
require "./connect/DbCon.php";
require "./connect/truyvan.php";
?>
<?php

// kiem tra dang nhap
 if(isset($_POST["btnlogin"]))
 {
   $Email = $_POST["Email"];
   $Password = $_POST["Password"];
   // truy van
   $sql ="
   SELECT * from admin
   where Email ='$Email'
   and Password = '$Password'
   ";
   $admin = mysql_query($sql);
   
   if(mysql_num_rows($admin)>0) {
     // dang nhap ddung
     $row = mysql_fetch_array($admin);
     $_SESSION["Id"] = $row ['Id'];
     $_SESSION["Name"] = $row ['Name'];
     $_SESSION["Email"] = $row ['Email'];
     header('Location:./sanpham/index.php');
   }else{
    echo " <script> alert('Tên đăng nhập và mật khẩu không đúng, vui lòng thử lại') </script>";
   }
  
 }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Panel App Shop Online</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index2.html"><b>System</b>App Bán Hàng</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Thông tin đăng nhập</p>
                <!--from dang nhap-->
                <form method="post">

<div class="form-group has-feedback">
  <input type="txt" id= "Email" name = "Email" class="form-control" placeholder="Tên đăng nhập" required>
</div>
<div class="form-group has-feedback">
  <input type="Password" id="Password" name="Password" class="form-control" placeholder="Mật khẩu" required>
</div>
<div class="row">
  <div class="col-8">
    <div class="checkbox icheck">
      
    </div>
  </div>

  <div class="col-4">
    <button  name="btnlogin" id ="btnlogin" type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
  </div>

</div>
</form>
            
                           
     
  

   
    </div>
   
  </div>
</div>

<script src="./plugins/jquery/jquery.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
