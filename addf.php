<?php
session_start();
include "db/database.php";
$db=new database();
$id=$_POST['id'];
$table=$_POST['table'];
$db->select("users","*",null,"uid = $id",null,null);
$res=$db->show_result();
$uid=$res[0][0]['uid'];
$fname=$res[0][0]['full_name'];
$up=$res[0][0]['up'];
$arr=['uid'=>$uid,'fname'=>$fname,'up'=>$up];
$data="";
if($db->insert($table,$arr)){
    $resiver_table="C".$fname.$id;
    $reciver_table = str_replace(' ', '', $resiver_table);
    $rfname=$_SESSION['fname'];
    $rup=$_SESSION['up'];
    $arr2=['uid'=>$_SESSION['uid'],'fname'=>$rfname,'up'=>$rup];
    if($db->insert($reciver_table,$arr2)){
        $data.='<div class="contact" data-attr="'.$uid.'">
                                        <img src="admin/up/'.$up.'" alt="">
                                        <div class="contact_name">
                                            <h3 class="cfname">'.$fname.'</h3>
                                            <p></p>
                                        </div>
                                        <div class="contact_time">
                                            <p>4 min</p>
                                        </div>
                                    </div>';
    }
}else{
    print_r($db->show_result());
}

echo $data;
?>