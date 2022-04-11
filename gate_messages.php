<?php
include "db/database.php";
$db=new database();
$uid=$_POST['id'];
$table=$_POST['table'];
$db->select($table,"*",null,"uid=$uid",null,null);
$res1=$db->show_result();
$data="";
if(count($res1[0]) > 0){
    foreach($res1[0] as list("mid"=>$mid,"uid"=>$uid,"sms"=>$sms,"sorr"=>$sorr,"tm"=>$tm)){
        $data.='<tr class="signle_sms">';
        if($sorr == "r"){
            $cl="opornent";
        }else{
            $cl="mysms";
        }
        $data.='<td class="bal '.$cl.'">';
        if(substr($sms, 0, 5) == "@img@"){
           $img=substr($sms,5);
        $data.='<p> <img src="admin/sms/'.$img.'" alt=""></p>';
        }else{
            $data.='<p>'.$sms.'</p>';
        }
            
       $data.=' </td>
    </tr>';
    }
}
echo $data;
?>