<?php
include "db/database.php";
$db=new database();
session_start();
$table="C".$_SESSION["fname"].$_SESSION["uid"];
$table=str_replace(' ', '', $table);
$db->select($table,"*",null,null,null,null);
$res=$db->show_result();
foreach($res[0] as list("status"=>$status,"uid"=>$uid)){
    $db->select("users","*",null,"WHERE uid=$uid AND TIMESTAMPDIFF(MINUTE, status, NOW()) > 20");
    if($status >=date('d-m-y h:i:s')){
        echo "<p style='color:green'>Online</p>";
    }else{
        echo "<p style='color:red'>Ofline</p>";
    }
}
?>