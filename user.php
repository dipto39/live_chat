<?php
include "db/database.php";
$db=new database();
session_start();
if(isset($_SESSION["uid"])){
    $uname=$_SESSION["fname"];
    
}else{
header("Location: http://localhost/live_chat/"); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title><?php echo $_SESSION['fname']?></title>
    <link rel="stylesheet" href="css/all.css">
    <script src="js/jquery.js"></script>
    <script src="js/all.js"></script>
    <link rel="icon" href="admin/img/chat.png">
    <style>

    </style>
</head>
<body>
    <div class="main">
<?php include "header.php"?>
        <div class="usercontent">
            <div class="lside">
                <h2>Your contact</h2>
                <div class="contacts">
                    
                </div>
            </div>
            <div class="rside">

            <div class="nothing">
                <h2>please select a contact</h2>
            </div>
            </div>
        </div>
    </div>
    <script>
    var table='<?php $ctable="C".$_SESSION['fname'].$_SESSION['uid'];echo  $ctable = str_replace(' ', '', $ctable);?>';
// load sms...
$(document).on("click","#load_more",function(e){
    var pno=$(this).data("attr");
    load_message(table,null,pno);
    var l_parent=$("#load_more").parent().parent()
    l_parent.remove()
})
    //load message function 

function load_message(tb,uid,pageN){
    var gd=$(".call").data('attr');
            $.ajax({
                url:"gate_messages.php",
                type:"POST",
                data:{id:gd,table:tb,pageN:pageN},
                success:function(e){
                    $(".messages table").prepend(e);
                   // let objDiv = document.querySelector(".messages");
                   // objDiv.scrollTop = objDiv.scrollHeight;
                    // alert(objDiv.scrollHeight)
                    // objDiv.scrollTop = objDiv.scrollHeight-objDiv.scrollHeight;
                }
            })
}
        //add friend
$(document).on("click",'.add_btn',function(e){
    var gid=e.target.id;
    // console.log(table)
    $(this).prop('disabled', true);;
    $.ajax({
        url:"addf.php",
        type:"POST",
        data:{id:gid,table:table},
        success:function(e){
            $(".contacts").append(e);
            $(this).attr('disabled','disabled');
        }
    })
})
///get message
$(document).on("click",'.contact',function(e){
    $(".rside").html("");
    if ($(window).width() > 600) {
                $(".rside").show();
                $(".lside").show();

            }
            if ($(window).width() < 600) {
                $(".lside").hide();
                $(".rside").show();
                $("header").hide();
                $(".uheader").hide();
            }

    var gid=$(this).data('attr');

    $.ajax({
        url:"get_ui.php",
        type:"POST",
        data:{id:gid,table:table},
        beforeSend:function(){
           $(".rside").html('<div class="lds-facebook"><div></div><div></div><div></div></div>');
        },
        success:function(e){
           $(".rside").html(e);
        },
        complete:function(){
        load_message(table,gid)
        setTimeout(() => {
            let objDiv = document.querySelector(".messages");
                    objDiv.scrollTop = objDiv.scrollHeight;
        }, 100);

        }
    })

})
//sent message


$(document).on("click",".sent",function(){

    var File = document.getElementById("imgupload").files.length;
    if(File > 0){ 
        $("#sent_img_btn").click();
     }else{
                var message=$("#sms").val();
            var uid=$(this).data('attr');
            if(message == "" || message == null){
                alert("please write some message");
                $("#sms").focus();
            }else{
                $("#sms").val("")
                $("#sms").focus();
                $.ajax({
                    url:"sent.php",
                    type:"POST",
                    data:{sms:message,id:uid},
                    beforeSend:function(){
                    $(".sent").html("<div class='sending'>sending...</div>");
                    $('#sms').attr('disabled', 'disabled');
                    },
                    success:function(e){
                        $('#sms').removeAttr('disabled');
                        $('#sms').focus();
                    $(".sent").html('<img src="admin/img/sent.png" alt="">');
                    //$("header").html(e);
                    },
                    complete:function(){
           var gd=$(".call").data('attr');
            $.ajax({
                url:"gate_messages.php",
                type:"POST",
                data:{id:gd,table:table},
                success:function(e){
                    $(".messages table").html(e);
                    let objDiv = document.querySelector(".messages");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            })

        }
                })

        let objDiv = document.querySelector(".messages");
        objDiv.scrollTop = objDiv.scrollHeight;

        }
     }
    
})
////sent pic to other
$(document).on("click","#sent_img_btn",function(e){
    e.preventDefault();
    var oid=$(".sent").data("attr");
    var fdata=new FormData(sent_img_form);
    fdata.append("oid",oid);
    $.ajax({
        url:"sent_img.php",
        type:"POST",
        data:fdata,
        processData:false,
        contentType:false,
        cache:false,
        beforeSend:function(){
                    $(".sent").html("<div class='sending'>sending...</div>");
                    $('#sms').attr('disabled', 'disabled');
                    },
        success:function(data){
            $(".cancle_imgae").click();
            $('#sms').removeAttr('disabled');
            $('#sms').focus();
            $(".sent").html('<img src="admin/img/sent.png" alt="">');
        },
        complete:function(){
           var gd=$(".call").data('attr');
            $.ajax({
                url:"gate_messages.php",
                type:"POST",
                data:{id:gd,table:table},
                success:function(e){
                    $(".messages table").html(e);
                    let objDiv = document.querySelector(".messages");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            })

        }
    })
})
//get contact
setInterval(get_contact,1000);
function get_contact(){
$.ajax({
    url:"get_contact.php",
    type:"POST",
    success:function(e){
        $(".contacts").html(e);
    }
})
}

// set active status
setInterval(setactive,1000);
function setactive(){
    $.ajax({
    url:"set_active.php",
    type:"POST",
    success:function(e){
       // $("header").html(e);
    }
})
};


$(document).on("keydown","#sms",function(e){
  if(e.keyCode == 13){
   $(".sent").click();
   $("#sms").val("");
  } 
});
    </script>
</body>
</html>