<?php
if(!isset($error)){
  $check = -1;
}else if(isset($error)){
  $check = $error;
} ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/function.js');?>"></script>
    <script>
     $(document).ready(function() {
        var check = '<?php echo $data['donateTypesend'] ?>';
         if (check == '1') {
           $('#donatesend1').prop('checked', true);
         }else if (check == '2') {
           $('#donatesend2').prop('checked', true);
         }else if (check == '3') {
           $('#donatesend3').prop('checked', true);
           showinput();
         }
     });
    </script>
    <style>

    div.img-resize img {
    	width: 240px;
    	height: 160px;
    }

    div.img-resize {
    	width: 225px;
    	height: 200px;
    	overflow: hidden;
    	text-align: center;
    }
    div.sizelink a{
      color: #003399;
    	background-color: transparent;
    	font-weight: bold;
      font-size: 15px;
      margin: 4px;
      border: 2px solid #000000;
      padding: 2px;

    }

    </style>
</head>

<body>
<!--==============================header=================================-->
<header>
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="#"><img src="<?php echo base_url('Boostap2/img/logo1.png');?>" alt=""></a><span><strong>Brand of musical instruments donation </strong></span></h1>
                       <span class="contacts">
                            <?php
                              $attributes = array("method" => "POST", "autocomplete" => "on");
                              echo form_open("checklogin/Logoutuser", $attributes);?>
                              <h5><img height=50 width=50 src="<?php echo base_url("cart.png"); ?>"  /> | สวัสดีครับ : <span>คุณ<?php echo $this->session->userdata('Fname'); ?></span></h5>
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
                                        <li class="active li-first"><a href="<?php echo base_url('index.php/startweb');?>"><em class="hidden-phone"></em>&nbsp;Home</a></li>
                                        <li><a href="#">Donate Item</a></li>
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
<!--=============================================================================================-->
<section id="content" class="main-content">
<div class="container">
  <div class="row">
      <div class="span12">
          <ul class="thumbnails">
              <h3 class="indent-2">Music Instruments</h3>
              <?php
              foreach($results as $data) { ?>
              <li class="span3">
                  <div class="thumbnail">
                      <div class="caption">
                          <div class="img-resize"><img id='output' src="<?php echo base_url("image/$data->donatePathIMG"); ?>"  alt=""/></div>
                          <h3><?php echo $data->donateName ?></h3>
                          <h5>ผู้บริจาค : คุณ<?php echo $data->Fname . " " . $data->Lname?></h5>
                      </div>
                      <div class="thumbnail-pad">
                          <a href="#" class="btn btn_">more info</a>
                      </div>
                  </div>
              </li>
              <?php
              }
              ?>
          </ul>
          <br><div align='center' class="sizelink"><p><?php echo '<br>' . $links; ?></p></div>
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