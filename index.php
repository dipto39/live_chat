<?php
session_start();
if(isset($_SESSION["uid"])){
header("Location: http://localhost/live_chat/user");    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
    <title></title>
</head>
<body>
    <div class="main">
        <header><a href="index.php">CHAT R<span>OO</span>M</a></header>
        <div class="content">
            <div class="hcontent">
                <h2>Login or register to go to the CHATR<span>OO</span>M 😊</h2>
            <div class="randlbtn">
                <button class="btnl" id="btnl" style="vertical-align:middle"><span>Login </span></button>
                <div class="or">Or</div>
                <button class="btnl" id="btnr" style="vertical-align:middle"><span>Registration </span></button>
            </div>
            </div> 
            <div class="lcontent hide">
                <h2>Enter your login deteils</h2>
                <div class="lerr">Is an error</div>
                <form id="loginform">
                <label for="email" id="l_email">
                    Email:
                    <input type="email" name="lemail" id="lemail" required placeholder="Enter your email">
                </label>
                <label for="lpass" class="hide" id="l_pass">
                    Password:
                    <input type="password" name="lpass" id="lpass" required placeholder="Enter your Password">
                </label>
                <button id="nextl">Next</button>
                <button type="submit" class="subsl" style="float: right;" id="ldpass">Login</button>
                <button id="prevl" class="hide">Prev</button>
            </form>
            </div>
            <div class="rcontent hide">
                <h2>Enter your deteils</h2>
                <div class="rerr">Is an error</div>
                <form id="regform" enctype="multipart/form-data">
                    <label for="rfname" class="">
                        First Name:
                        <input type="text" name="rfname" id="rfname" placeholder="Enter your first name" required>
                    </label>
                    <label for="rlname" class="hide">
                        Last Name:
                        <input type="text" name="rlname" id="rlname" placeholder="Enter your last name" required>
                    </label>
                    <label for="remail" class="hide">
                        Email:
                        <input type="email" name="remail" id="remail" placeholder="Enter your email" required>
                    </label>
                    <label for="rpass" class="hide">
                        Password:
                        <input type="password" name="rpass" id="rpass" placeholder="Enter your password">
                    </label>
                <label for="rpp" class="lavelpp hide">
                    Profile:
                    <div class="ppimg" style="text-align: center;">
                        <img src="" alt="" class="file-upload-image hide">
                    </div>
                    <input type="file" accept="image/*" name="rpp" id="rpp" onclick="readURL(this)" title="Upload your photo">
                    
                </label>
                
                <button id="0" class="nextr" style="float: right;">Next</button>
                <button type="submit" class="subs" style="float: right;" id="rdpass">Submit</button>
                <button id="1" class="prevr hide">Prev</button>
            </form>
            </div>
        </div>
    </div>
    <script>
       $(document).on("submit","#regform",function(e){
        e.preventDefault();
        var fdata=new FormData(this);
        var len=$("#rpp").val().length;
        if(len >0){
            var form=$("#regform");
                   
            $.ajax({
                url: "resave.php",
                data: fdata,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                beforeSend:function(){
                    $("#rdpass").html("Submitting...");
                    $('#rdpass').attr('disabled', 'disabled');
                },
                success:function(e){
                    $("#rdpass").html("Submit");
                    $('#rdpass').removeAttr('disabled');
                   $('.main').append(e);
                   location.reload();
                }
            })
        }else{
            alert("please select your profile picture");
        }
       })
       $(document).on("submit","#loginform",function(e){
        e.preventDefault();
        var fdata=new FormData(this);
        var len=$("#lpass").val().length;
        if(len >0){
            var form=$("#regform");
            $.ajax({
                url: "login.php",
                data: fdata,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                beforeSend:function(){
                    $("#ldpass").html("loding...");
                    $('#ldpass').attr('disabled', 'disabled');
                },
                success:function(e){
                    $("#ldpass").html("Login");
                    $('#ldpass').removeAttr('disabled');
                    $('.main').append(e);
                }
            })
        }
       })

    </script>
</body>
</html>