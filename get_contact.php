<?php
include "db/database.php";
$db=new database();
session_start();
                    $ctable="C".$_SESSION['fname'].$_SESSION['uid'];
                    $ctable = str_replace(' ', '', $ctable);
                    $db->select($ctable,"*",null,null,null,null);
                    $res1=$db->show_result();
                    //$bal="";
                    if(count($res1[0]) > 0){
                        $data="";
                        foreach($res1[0] as list("cid"=>$cid,"uid"=>$uid,"up"=>$up,"fname"=>$fname,"lsms"=>$lsms,"new_sms" =>$new_sms)){
                          if(strlen($lsms) > 22){
                            $lsm=substr($lsms, 0, 19)."..." ;
                            $lsms= $lsm;
                          }else{
                            $lsms= $lsms;
                          }
                                    $data.='<div class="contact" data-attr="'.$uid.'">
                                    <img src="admin/up/'.$up.'" alt="">
                                    <div class="contact_name">
                                        <h3 class="cfname">'.$fname.'</h3>';
                                        if(substr($lsms, 0, 5) == "@img@"){
                                          $img=substr($lsms,5);
                                       $data.='<p>'.$fname.' sent a photo </p>';
                                       }else{
                                           $data.='<p>'.$sms.'</p>';
                                       }
                                       $data.='<div class="new_sms">';if($new_sms == 0){
                                          $data.= "";
                                        }elseif($new_sms > 9){
                                          $data.="<p>9+</p>";
                                        }else{
                                          $data.="<p>$new_sms</p>";
                                        }
                                      $data.='</div>
                                    </div>
                                    <div class="contact_time ">';
                                        $db->select('users',"*",null," uid=$uid AND TIMESTAMPDIFF(MINUTE, status, NOW()) < 1",null,null);
                                        $res2=$db->show_result();
                                        if(count($res2[0]) > 0){
                                       $data.="<p style='color:green'>Online</p>";
                                      }else{
                                       $data.="<p style='color:red'>Ofline</p>";
                                        

                                            
                                           
                                       }
                                  $data.= ' </div>
                                </div>';
                        }
                      echo $data;
                    }else{
                        echo '<div class="nothing">
                        <h2>No contacts found...please search with user name</h2>
                    </div>';
                    }
                    ?>