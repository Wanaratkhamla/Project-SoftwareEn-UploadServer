<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url('Boostap2/img/favicon.ico');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('Boostap2/img/favicon.ico');?>" type="image/x-icon" />
    <link rel="icon" href="<?php echo base_url('Boostap2/img/trumpet.png');?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/bootstrap.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/responsive.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/style.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/pop-up.css');?>" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.easing.1.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.ui.totop.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/forms.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/camera.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/function.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/superfish.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/pop-up.js');?>"></script>
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

      <?php if (isset($word)) {
       $words = $word;
      } ?>
      var getcode2 = '<?php echo $words;?>';
          $(document).ready(function(){
              jQuery('.camera_wrap').camera();
              $("#ccha").keyup(function() {
          			var getcode = $('#ccha').val();
          			if (getcode == getcode2) {
          					$("#submitlogin").prop('disabled', false);
          			}else{
          					$("#submitlogin").prop('disabled', true);
          			}
          		});
              $('#Refreshcaptcha').click(function() {
                 refreshcaptcha();
              });
              $("#Email").keyup(function() {
          			checkemail();
          		});
              $("#IDCard").keyup(function () {
          			checkIDCard();
          		});
              $("#confirmPassword").keyup(function () {
                checkPasswordAndconfirmPassword();
              });
          });
    </script>

</head>
<script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.mobile.customized.min.js');?>"></script>
<body>
  <!--=====================================================popup===================================================-->
  <!-- BEGIN # MODAL LOGIN -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-content">
              <div class="modal-header" align="center">
                  <img class="img-circle" id="img_logo" src="<?php echo base_url('Boostap2/img/login.png');?>">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
              </div>

              <!-- Begin # DIV Form -->
              <div id="div-forms">
                  <!-- Begin # Login Form -->
                  <form id="login-form">
                      <div class="modal-body">
                          <div id="div-login-msg">
                              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                              <div style="text-align: center;">
                                  <span id="text-login-msg">
                                      Type your Email and password.
                                  </span>
                              </div>
                          </div><center>
                          Email : <input id="email" class="form-control" type="text" placeholder="E-Mail"><br>
                          Password : <input id="password" class="form-control" type="password" placeholder="Password" ><br>
                          <span id="showerror" class="showerror"></span>

                          <?php if (isset($image)) {
                            $images = $image;
                            echo '<br><span id="captcha" style="color:#ff0000;text-align:center;">'  . $images . '</span>';
                          }else {
                          } ?>

                          <button type="button" id="Refreshcaptcha"><img src="<?php echo base_url('recaptcha.png');?>" style="max-height: 20px; max-width: 20px;"/></button>
                          <br> Passcode : <input class="form-control" id="ccha" type="text" name="ccha" ><br>
                          <input type="checkbox" > Remember me
                          </center>
                      </div>
                      <div class="modal-footer">

                          <center>
                          <div>
                             <button type="submit" class="btn btn_" id="submitlogin" disabled>Login</button>
                               </div>
                          </center>
                          <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link"><a href="<?php echo base_url('index.php/forgetpasswordCTRL');?>" style="color:black;">Forget Password?</a></button>
                            <button type="button" class="btn btn-link"><a href="<?php echo base_url('index.php/linkregister');?>" style="color:black;">Register</a></button>
                          </div>
                      </div>
                      </form>
                  <!-- End # Login Form -->

                  <!-- Begin | Lost Password Form -->
                  <form id="lost-form" style="display:none;">
                      <div class="modal-body">
                          <div id="div-lost-msg">
                              <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                              <div style="text-align: center;">
                              <span id="text-lost-msg">Type your e-mail.</span>
                            </div>
                          </div>
                          <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                      </div>
                      <div class="modal-footer">
                          <center>
                          <div>
                              <button type="submit" class="btn btn_">Send</button>
                          </div>
                          <div>
                              <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                              <button type="button" class="btn btn-link">Register</button>
                          </div>
                              </center>
                      </div>
                  </form>
                  <!-- End | Lost Password Form -->

                  <!-- Begin | การ์ด 14 เลือกรับ กับ บริจาก -->
                  <form id="14-form" style="display:none;">
                      <div class="modal-body">
                        <center><span><h5>สวัสดีคุณ : <span id="showname"></span></h5></span></center>
                        <center><span><h5>ยินดีต้อนรับสู่ We shared 4 you</h5></span></center>
                          <div id="div-14-msg">
                            <div id="icon-14-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <div style="text-align: center;">
                                <span id="text-14-msg">เลือกรายการ</span>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <center>
                            <button  type="submit" class="btn btn_" id='donate'><a href="<?php echo base_url('index.php/linkdonate');?>">I Can help</a></button>&nbsp;&nbsp;&nbsp;
                            <button  type="submit" class="btn btn_" id='receive'><a href="<?php echo base_url('index.php/linkquery');?>">I need help</a></button>
                          </center>
                      </div>
                  </form>
                  <!-- End | การ์ด 14 เลือกรับ กับ บริจาก -->

              </div>
              <!-- End # DIV Form -->

          </div>

  </div>
  <!-- END # MODAL LOGIN -->
<!--==============================header=================================-->
<header class="p0">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="<?php echo base_url('index.php/startweb');?>"><img src="<?php echo base_url('Boostap2/img/logo1.png');?>" alt=""></a><span><strong>Brand of musical instruments donation </strong></span></h1>
                          <span class="contacts">
                              <h5>เข้าสู่ระบบ</h5>
                              <a href="#" class="btn btn_" role="button" data-toggle="modal" data-target="#login-modal" id="loginmodal"><span style="color:#FFFFFF;text-align:center;">Login</span></a>
                              <br><br>สมัครสมาชิก : <a href="<?php echo base_url('index.php/linkregister');?>" data-toggle="modal" data-target="#register-modal">register</a>
                          </span>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                        <li class="active li-first"><a href="<?php echo base_url('index.php/startweb');?>"><em class="hidden-phone"></em>&nbsp;Home</a></li>
                                        <li><a href="#">Statistic</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li class="sub-menu"><a href="#">about</a>
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
<!-- Register -->
<br><h3 class="registext" align="center">สมัครเข้าใช้งานเว็บไซต์</h3><br>
<center><span id="alertmessege"></span></center><br>
<form id="Registerform">
<table width="1150" height="400" border="1" align="center">
        <td>
<div class="container-resub" align="center">

      <!-- ส่วนอัพรูป -->
        <div class="confirmId">
        <h5 class="textHeader"><font color="#eb4f4f">เลือกรูปบัตรประจำตัวประชาชนเพื่อยืนยันตัวตน</font></h5><br><span id="Errorimage"></span><br>
                     <table width="300" height="400" border="5">
                                <td>
                        <img id='output' height=500 width=400 />
                                </td>
                            </table><br>
                        อัพโหลดรูป : <input type="file" name="userPathIMG" size="30" onchange='openFile()'/><br><br>
                        <span>ขนาดไม่เกิน 1024 x 768</span>
        </div>
      <!--  -->
    </td>
    <td align="center">
      <section class="register-left">
      <span id="Errorregister"></span>
      <h5 class="textHeader"><font color="#eb4f4f">สมัครเพื่อใช้งานฟังก์ชันของเว็บไซต์</font></h5>
      <form method="post" action="index.html">
<!--      <div class="reg_section password">-->
      <input type="email" name="Email" value="" placeholder="ที่อยู่อีเมล์" id="Email"><br><span id="Emailerror">กรุณากรอกEmailของท่าน</span><br>
      <input id="Password" type="password" name="Password" value="" placeholder="รหัสผ่าน"><br>
      <span id="Errorpassword"></span><br>
      <input id="confirmPassword" type="password" name="confirmPassword" value="" placeholder="ยืนยันรหัสผ่าน">
      <br><i>รหัสผ่านอย่างน้อย 8 ตัว ประกอบด้วยตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก ตัวเลข อย่างน้อย 1 ตัว</i><br>
<!--      </div>-->
<!--      <section class="register-right-2">-->
        <h5 class="textHeader"><font color="#eb4f4f">ข้อมูลส่วนตัว</font></h5>
        <input type="text" name="Fname" value="" placeholder="ชื่อ"><br>
        <input type="text" name="Lname" value="" placeholder="สกุล"><br>
<!--      </section>-->
<!--      <div class="reg_section-password-next">-->
        <input type="text" name="IDCard" id="IDCard" value="" placeholder="เลขบัตรประจำตัวประชาชน" pattern="[0-9]{13}"><br><span id="checkerrorID">กรุณาระบุเลขบัตรประชนของท่าน</span><br><br>
        <textarea name="Address" id="Address" placeholder="ที่อยู่"></textarea><br>
        <input type="text" name="Didtrict" value="" placeholder="อำเภอ"><br>
      <select id="Province" name="Province" style="color: #000000;">
        <option value="">จังหวัด</option>
        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
        <option value="กระบี่">กระบี่</option>
        <option value="กาญจนบุรี">กาญจนบุรี</option>
        <option value="กาฬสินธุ์">กาฬสินธุ์</option>
        <option value="กำแพงเพชร">กำแพงเพชร</option>
        <option value="ขอนแก่น">ขอนแก่น</option>
        <option value="จันทบุรี">จันทบุรี</option>
        <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
        <option value="ชลบุรี">ชลบุรี</option>
        <option value="ชัยนาท">ชัยนาท</option>
        <option value="ชัยภูมิ">ชัยภูมิ</option>
        <option value="ชุมพร">ชุมพร</option>
        <option value="เชียงราย">เชียงราย</option>
        <option value="เชียงใหม่">เชียงใหม่</option>
        <option value="ตรัง">ตรัง</option>
        <option value="ตราด">ตราด</option>
        <option value="ตาก">ตาก</option>
        <option value="นครนายก">นครนายก</option>
        <option value="นครปฐม">นครปฐม</option>
        <option value="นครพนม">นครพนม</option>
        <option value="นครราชสีมา">นครราชสีมา</option>
        <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
        <option value="นครสวรรค์">นครสวรรค์</option>
        <option value="นนทบุรี">นนทบุรี</option>
        <option value="นราธิวาส">นราธิวาส</option>
        <option value="น่าน">น่าน</option>
        <option value="บึงกาฬ">บึงกาฬ</option>
        <option value="บุรีรัมย์">บุรีรัมย์</option>
        <option value="ปทุมธานี">ปทุมธานี</option>
        <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
        <option value="ปราจีนบุรี">ปราจีนบุรี</option>
        <option value="ปัตตานี">ปัตตานี</option>
        <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
        <option value="พังงา">พังงา</option>
        <option value="พัทลุง">พัทลุง</option>
        <option value="พิจิตร">พิจิตร</option>
        <option value="พิษณุโลก">พิษณุโลก</option>
        <option value="เพชรบุรี">เพชรบุรี</option>
        <option value="เพชรบูรณ์">เพชรบูรณ์</option>
        <option value="แพร่">แพร่</option>
        <option value="พะเยา">พะเยา</option>
        <option value="ภูเก็ต">ภูเก็ต</option>
        <option value="มหาสารคาม">มหาสารคาม</option>
        <option value="มุกดาหาร">มุกดาหาร</option>
        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
        <option value="ยะลา">ยะลา</option>
        <option value="ยโสธร">ยโสธร</option>
        <option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
        <option value="ระนอง">ระนอง</option>
        <option value="ระยอง">ระยอง</option>
        <option value="ราชบุรี">ราชบุรี</option>
        <option value="ลพบุรี ">ลพบุรี</option>
        <option value="ลำปาง">ลำปาง</option>
        <option value="ลำพูน">ลำพูน</option>
        <option value="เลย">เลย</option>
        <option value="ศรีสะเกษ">ศรีสะเกษ</option>
        <option value="สกลนคร">สกลนคร</option>
        <option value="สงขลา">สงขลา</option>
        <option value="สตูล">สตูล</option>
        <option value="สมุทรปราการ">สมุทรปราการ</option>
        <option value="สมุทรสงคราม">สมุทรสงคราม</option>
        <option value="สมุทรสาคร">สมุทรสาคร</option>
        <option value="สระแก้ว">สระแก้ว</option>
        <option value="สระบุรี">สระบุรี</option>
        <option value="สิงห์บุรี">สิงห์บุรี</option>
        <option value="สุโขทัย">สุโขทัย</option>
        <option value="สุพรรณบุรี">สุพรรณบุรี</option>
        <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
        <option value="สุรินทร์">สุรินทร์</option>
        <option value="หนองคาย">หนองคาย</option>
        <option value="หนองบัวลำภู">หนองบัวลำภู</option>
        <option value="อ่างทอง">อ่างทอง</option>
        <option value="อุดรธานี">อุดรธานี</option>
        <option value="อุทัยธานี">อุทัยธานี</option>
        <option value="อุตรดิตถ์">อุตรดิตถ์</option>
        <option value="อุบลราชธานี">อุบลราชธานี</option>
        <option value="อำนาจเจริญ">อำนาจเจริญ</option>
      </select><br>
      <input type="text" name="Postcode" value="" placeholder="รหัสไปรษณีย์"><br>
      <input type="text" name="Tel" value="" placeholder="หมายเลขโทรศัพท์"><br>
      <select id="Qmember" name="Qmember" style="color: #000000;">
          <option value="1">เลขบัตรประชาชน 4 ตัวสุดท้าย</option>
          <option value="2">ชื่อสัตว์เลี้ยงตัวแรกของคุณ</option>
          <option value="3">เบอร์โทรศัพท์ 4 ตัวสุดท้าย</option>
          <option value="4">สีของรถครั้งแรกของคุณ</option>
          <option value="5">เพลงโปรดของคุณ</option>
          <option value="6">งานอดิเรกของคุณ</option>
          <option value="7">หนังโปรดของคุณ</option>
      </select><br><input type="text" name="Ansmember" id="Ansmember" placeholder="คำตอบ"><br>
   <!-- วาง Captcha -->
   <button type="submit" class="btn btn_" id="submitlogin">สมัครสมาชิก</button>
          </form>
          </section>
          </td>
 </div>
 </table>
 </form>
<!--  </div>-->
<!-- Register -->
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
