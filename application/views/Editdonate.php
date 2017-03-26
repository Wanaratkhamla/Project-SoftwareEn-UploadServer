<?php
if(!isset($error)){
  $check = -1;
}else if(isset($error)){
  $check = $error;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>บริจาคสินค้า</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/bootstrap.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/responsive.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/style.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/mdb.min.css'); ?>" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.easing.1.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.ui.totop.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/forms.js');?>"></script>
    <script>
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
      $(document).ready(function() {
            $('#donateType').val("<?php echo $data['donateType'] ?>");
      });

      // $(document).ready(function() {
      //   $('#submitdonate').click(function() {
    	// 		$.ajax({
      //       var donateName = $('#donateName')
    	// 			url:"http://localhost/soften/index.php/linkdonate/donateControl",
      //       data: "donateName=" + $('#donateName').val() + "&donateSize=" + $('#donateSize').val() + "&donateweight=" + $('#donateweight').val() +
      //       "&donateEA=" + $('#donateEA').val() + "&donatecolor="
    	// 			type: "POST",
    	// 			success:function(res){
    	// 			getcode2 = res.word
    	// 			document.getElementById("captchas").innerHTML = res.image;
    	// 			$('#ccha').removeAttr('value');
    	// 			$("#submitregisters").prop('disabled', true);
    	// 			$('#email').removeAttr('value');
    	// 			$('#password').removeAttr('value');
    	// 		 }
    	// 		});
    	// 	});
      // });
    </script>

</head>

<body>
<!--==============================header=================================-->
<header>
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="index.html"><img src="<?php echo base_url('Boostap2/img/logo.png');?>" alt=""></a><span>Fashion brand</span></h1>
                        <span class="contacts">
                            <?php
                              $attributes = array("method" => "POST", "autocomplete" => "on");
                              echo form_open("checklogin/Logoutuser", $attributes);?>
                              <button class="btn btn_" type="submit"><span style="color:#FFFFFF;text-align:center;">Logout</span></button>
                            <?php echo form_close(); ?>
                        </span>
                    </div>

                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="li-first"><a href="index.html"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li class="sub-menu"><a href="index-1.html">about</a>
                                        <ul>
                                          <li><a href="#">Welcome Message</a></li>
                                          <li class="sub-menu"><a href="#">Company Profile</a>
                                            <ul>
                                              <li><a href="#">Our Capabilities</a></li>
                                              <li><a href="#">Advantages</a></li>
                                              <li><a href="#">Work Team</a></li>
                                              <li><a href="#">Partnership</a></li>
                                              <li><a href="#">Support</a></li>
                                            </ul>
                                          </li>
                                          <li><a href="#">Our History</a></li>
                                          <li><a href="#">Testimonials</a></li>
                                        </ul>
                                      </li>
                                      <li><a href="index-2.html">services</a></li>
                                      <li><a href="index-3.html">collections</a></li>
                                      <li><a href="index-4.html">styles</a></li>
                                      <li class="active"><a href="index-5.html">contacts</a></li>
                                    </ul>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="#"><img src="<?php echo base_url('Boostap2/img/icon-1.png');?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo base_url('Boostap2/img/icon-2.png');?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo base_url('Boostap2/img/icon-3.png');?>" alt=""></a></li>
                                    <li><a href="#"><img src="<?php echo base_url('Boostap2/img/icon-4.png');?>" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
       </div>
    </div>
</header>

<section id="content">
<div class="sub-content">
  <div class="container">
    <div class="row">
        <div class="span6">

        	<h4>แก้ไขข้อมูลรับบริจาค</h4>

          <table width="1150" height="400" border="0">
            <tr>
              <td> <?php
              if ($check == 1) {
              echo '<br><span style="color:#ff0000;text-align:center;">กรุณากรอกให้ครบทุกช่อง</span>';
            } ?>
        <?php echo form_open_multipart('linkdonate/updatedonate');?>
        <input type="hidden" id="donateID" name="donateID" value="<?php echo $data['donateID'] ?>">
        ชื่อของที่บริจาค : <input type="text" class="form-control" name="donateName" id='donateName' value="<?php echo $data['donateName'] ?>"> <br>
        ขนาด(กว้าง x ยาว) : <input type="text" class="form-control" name="donateSize" id="donateSize" value="<?php echo $data['donateSize'] ?>"><br>
        น้ำหนัก(กิโลกรัม) : <input type="text" class="form-control" name="donateweight" id="donateweight" value="<?php echo $data['donateweight'] ?>"><br>
        จำนวนชิ้น : <input type="text" class="form-control" name="donateEA" id="donateEA" value="<?php echo $data['donateEA'] ?>"><br>
        สี : <input type="text" class="form-control" name="donatecolor" id="donatecolor" value="<?php echo $data['donatecolor'] ?>"><br>
        ประเภท : <select name="donateType" id='donateType' style="color: #000000;">
          <option value="เครื่องสาย">เครื่องสาย</option>
          <option value="เครื่องตี">เครื่องตี</option>
          <option value="เครื่องดีด">เครื่องดีด</option>
          <option value="เครื่องสี">เครื่องสี</option>
        </select><br>
        รายละเอียด : <br><textarea id="donateDetail" class="form-control" rows="4" cols="32" name="donateDetail" ><?php echo $data['donateDetail'] ?></textarea><br> </td>

              <td align='center'>
                <?php $image =  $data['donatePathIMG'];?>
                <img id='output' height=500 width=400 src="<?php echo base_url("image/$image"); ?>"/><br>
              อัพโหลดรูป : <input type="file" name="IMGPath" size="20" onchange='openFile()'/><br>  </td>
            </tr>
          </table>
              <br/><br/>
                <div class="pull-right">
                    <button type='submit' class="btn btn_ btn-small_" id="submitdonate">บันทึกการแก้ไข</button>
                </div>
            <?php echo form_close(); ?>


		</div>
    </div>
  </div>
</div>
</section>

<footer>
   <div class="container">
    <div class="row">
      <div class="span4 float2">
    </div>
    <div class="span8 float">
      	<ul class="footer-menu">
        	<li><a href="index.html">Home Page</a>|</li>
            <li><a href="index-1.html">about</a>|</li>
            <li><a href="index-2.html">Services</a>|</li>
            <li><a href="index-3.html">collections</a>|</li>
            <li><a href="index-4.html">styles</a>|</li>
            <li><a href="index-5.html" class="current">Contacts</a></li>
        </ul>
          WeShar   &copy;  2017  |   Email : <a rel="nofollow" href="http://www.weshar@kku.com" target="_blank">weshar@kku.com</a>
      </div>
    </div>
   </div>
</footer>
<script type="text/javascript" src="<?php echo base_url('Boostap2/js/bootstrap.js');?>"></script>
</body>
</html>
