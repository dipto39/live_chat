<?php
$ouid= $_POST['oid'];
 $_FILES["imgupload"]["name"];
 $target_dir = "admin/sms/";
 $file_name=time().basename($_FILES["imgupload"]["name"]);
 $target_file = $target_dir.$file_name;
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 
 // Check file size
 if ($_FILES["imgupload"]["size"] > 500000) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["imgupload"]["tmp_name"], $target_file)) {
            session_start();
            include "db/database.php";
            $db=new database();
            $sms="@img@".$file_name;
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
            $sender_name=$_SESSION['fname'];
            $rarr=["lsms"=>"$sender_name sent a photo"];
            $db->update($recevar_ctable,$rarr," uid=$suid");
            $new_sms_arr=["new_sms"=>"new_sms +1"];
            if($db->update_a($recevar_ctable,$new_sms_arr," uid=$suid")){
                
            }
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
 }
?>