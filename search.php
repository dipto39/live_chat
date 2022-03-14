<?php
include "db/database.php";
$db=new database();
session_start();
$val=$_POST['val'];
$uid=$_SESSION['uid'];
$table="C".$_SESSION['fname'].$_SESSION['uid'];
$table = str_replace(' ', '', $table);
$db->select("users","*",null,"full_name like '%$val%' and uid not like $uid",null,null);
$res=$db->show_result();
$data="";
foreach($res[0] as list('uid'=>$uidd,'full_name'=>$fname,'up'=>$up)){
    $data.='<div class="sigle_search">
<div class="sprofi">
    <img src="admin/up/'.$up.'" alt="">
    <p>'.$fname.'</p>
</div>
<div class="addf">';
$db->select("$table","*",null,"uid = $uidd",null,null);
$res1=$db->show_result();
if(count($res1[0]) > 0){
    $data.= "<button disable style='cursor: not-allowed;' > friend</button>";
}else{
    $data.="<button id='$uidd' class='add_btn'>Add friend</button>";
}
$data.='</div></div>';
}
echo $data;

?>
