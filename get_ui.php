<?php
include "db/database.php";
$db=new database();
$uid=$_POST['id'];
$table=$_POST['table'];
$db->select("users","up,full_name",null,"uid=$uid",null,null);
$res=$db->show_result();
$up=$res[0][0]['up'];
$uname=$res[0][0]['full_name'];
$data="";
$data.='<div class="ucall">
<div class="back">
    <img src="admin/img/back.png" alt="">
</div>
<div class="profile pcalls">
    <img src="admin/up/'.$up.'" alt="">
    <h2>'.$uname.'</h2>
</div>
<div class="call" data-attr="'.$uid.'">
    <img src="admin/img/phone-call.png" alt="">
</div>
<div class="vcall" data-attr="'.$uid.'">
    <img src="admin/img/video-camera.png" alt="">
</div>
</div>
<div class="messages"> <table></table>';
   
$data.='</div>
<div class="sendm">
<div class="sent_pic" titile="sent a photo">
<img id="sent_image" src="admin/img/plus.png" alt="">
<form id="sent_img_form" method="post" enctype="multipart/form-data">
<input type="file" accept="image/*" id="imgupload" name="imgupload" style="display:none"/> 
<input id="sent_img_btn" type="submit" style="display:none"/>
</form>
</div>
<div class="selected_img">
<div class="sigle_s_img">
<div class="cancle_imgae">
<img src="admin/img/Cancel.png" alt="">
</div>
<img id="img_output">
</div>
</div>
<textarea name="" id="sms" ></textarea>
<div class="sent" data-attr="'.$uid.'"><img src="admin/img/sent.png" alt=""></div> </div>';
echo $data;
$u_ctable="C".$table;
$new_sms_empty=["new_sms"=>"0"];
if($db->update_a($u_ctable,$new_sms_empty," uid=$uid")){    
}
?>