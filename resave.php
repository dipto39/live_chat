<?php

use function PHPSTORM_META\type;

include "db/database.php";
$obj=new database();
 $fname=$_POST['rfname']." ".$_POST['rlname'] ;
 $email=$_POST['remail'];
 $pass=sha1($_POST['rpass']);
 $up=$_FILES['rpp']['name'];
 $up=time().$up;
 $up=$up;
 $phn=$_POST['rnum'];             
 $obj->select("users","*",null,"Email = '$email'",null,null);
$res=$obj->show_result();
 if(count($res[0]) > 0){
     echo"<script>alert('email is already heare')</script>";
 }else{    
    $arr=["full_name"=>$fname,"Email"=>$email,"pass"=>$pass,"up"=>$up];
   if($obj->insert("users",$arr)){
       move_uploaded_file($_FILES['rpp']['tmp_name'],"admin/up/".$up);
       $obj->select("users","uid",null,"email = '$email'",null,null);
       $re2=$obj->show_result();
       $uid=$re2[1][0]['uid'];
       $table=$_POST['rfname'].$_POST['rlname'].$uid;
       $ctable="C".$table;
       $sqli="CREATE TABLE $table(mid int NOT null AUTO_INCREMENT,uid int,sms varchar(5000),sorr varchar(2),tm TIMESTAMP DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(mid))";
       $obj->addtable($sqli);
       $sqli1="CREATE TABLE $ctable(cid int NOT null AUTO_INCREMENT,uid int,fname varchar(100),up varchar(500),lsms varchar(5000),new_sms int,PRIMARY KEY(cid))";
       $obj->addtable($sqli1);
       session_start();
       $_SESSION['uid']=$uid;
       $_SESSION['fname']=$fname;
       $_SESSION['up']=$up;
       echo ' <script>window.location.replace("http://dipto.cf/live_chat/user.php");</script>';
   }
 }
?>