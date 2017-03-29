<?php
if($data['donateTypesend'] == "1"){
  $send = "ส่งไปรษณีย์";
}elseif($data['donateTypesend'] == "2"){
  $send = "ส่งไปรษณีย์";
}else{
  $send = "นัดรับ";
}

 ?>
<html>
<head>
<title>Upload Form</title>
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
$(document).ready(function(){
    $('#Edit').click(function() {
       testfunction();
    });
    // $('#Edit').click(function() {
    //   var url = 'http://example.com/vote/' + Username;
    //   var form = $('<form action="' + url + '" method="post">' +
    //     '<input type="text" name="donateID" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateName" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateSize" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateweight" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateEA" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donatecolor" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateType" value="' + Return_URL + '" />' +
    //     '<input type="text" name="donateDetail" value="' + Return_URL + '" />' +
    //     '<input type="file" name="donatePathIMG" value="' + Return_URL + '" />' +
    //     '</form>');
    //   $('body').append(form);
    //   form.submit();
    // });
});
</script>

</head>
<body>

  <table border="1" height=350 width=350>
    <tr>
      <?php $image =  $data['donatePathIMG'];?>
      <td><img id='output' height=350 width=350 src="<?php echo base_url("image/$image"); ?>" height=100 width=100 /></td>
    </tr>
  </table>
  <?php
    $attributes = array("method" => "POST", "autocomplete" => "on");
    echo form_open("linkdonate/linkEditdonate", $attributes);?>
  <input type="hidden" name="donateID" value="<?php echo $data['donateID'] ?>">;
  ชื่อของบริจาค : <span><?php echo $data['donateName'] ?></span><br>
  กว้าง : <span><?php echo $data['donateLength'] ?></span><br>
  ยาว : <span><?php echo $data['donatewidth'] ?></span><br>
  น้ำหนัก(กิโลกรัม) : <span><?php echo $data['donateweight'] ?></span><br>
  จำนวนชิ้น : <span><?php echo $data['donateEA'] ?></span><br>
  สี : <span><?php echo $data['donatecolor'] ?></span><br>
  ประเภท : <span><?php echo $data['donateType'] ?></span><br>
  <?php
      if ($data['donateTypesend'] == "3") {
        echo "  รายละเอียด : <span>" . $data['donateDetail'] . "</span><br>";
      }
   ?>
  ประเภทการส่ง : <span><?php echo $send ?></span><br>
  <button type="submit" class="btn btn_ btn-small_" id="Edit">แก้ไขข้อมูล</button>
  <?php echo form_close(); ?>

  <?php
    $attributes = array("method" => "POST", "autocomplete" => "on");
    echo form_open("linkdonate", $attributes);?>
    <button type='submit' class="btn btn_ btn-small_"><span style="color:#FFFFFF;text-align:center;">เพิ่มสินค้าใหม่</span></button>
  <?php echo form_close(); ?>

</body>
</html>
