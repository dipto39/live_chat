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
 $vkey=md5($email.time()) ;           
 $obj->select("users","Email",null,"Email = '$email'",null,null);
$res=$obj->show_result();
 if(count($res[0]) > 0){
     echo"<script>alert('email is already heare')</script>";
 }else{    
    $arr=["full_name"=>$fname,"Email"=>$email,"pass"=>$pass,"up"=>$up,"vkey"=>$vkey,"verify"=>0];
   if($obj->insert("users",$arr)){
       if(move_uploaded_file($_FILES['rpp']['tmp_name'],"admin/up/".$up)){
        $to=$email;
        $sub="verify your email";
        $mes='verify email -> "http://localhost/live_chat/verify.php?vkey='.$vkey.'"';
        $from="support@dipto.ga";
        $header="From: $from";
        if(mail($to,$sub,$mes,$header)){
            echo "<script>alert('we sent a verifycation link in your mail.please verify to login')</script>.";
        }
       }

   }
 }
?>