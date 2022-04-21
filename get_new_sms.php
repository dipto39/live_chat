<?php
session_start();
include "db/database.php";
$obj=new database();
$table=$_POST['ctable'];
$uid=$_POST['uid'];
$obj->select($table,"new_sms",null,"uid = $uid",null,null);
$res=$obj->show_result();
$new_sms=$res[0][0]["new_sms"];
$data="";
$table1=$_SESSION["fname"].$_SESSION["uid"];
$table1=str_replace(' ', '', $table);
if($res[0][0]["new_sms"] == 0){
}else{
    // echo $table;
    $data.=' <script>function get_new_smsmms(){var gd=$(".call").data("attr");
    var table1="'.$table1.'"
    $.ajax({
        url:"gate_messages.php",
        type:"POST",
        data:{id:gd,table:table1},
        success:function(e){
            $(".messages table").html(e);
            let objDiv = document.querySelector(".messages");
            objDiv.scrollTop = objDiv.scrollHeight;
            delete window.get_new_smsmms;

        }
    })
}
get_new_smsmms();
</script>';
}
echo $data;

?>