<?php
include "db/database.php";
$obj=new database();
if(isset($_GET['vkey'])){
    $vkey=$_GET['vkey'];
    $obj->select("users","*",null,"vkey='$vkey' and verify = '0'",null,null);
    $res=$obj->show_result();
    if(count($res[0]) > 0){
        $arr=["verify" =>1];
     	 if($obj->update("users",$arr,"vkey = '$vkey'")){
          		       $uid=$res[0][0]['uid'];
                       $table=$res[0][0]['full_name'].$uid;
                       $table = str_replace(' ', '', $table);
                       $ctable="C".$table;
                       $sqli="CREATE TABLE $table(mid int NOT null AUTO_INCREMENT,uid int,sms varchar(5000),sorr varchar(2),tm TIMESTAMP DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(mid))";
           				if( $obj->addtable($sqli)){
                      	 $sqli1="CREATE TABLE $ctable(cid int NOT null AUTO_INCREMENT,uid int,fname varchar(100),up varchar(500),lsms varchar(5000),new_sms int,PRIMARY KEY(cid))";                        
                        if($obj->addtable($sqli1)){
                             session_start();
                             $_SESSION['uid']=$uid;
                             $_SESSION['fname']=$res[0][0]['full_name'];
                             $_SESSION['up']=$res[0][0]['up'];
      					 echo '<script>window.location.replace("http://localhost/live_chat/user");</script>';
                          
                       		 }
                        }
                       
      			}
      
    }else{
        echo "The account is already verified or you entered the wrong key";
    }
}else{
    echo "Something went wrong";
}

?>