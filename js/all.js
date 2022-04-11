$(document).ready(function(){
    /// log out
    $(".logout").click(function(){
        $.ajax({
            url:"logout.php",
            type:"POST",
            success:function(e){
       window.location.href = " http://localhost/live_chat/";
              
            }
        })
        
    })
    ///contactct page
    $(".contactus").click(function(){
        window.location.href = " http://localhost/live_chat/contact";
        
    })
//click even is target is right or not
var container=$(".optin");
var cont2=$(".serch_item");
$(document).on("mouseup",function(e){
if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            if($(e.target).is($(".manu"))){
            }else{
            container.hide();            
            }
        }
        if (!cont2.is(e.target) && cont2.has(e.target).length === 0) 
        {
            if($(e.target).is($(".search_item"))){
            }else{
            cont2.hide();            
            }
        }
    })
//manu cilick event
$(".manu").on("click",function(){
    $(".optin").fadeIn(300);
    // $(".optin").css("z-index","12");
})
//on focus show search item
$("#gsearch").on("keyup",function(){
    $(".serch_item").fadeIn(200);
   var val=$("#gsearch").val();
    $.ajax({
        url:"search.php",
        type:"POST",
        data:{val:val},
        success:function(e){
            $(".serch_item").html(e)
        }
    })
})

//back button
$(document).on("click",".back",function(){
    $(".lside").show();
    $(".rside").hide();
    $("header").show();
    $(".uheader").show();
})
// $(".messages").animate({ scrollTop: 20000000 }, "slow");
//video and audio call
$(document).on("click",".call",function(){
    alert("website is under construction");
})
$(document).on("click",".vcall",function(){
    alert("website is under construction");
})

//when window resize
window.addEventListener('resize', setEqualHeight);
function setEqualHeight(){
    if ($(window).width() < 600) {
        $(".lside").show();
        $(".rside").hide();
        $(".messages").css("width","80%");
    
    }
    if($(window).width() > 600){
        $(".lside").show();
        $(".rside").show();
        $(".messages").css("height","86%");
        $("header").show();
        $(".uheader").show();

    }
}
// when window less than 600px
if ($(window).width() < 600) {
    // location.reload();

}
/// sent image
$(document).on("click","#sent_image",function(){
    console.log("ball"); $('#imgupload').trigger('click'); 
    var File = document.getElementById("imgupload").files.length;
    if(File > 0){ 
      $(".selected_img").css("display","flex");
     }
})
$(document).on("change","#imgupload",function(e){
    $(".selected_img").css("display","flex");
    var img=document.querySelector("#img_output");
    img.src = URL.createObjectURL(e.target.files[0]);
    $("#sms").hide();
})
$(document).on("click",".cancle_imgae",function(){
     var $el = $('#imgupload');
      $el.wrap('<form>').closest('form').get(0).reset();
      $el.unwrap();
      $(".selected_img").css("display","none");
      $("#sms").show();


})

})