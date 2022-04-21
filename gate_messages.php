<?php
include "db/database.php";
$db=new database();
session_start();
$uid=$_POST['id'];
$limit=15;
$table=strtolower($_POST['table']);
 $table=substr($table,1);
if(isset($_POST['pageN'])){
    $pid=$_POST['pageN'];
    if($pid < 0){
        $pid=$pid+$limit;
        $limit=$pid;
        $pid=0;
    }
}else{
    $db->select($table,"*",null,"uid=$uid",null,null);
    $res2=$db->show_result();
     $pid=count($res2[0]);
     if($pid < $limit){
         $limit=$pid;
     }
     $pid=$pid-$limit;
}
// $ofset=($pid-1)* $limit;
$db->select($table,"*",null,"uid=$uid",null,"$pid,$limit");
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
if($pid <= 0){
  echo "<tr><td style='text-align: center;'><button id='load_more' disabled style='background:gray'>No more messages</button></td></tr>";
 }else{
  echo "<tr><td style='text-align: center;'><button id='load_more' data-attr='".$pid -$limit."'>Load more</button></td></tr>";
 }
echo $data;

$u_ctable="c".$_SESSION['fname'].$_SESSION['uid'];
$table1=str_replace(' ', '', $u_ctable);
$new_sms_empty=["new_sms"=>"0"];
if($db->update_a($table1,$new_sms_empty," uid=$uid")){    
}
?>