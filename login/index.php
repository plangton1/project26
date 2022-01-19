<?php
@include('../connection/connection.php');
if (isset($_POST) && !empty($_POST)) {
    //  echo '<pre>';
    //  print_r($_POST);
	//  echo '</pre>';
     $username = $_POST['username'];
     $password = $_POST['password'];
    //  print_r($_POST);
     $sql = "SELECT * FROM user_tb WHERE username = '".$username."' AND password = '".$password."'";
     $query = sqlsrv_query($conn, $sql);
    //  print_r($query);
     $row = sqlsrv_num_rows($query);

     if ($row == 0) {
        $result = sqlsrv_fetch_array($query , SQLSRV_FETCH_ASSOC);
        $_SESSION['user_login'] = $result['username'];
        $_SESSION['role_login'] = $result['role'];

     if ($_SESSION['role_login']  == 'admin') {
         $alert = '<script type="text/javascript">';
         $alert .= 'alert("WELCOME ADMIN");';
         $alert .= 'window.location.href = "./index.php";';
         $alert .= '</script>';
         echo $alert;
         exit();
}       if ($_SESSION['role_login']  == 'head') {
    $alert = '<script type="text/javascript">';
    $alert .= 'alert("WELCOME HEAD");';
    $alert .= 'window.location.href = "./standard_head/index.php";';
    $alert .= '</script>';
    echo $alert;
    exit();
} 
} else {
    $alert = '<script type="text/javascript">';
    $alert .= 'alert("Username and Password ไม่ถูกต้อง !!");';
    $alert .= 'window.location.href = "";';
    $alert .= '</script>';
    echo $alert;
    exit();
}
     
}
?>
<?php
require 'head.php' ;
?>
<?php include 'style.php' ; ?>

<div class="container  text-center mt">
    <p class="mb-1 font2 font mt">ระบบติดตามเอกสารมาตรา 5</p>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first ">
            <img src="https://www.tistr.or.th/images/tistr-logo-s.png" id="icon" alt="User Icon" />
        </div>

        <form method="POST" action="" >
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="Login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
    </div>
</div>