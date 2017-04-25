<?php
if($data['donateTypeSendID'] == "1"){
  $send = "ส่งไปรษณีย์";
}elseif($data['donateTypeSendID'] == "2"){
  $send = "รับที่องค์กร";
}else{
  $send = "นัดรับ";
}
$id1 = $data['donateID'];
 ?>
<html>
<head>
<title>รายละเอียดของบริจาค</title>
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
                                          <li class="sub-menu"><a href="#" id="Categorydropdown">Category</a>
                                            <ul>
                                              <li><a href="<?php echo base_url('index.php/linkquery');?>" id="s0">เรียงตามวันที่</a></li>
                                              <li class="sub-menu"><a href="#" id="typedropdown">เรียงตามประเภท</a>
                                                <ul>
                                                  <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องตี');?>" id="s2">เครื่องตี</a></li>
                                                  <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องดีด');?>" id="s3">เครื่องดีด</a></li>
                                                  <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องสี');?>" id="s4">เครื่องสี</a></li>
                                                  <li><a href="<?php echo base_url('index.php/linkquery/SelectCategory?keyword=เครื่องเป่า');?>" id="s5">เครื่องเป่า</a></li>
                                                </ul>
                                              </li>
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
<section id="content">
  <div class="sub-content">
    <div class="container">
      <div class="row">
<div class="span6">
  <table border="0" height=500 width=500>
    <tr>
      <?php $image =  $data['donatePathIMG'];?>
      <td><img id='output' height=500 width=500 src="<?php echo base_url("image/$image"); ?>" height=500 width=500 /></td>
    </tr>
  </table>
  </div>
<br>
        <br>
<div class="span5">

  <?php
    $attributes = array("method" => "POST", "autocomplete" => "on");
    echo form_open("linkdonate/linkEditdonate", $attributes);?>
  <input type="hidden" name="donateID" value="<?php echo $data['donateID'] ?>">
  <table>
    <tr><td><h3>รายละเอียดสินค้า</h3></td></tr>
    <tr><td><h5>ชื่อของบริจาค :</h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donateName'] ?></span></td></tr>
    <tr><td><h5>กว้าง(CM) : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donateLength'] ?></span></td></tr>
    <tr><td><h5>ยาว(CM) : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donatewidth'] ?></span></td></tr>
    <tr><td><h5>น้ำหนัก(กิโลกรัม) : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donateweight'] ?></span></td></tr>
    <tr><td><h5>สภาพของบริจาค : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donatecondition'] . " " . " % " ?></span></td></tr>
    <tr><td><h5>สี : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donatecolor'] ?></span></td></tr>
    <tr><td><h5>ประเภท : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donateType'] ?></span></td></tr>
    <tr><td><h5>รายละเอียดของบริจาค :</h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $data['donateDetail'] ?></span></td></tr>
    <tr><td><h5>ประเภทการส่ง : </h5></td><td>&nbsp;&nbsp;&nbsp;<span><?php echo $send ?></span></td></tr>

    <tr><td><h5>จำนวนชิ้น : </h5></td><td>&nbsp;&nbsp;&nbsp;<select name="donateEA" id="donateEA">
      <?php for ($i=0; $i <= $data['donateEA']; $i++) { ?>
        <option value=<?php echo $data['donateEA'] - $i ?>><?php echo $data['donateEA'] - $i ?></option>
    <?php  } ?>
    </select></td></tr>
    <?php
        if ($data['donateTypeSendID'] == "3") {
          echo "<tr><td><h5>รายละเอียดการส่ง :</h5></td><td>&nbsp;&nbsp;&nbsp;<span>" . $data['donatesendDetail'] . "</span></td></tr>";
        }
     ?>
  </table>
  <table>
    <tr><td><button type='button' class="btn btn_ btn-small_"><span style="color:#FFFFFF;text-align:center;"><a style="color:white;" href="#">I Need Them</a></span></button>
    <button type="button" class="btn btn_ btn-small_" id="Edit"><a style="color:white;" href="<?php echo base_url('index.php/linkquery');?>">กลับสู่หน้าเลือกสินค้า</a></button>
  <?php echo form_close(); ?></td></tr></table>
<!-- เพิ่มเข้ามา -->

  <!-- เพิ่มเข้ามา -->
  </div>
        </div></div></div></section>

        <section id="content" class="main-content">
        <div class="container">
          <div class="row">
              <div class="span12">
                <h3 style="color:white;">รายการใกล้เคียง</h3>
                  <ul class="thumbnails">
                    <br>
                    <?php if ($data2 == null) {?>
                        <br><br>
                        <div class="" align="center">
                          <span><font size="6"><br>ไม่มีข้อมูล</font></span>
                        </div>

                  <?php  }else if($row == 1){?>
                    <br><br>
                    <div class="" align="center">
                      <span><font size="6"><br>ไม่มีข้อมูล</font></span>
                    </div>
                  <?php
                }else{foreach($data2 as $data) {
                      if ($data->donateID != $id1) {
                      ?>
                    <li class="span3">
                        <div class="thumbnail">
                            <div class="caption">
                              <a href="<?php echo base_url("index.php/linkquery/showlistdetail?donateid=$data->donateID");?>">
                                <div class="img-resize" id="<?php echo $data->donateID?>"><img id='output' src="<?php echo base_url("image/$data->donatePathIMG"); ?>"  alt=""/></div></a>
                                <h3><?php echo $data->donateName ?></h3>
                                <h5>ผู้บริจาค : คุณ<?php echo $data->Fname . " " . $data->Lname ?></h5>
                                <h5>บริจาค : <?php echo $data->donateTimestamp ?></h5>
                            </div>
                            <div class="thumbnail-pad">
                                <a href="<?php echo base_url("index.php/linkquery/showlistdetail?donateid=$data->donateID");?>" class="btn btn_" id="<?php echo $data->donateID?>">more info</a>
                            </div>
                        </div>
                    </li>
                    <?php
                      }
                    }
                    ?>
                <?php } ?>

                  </ul>
              </div>
           </div>
        </div>
        </section>

<!--========================================================================================================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="span4 float2">
            </div>
            <div class="span8 float">
                <ul class="footer-menu">
                    <li><a href="<?php echo base_url('index.php/startweb');?>" class="current">Home Page</a>|</li>
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
