<?php
if(!isset($error)){
  $check = -1;
}else if(isset($error)){
  $check = $error;
} ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>รายการของบริจาค</title>
    <meta charset="utf-8">
    <link rel="icon" href="Boostap2/img/trumpet.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/bootstrap.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/responsive.css');?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('Boostap2/css/style.css');?>" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.easing.1.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.ui.totop.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/forms.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('Boostap2/js/function.js');?>"></script>
</head>

<body>
<!--==============================header=================================-->
<header>
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="<?php echo base_url('index.php/startweb');?>"><img src="<?php echo base_url('Boostap2/img/logo1.png');?>" alt=""></a><span><strong>Brand of musical instruments donation </strong></span></h1>
                       <span class="contacts" align="right">
                            <?php
                              $attributes = array("method" => "POST", "autocomplete" => "on");
                              echo form_open("checklogin/Logoutuser", $attributes);?>
                              <h5><img height=50 width=50 src="<?php echo base_url("cart.png"); ?>"  /> | สวัสดีครับ : <span>คุณ<?php echo $this->session->userdata('Fname'); ?></span></h5>
                              <button class="btn btn_" type="submit"><span style="color:#FFFFFF;text-align:center;" >Logout</span></button>
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
                                        <li class="sub-menu"><a href="#">Category</a>
                                          <ul>
                                            <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องสาย');?>" id="s1">เครื่องสาย</a></li>
                                            <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องตี');?>" id="s2">เครื่องตี</a></li>
                                            <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องดีด');?>" id="s3">เครื่องดีด</a></li>
                                            <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องสี');?>" id="s4">เครื่องสี</a></li>
                                            <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องเป่า');?>" id="s5">เครื่องเป่า</a></li>
                                          </ul>
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
            <br>
            <li class="container">
                <div class="social-icons">
                    <table>
                    <tr><td><h2><font size="7" style="color:white;"><FONT FACE="AngsanaUPC">รายการบริจาค</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
                    <td><form id="search-form" action="<?= base_url() ?>index.php/linkquery/SearchshowDonate" method="GET" accept-charset="utf-8" class="navbar-form" >
                    <div class="search-form">
                    <input type="text" name="keyword"  >
                    <a href="#" onClick="document.getElementById('search-form').submit()"></a>
                    </div></td></tr>
                    <div class="span4">
                    <tr><td></td>
                    <td>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Typesearch" value="1" size="3">&nbsp;&nbsp;<bold><font size="3">ประเภท</font></bold> &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Typesearch" value="2" size="3">&nbsp;&nbsp;<bold><font size="3">ชื่อ</font></bold>&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="Typesearch" value="3" size="3" checked>&nbsp;&nbsp;<bold><font size="3">keyword</font></bold>&nbsp;&nbsp;&nbsp;

                    </td></tr>
                    </div>
                    </form>
                    </table>
                    </div>

                    <?php if ($this->session->userdata('word')) { ?>
                      <span><font size="4"><br>คำค้นหา : <?php echo $this->session->userdata('word'); ?></font></span>
                    <?php } ?>

            </li>
            <?php if ($results == null) {?>
                <br><br>
                <div class="" align="center">
                  <span><font size="6"><br>ไม่มีข้อมูล</font></span>
                </div>

          <?php  }else {?>
            <?php
            foreach($results as $data) { ?>
            <li class="span3">
                <div class="thumbnail">
                    <div class="caption">
                      <a href="<?php echo base_url("index.php/linkquery/showlistdetail?donateid=$data->donateID");?>">
                        <div class="img-resize"><img id='output' src="<?php echo base_url("image/$data->donatePathIMG"); ?>"  alt=""/></div></a>
                        <h3><?php echo $data->donateName ?></h3>
                        <h5>ผู้บริจาค : คุณ<?php echo $data->Fname . " " . $data->Lname ?></h5>
                    </div>
                    <div class="thumbnail-pad">
                        <a href="<?php echo base_url("index.php/linkquery/showlistdetail?donateid=$data->donateID");?>" class="btn btn_">more info</a>
                    </div>
                </div>
            </li>
            <?php
            }
            ?>
        <?php } ?>

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
                    <li><a href="<?php echo base_url('index.php/startweb');?>" class="current">Home Page</a>|</li>
                    <li><a href="#">Statistic</a>|</li>
                    <li class="sub-menu"><a href="#">Category</a>
                      <ul>
                        <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องสาย');?>" id="s6">เครื่องสาย</a></li>
                        <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องตี');?>" id="s7">เครื่องตี</a></li>
                        <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องดีด');?>" id="s8">เครื่องดีด</a></li>
                        <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องสี');?>" id="s9">เครื่องสี</a></li>
                        <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องเป่า');?>" id="s10">เครื่องเป่า</a></li>
                      </ul>
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
