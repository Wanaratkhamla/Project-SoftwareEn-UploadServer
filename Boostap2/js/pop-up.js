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

 function checkrepass() {
   var Pass1 = $('#Password').val()
   var Pass2 = $('#RePassword').val()
   var IDCard = $('#IDCard').val()
   if (Pass1 != Pass2) {
     document.getElementById('Texterror').style.display = "";
     $("#Texterror").text("กรุณาพาสเวิดให้ถูกต้อง");
     $("#Texterror").css("color", "ff6666");
   }else {
     var lengPass = Pass1.length;
     if (lengPass > 16) {
       document.getElementById('Texterror').style.display = "";
       $("#Texterror").text("พาสเวิดเกิน 16 อักขระ");
       $("#Texterror").css("color", "ff6666");
     }else if (lengPass < 8) {
       document.getElementById('Texterror').style.display = "";
       $("#Texterror").text("พาสเวิดน้อยกว่า 8 อักขระ");
       $("#Texterror").css("color", "ff6666");
     }else {
       $.ajax({
         url:"https://10.199.66.227/SoftEn2017/group8/index.php/forgetpasswordCTRL/UpdatePass",
          data:"IDCard=" + $('#IDCard').val() + "&Password=" + $('#Password').val(),
          dataType: 'json',
          type:"POST",
          success:function(res){
            if (res.check == 1) {
              alert("รีเซ็ตพาสเวิดเสร็จสิ้น")
              window.location.href="https://10.199.66.227/SoftEn2017/group8/index.php/startweb";
            }
          }
       });
     }
   }
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

    function checkNullEmail() {
       if ($('#email').val() == "") {
         msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "กรุณากรอก Username");
       }
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
                   }else if(res.check == 5){ //link member success login
                      msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "success", "glyphicon-ok", function () { modalAnimate($formLogin,$14form);});
                      $("#showname").text(res.Fname);
                   }else if (res.check == 6) { // link admin page
                      window.location.href="https://10.199.66.227/SoftEn2017/group8/index.php/linkadmin";
                   }else if (res.check == 7) { // link after member register
                      window.location.href="https://10.199.66.227/SoftEn2017/group8/index.php/startweb/linkwatingpage";
                   }
        				 }
        				});

                $('#Refreshcaptcha').click(function() {
                   refreshcaptcha();
                });
                return false;
                break;
              case "forgetpass":
                  if ($('#email').val() == "") {
                    msgChange($('#div-login-msg'), $('#icon-login-msg'), $('#text-login-msg'), "error", "glyphicon-remove", "กรุณากรอก Username");
                  }else {
                  }
              return false;
              break;
             case "newsletter":
              $.ajax({
                url:"https://10.199.66.227/SoftEn2017/group8/index.php/forgetpasswordCTRL/checkEmailandQA",
         				 data:"Email=" + $('#Email').val() + "&Qmember=" + $('#Qmember').val() + "&Ansmember=" + $('#Ansmember').val(),
                 dataType: 'json',
                 type:"POST",
                 success:function(res){
        					 if (res == 0) {
                     document.getElementById('Texterror').style.display = "";
                     $("#Texterror").text("กรุณากรอกให้ถูกต้อง");
                     $("#Texterror").css("color", "ff6666");
        					 }else{
                     var url = "https://10.199.66.227/SoftEn2017/group8/index.php/forgetpasswordCTRL/linkResertPassword"
                     var form = $('<form action="' + url + '" method="post">' +
                     '<input type="hidden" name="IDCard" value="' + res.IDCard + '" />' +
                     '</form>');
                     $('body').append(form);
                     form.submit();
        					 }
        				 }
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
