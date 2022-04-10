<?php
include "db/database.php";
$db=new database();
$email=$_POST['lemail'];
$pass=sha1($_POST['lpass']);
$db->select("users","*",null,"email ='$email' and pass='$pass'",null,null);
$res=$db->show_result();
if(count($res[0]) > 0){
    $db->select("users","*",null,"email ='$email' and verify='1'",null,null);
    $res2=$db->show_result();
    if(count($res2[0]) > 0){
        $uid=$res[0][0]['uid'];
        $fname=$res[0][0]['full_name'];
        $up=$res[0][0]['up'];
        session_start();
        $_SESSION['uid']=$uid;
        $_SESSION['fname']=$fname;
        $_SESSION['up']=$up;
        echo '<script>window.location.replace("http://localhost/live_chat/user");</script>';
    }else{
        echo"<script>alert('your email are not veryfied')</script>";
    }
   
}else{
    echo"<script>alert('Email or password not match')</script>";

}

?>