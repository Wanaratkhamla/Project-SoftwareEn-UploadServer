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
