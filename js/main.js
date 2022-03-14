$(document).ready(function(){
    $("#nextl").on("click",function(e){
        e.preventDefault();
        if($("#nextl").html()=="Next"){
            var lm=$("#lemail").val();
        if(lm == "" || lm == null){
            $('.lerr').html("email can't empty");
                $('.lerr').fadeIn(400);
                $("#lemail").focus();
        }else if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(lm)){
            $('.lerr').html("Please inter a valid Email");
            $('.lerr').fadeIn(400)
        }else{
            $('.lerr').fadeOut();
        $("#prevl").removeClass('hide');
        $("#l_email").fadeOut();
        $("#nextl").hide();
        $(".subsl").show();
        $("#l_pass").fadeIn(900);
        }
        }
        if($("#nextl").html()=="Login"){
            $("#nextl").on("click",function(){
                var lp=$("#lpass").val();
        if(lp == "" || lp == null){
            $('.lerr').html("Password can't empty");
                $('.lerr').fadeIn(400);
                $("#lpass").focus();
        }else{
            $('.lerr').fadeOut(400);
        }
            })
            
        }
        
        
    })
    var kard=$("#nextl")
    $("#prevl").on("click",function(e){
        e.preventDefault();
        $("#prevl").addClass('hide');
        $("#l_pass").fadeOut();
        $("#l_email").fadeIn(900);
        $("#nextl").show();
        $("#ldpass").hide();
    })
    //click login or registaition
    $("#btnl").on("click",function(){
        $(".hcontent").hide();
        $(".lcontent").show();
    })
    $("#btnr").on("click",function(){
        $(".hcontent").hide();
        $(".rcontent").show();
    })


    ///next next for registation form

    $(".nextr").on("click",function(e){
        e.preventDefault();
        var le=$(".rcontent label");
        const vid=e.target.id;
        if(vid == 0){
            var fname=$("#rfname").val();
            var frg=/[^a-zA-z]/;
            if(fname == ""|| fname==null){
                $('.rerr').html("First name can't empty");
                $('.rerr').fadeIn(400)
            }else if(frg.test(fname)){
                $('.rerr').html("can't accept number or spacial carrector");
                $('.rerr').fadeIn(400)
            }else if(!/[a-zA-z]{3,10}/.test(fname)){
                $('.rerr').html("fname is too short");
                $('.rerr').fadeIn(400)
            }else{
                $('.rerr').fadeOut()
                le.first().fadeOut();
            $(".rcontent label:nth-child(2)").fadeIn(900);
            e.target.id="1";
            $(".prevr").show();
            }
            
        }
        if(vid == 1){
            var lname=$("#rlname").val();
            var lrg=/[^a-zA-Z]/;
            if(lname == ""|| lname==null){
                $('.rerr').html("last name can't empty");
                $('.rerr').fadeIn(400)
            }else if(lrg.test(lname)){
                $('.rerr').html("can't accept number or spacial carrector");
                $('.rerr').fadeIn(400)
            }else if(!/[a-zA-z]{3,10}/.test(lname)){
                $('.rerr').html("last name is too short");
                $('.rerr').fadeIn(400)
            }else{
                $('.rerr').fadeOut()
                $(".rcontent label:nth-child(2)").fadeOut();
            $(".rcontent label:nth-child(3)").fadeIn(900);
            e.target.id="2";
            $(".prevr").attr("id","2");
            }
            
        }
        if(vid == 2){
            var remail=$("#remail").val();
            if(remail == ""|| remail==null){
                $('.rerr').html("Email can't empty");
                $('.rerr').fadeIn(400)
            }else if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(remail)){
                $('.rerr').html("please inter a valid mail");
                $('.rerr').fadeIn(400)
            }else{
                $('.rerr').fadeOut();
                $(".rcontent label:nth-child(3)").fadeOut();
            $(".rcontent label:nth-child(4)").fadeIn(900);
            e.target.id="3";
            $(".prevr").attr("id","3");
            }
        }
        if(vid == 3){
            var rpass=$("#rpass").val();
            var pex=/[^a-zA-z]/;
            if(rpass == ""|| rpass==null){
                $('.rerr').html("password can't empty");
                $('.rerr').fadeIn(400)
            }else if(!pex.test(rpass)){
                $('.rerr').html("use spacial carrector");
                $('.rerr').fadeIn(400)
            }else if(!/.{6,}/g.test(rpass)){
                $('.rerr').html("password is too short");
                $('.rerr').fadeIn(400)
            }else{
                $('.rerr').fadeOut()
            $(".rcontent label:nth-child(4)").fadeOut();
            $(".rcontent label:nth-child(5)").fadeIn(900);
            e.target.id="4";
            $(".prevr").attr("id","4");
            }
        }
        if(vid == 4){
            var rphn=$("#rnum").val();
            var pex=/^(?:(?:\+|00)88|01)?\d{11}$/;
            if(rphn == ""|| rphn==null){
                $('.rerr').html("Phone number can't empty");
                $('.rerr').fadeIn(400)
            }else if(!pex.test(rphn)){
                $('.rerr').html("Enter a valid phone number");
                $('.rerr').fadeIn(400)
            }else{
                $('.rerr').fadeOut()
            $(".rcontent label:nth-child(5)").fadeOut();
            $(".rcontent label:nth-child(6)").fadeIn(900);
            e.target.id="5";
            $(".prevr").attr("id","5");
            $(".nextr").hide();
            $(".subs").show();
            }
        }
        // if(vid == 5){    

        // }
    })
    $(".prevr").on("click",function(e){
        e.preventDefault();
        const vid=e.target.id;
        if(vid == 1){
            $(".rcontent label:nth-child(2)").fadeOut();
            $(".rcontent label:nth-child(1)").fadeIn(900);
            e.target.id="1";
            $(".prevr").hide()
            $(".nextr").attr("id","0");
        }
        if(vid == 2){
            $(".rcontent label:nth-child(3)").fadeOut();
            $(".rcontent label:nth-child(2)").fadeIn(900);
            e.target.id="1";
            $(".nextr").attr("id","1");
        }
        if(vid == 3){
            $(".rcontent label:nth-child(4)").fadeOut();
            $(".rcontent label:nth-child(3)").fadeIn(900);
            e.target.id="2";
            $(".nextr").attr("id","2");

        }
        if(vid == 4){
            $(".rcontent label:nth-child(5)").fadeOut();
            $(".rcontent label:nth-child(4)").fadeIn(900);
            e.target.id="3";
            $(".nextr").attr("id","3");
        }
        if(vid == 5){
            $(".rcontent label:nth-child(6)").fadeOut();
            $(".rcontent label:nth-child(5)").fadeIn(900);
            e.target.id="4";
            $(".nextr").attr("id","4");
            $(".nextr").show();
            $(".subs").hide();
        }

        // for(var i=0;i< le.length;i++){
            
        // }
    })
   
})
function readURL(input) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        // $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-image').show();
        // $('.lavelpp').click()
        // $('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    }