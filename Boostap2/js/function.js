function uninput() {
    document.getElementById('frm_txt').style.display = "none";
    document.getElementById("donatesendDetail").value = 12;
    $('#donatesendDetail').val('');
}

function showinput(){
    document.getElementById('frm_txt').style.display = "";
 }



 function openFile() {
     var input = event.target;
     var reader = new FileReader();
     reader.onload = function(){
     var dataURL = reader.result;
     var output = document.getElementById('output');
     output.src = dataURL;
   };
   reader.readAsDataURL(input.files[0]);
 };

 function checkemail() {
    var getemail = $('#Email').val();
    var lengthemail = getemail.length;
    var checkoverlap = "email=" + getemail ;
    $.ajax({
     url:"https://10.199.66.227/SoftEn2017/group8/index.php/usercontroller/checkuser",
     data:checkoverlap,
     type:"POST",
     success:function(res){
       if (lengthemail > 5) {
         if (res == 1) {
           $("#Email").css("background-color", "#ff6666");
           $("#Emailerror").text("Email นี้ถูกใช้งานแล้ว");
           $("#Emailerror").css("color", "red");
         }else{
           $("#Email").css("background-color", "#66cc66");
           $("#Emailerror").text("Email สามารถใช้งานได้");
           $("#Emailerror").css("color", "green");
         }
       }else{
           $("#Email").css("background-color", "#ff6666");
           $("#Emailerror").text("Password น้อยกว่า 6 อักขระ");
           $("#Emailerror").css("color", "red");
       }
     }
    });
  }

  function checkIDCard() {
    var getid = $('#IDCard').val();
    var lengthid = getid.length;
    var checkoverlapid = "id=" + getid ;
    $.ajax({
      url:"https://10.199.66.227/SoftEn2017/group8/index.php/usercontroller/checkid",
      data:checkoverlapid,
      type:"POST",
      success:function(check){
        if (lengthid == 13){
          if (check == 1) {
            $("#IDCard").css("background-color", "#ff6666");
            $("#checkerrorID").text("บัตรประชาชนนี้ถูกใช้งานแล้ว");
            $("#checkerrorID").css("color", "red");
          }else{
            $("#IDCard").css("background-color", "#66cc66");
            $("#checkerrorID").text("บัตรประชาชนสามารถใช้งานได้");
            $("#checkerrorID").css("color", "green");
          }
        }else if(lengthid > 13){
            $("#IDCard").css("background-color", "#ff6666");
            $("#checkerrorID").text("บัตรประชาชนมากกว่า 13 อักขระ");
            $("#checkerrorID").css("color", "red");
        }else {
          $("#IDCard").css("background-color", "#ff6666");
          $("#checkerrorID").text("บัตรประชาชนน้อยกว่า 13 อักขระ");
          $("#checkerrorID").css("color", "red");
        }
      }
    });
  }

  function checkPasswordAndconfirmPassword() {
    var getPass1 = $('#Password').val();
    var getPass2 = $('#confirmPassword').val();
    if (getPass2 == getPass1) {
      $("#confirmPassword").css("background-color", "#66cc66");
      $("#Errorpassword").text("พาสเวิดถูกต้อง");
      $("#Errorpassword").css("color", "green");
    }else {
      $("#confirmPassword").css("background-color", "#ff6666");
      $("#Errorpassword").text("กรุณากรอกพาสเวิดให้ถูกต้อง");
      $("#Errorpassword").css("color", "red");
    }
  }
