<?php
session_start();
include "db/database.php";
$db=new database();
$sms=$_POST['sms'];
$ouid=$_POST['id'];
 $db->select("users","uid,full_name",null,"uid = $ouid",null,null);
$res=$db->show_result();
$fname=$res[0][0]['full_name'];
$user_table= str_replace(' ', '', $fname);
$user_table=$user_table.$ouid;

 $table=$_SESSION['fname'].$_SESSION['uid'];
 $table = str_replace(' ', '', $table);

$arr=['uid'=>$ouid,'sms'=>$sms,'sorr'=>'s'];
$db->insert($table,$arr);

$muid=$_SESSION['uid'];
$arr2=['uid'=>$muid,'sms'=>$sms,'sorr'=>'r'];
$db->insert($user_table,$arr2);

echo $sender_ctable="C".$table;
$suid=$_SESSION['uid'];
$sarr=["lsms"=>$sms];
if($db->update($sender_ctable,$sarr," uid=$ouid")){
}
$recevar_ctable="C".$user_table;
$rarr=["lsms"=>$sms];
$db->update($recevar_ctable,$rarr," uid=$suid");
$new_sms_arr=["new_sms"=>"new_sms +1"];
if($db->update_a($recevar_ctable,$new_sms_arr," uid=$suid")){
}
?>