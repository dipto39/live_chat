<?php 
include "db/database.php";
$db=new database();
session_start();
$id=$_SESSION['uid'];
$now="now()";
$arr=["status" =>$now];
if($db->update_a('users',$arr,"uid =$id")){
    
}else{
    print_r($db->show_result());
}


?>