/* #####################################################################
 #
 #   Project       : Modal Login with jQuery Effects
 #   Author        : Rodrigo Amarante (rodrigockamarante)
 #   Version       : 1.0
 #   Created       : 07/29/2015
 #   Last Change   : 08/04/2015
 #
 ##################################################################### */
 function refreshcaptcha() {
   $.ajax({
     url:"https://10.199.66.227/SoftEn2017/group8/index.php/startweb/refreshcaptchaimage",
     type: "POST",
     dataType: 'json',
     success:function(res){
     getcode2 = res.word
     document.getElementById("captcha").innerHTML = res.image;
     $('#ccha').removeAttr('value');
     $("#submitregister").prop('disabled', true);
     $('#email').removeAttr('value');
     $('#password').removeAttr('value');
    }
   });
 }

$(function() {

    var $formLogin = $('#login-form');
    var $formLost = $('#lost-form');
    var $14form = $('#14-form');
    var $formRegister = $('#register-form');
    var $divForms = $('#div-forms');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 2000;

    $('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
    $('#login_14_btn').click(function () { modalAnimate($formLogin,$14form);});
    $('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });

    function modalAnimate ($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divForms.css("height",$oldH);
        $oldForm.fadeToggle($modalAnimateTime, function(){
            $divForms.animate({height: $newH}, $modalAnimateTime, function(){
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    $("form").submit(function () {
        switch(this.id) {
            case "login-form":
                //ส่งไปเช็ค
                $.ajax({
        				 url:"https://10.199.66.227/SoftEn2017/group8/index.php/checklogin",
                 data: "Email=" + $('#email').val() + "&password=" + $('#password').val(),
                 dataType: 'json',
        				 type:"POST",
        				 success:function(res){
                   if (res == 2) {
                     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Please Enter Email and Password.");
                     refreshcaptcha();
                   }else if (res == 3) {
                     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Please Enter Email.");
                     refreshcaptcha();
                   }else if (res == 4) {
                     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Please Enter Password.");
                     refreshcaptcha();
                   }else if(res == 1){
                     msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "Invalid Email.");
                     refreshcaptcha();
                   }else{
                      msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", function () { modalAnimate($formLogin,$14form);});
                      $("#showname").text(res.Fname);
                   }
        				 }
        				});

                $('#Refreshcaptcha').click(function() {
                   refreshcaptcha();
                });
                return false;
                break;
            default:
                return false;
        }
        return false;
    });



    function msgFade ($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function() {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function() {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }

});
