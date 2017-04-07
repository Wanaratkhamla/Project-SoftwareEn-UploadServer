<?php
if(!isset($error)){
  $check = -1;
}else if(isset($error)){
  $check = $error;
} ?>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="icon" href="<?php echo base_url('Boostap2/img/trumpet.png');?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url('Boostap2/img/trumpet.png');?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/bootstrap.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/responsive.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/camera.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/style.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/pop-up.css');?>" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.easing.1.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/camera.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/superfish.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/pop-up.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.ui.totop.js');?>"></script>
    <script>
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
            $('#logout').click(function () {
              Logout();
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.mobile.customized.min.js');?>"></script>
</head>

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
                        Password : <input id="password" class="form-control" type="password" placeholder="Password"><br>
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
<!--==============================header Home=================================-->
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
                                        <?php if ($this->session->userdata('Fname')){ ?>
                                          <li><a href="#">Donate Item</a></li>
                                          <?php } ?>

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
<br>

<table width="1150" height="400" border="1" align="center">
        <td>
<h2 align="center"><font size="7" style="color:white;"><FONT FACE="AngsanaUPC">รอการยืนยันจากทางเว็บไซต์ WeShared4you</font></h2>
        </td>
    </table>

<footer>
    <div class="container">
        <div class="row">
            <div class="span4 float2">
                <form id="newsletter" method="post" >
                    <label>Newsletter</label>
                    <div class="clearfix">
                        <input type="text" onFocus="if(this.value =='Enter e-mail here' ) this.value=''" onBlur="if(this.value=='') this.value='Enter e-mail here'" value="Enter e-mail here" >
                        <a href="#" onClick="document.getElementById('newsletter').submit()" class="btn btn_">subscribe</a>
                    </div>
                </form>
            </div>
            <div class="span8 float">
                <ul class="footer-menu">
                    <li><a href="#" class="current">Home Page</a>|</li>
                    <li><a href="#">Statistic</a>|</li>
                    <li><a href="#">FAQ</a>|</li>
                    <li><a href="#">about</a>|</li>
                </ul>
                WeShar   &copy;  2017  |   Email : <a rel="nofollow" href="http://www.weshar@kku.com" target="_blank">weshar@kku.com</a>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="<?php echo base_url('Boostap2/js/bootstrap.js');?>"></script>

</body>
</html>
