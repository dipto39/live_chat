<?php
include "db/database.php";
$db=new database();
$uid=$_POST['id'];
$table=$_POST['table'];
$db->select($table,"*",null,"uid=$uid",null,null);
$res1=$db->show_result();
$data="";
if(count($res1[0]) > 0){
    foreach($res1[0] as list("mid"=>$mid,"uid"=>$uid,"sms"=>$sms,"sorr"=>$sorr,"th"=>$tm)){
        $data.='<div class="signle_sms">';
        if($sorr == "r"){
            $cl="opornent";
        }else{
            $cl="mysms";
        }
        $data.='<div class="bal '.$cl.'">
            <p>'.$sms.'</p>
        </div>
    </div>';
    }
}
echo $data;
?>