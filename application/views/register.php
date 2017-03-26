<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musical Happy Share</title>
<meta name="keywords" content="Metallic Website Template, free css template, free website template, CSS, XHTML" />
<meta name="description" content="Metallic Website - free xhtml/css website template by templatemo.com" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('Boostap/templatemo_style.css');?>" media="all"/>
<script type="text/javascript" src="<?php echo base_url('Boostap2/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('Boostap2/js/pop-up.js');?>"></script>
<script>

$(document).ready(function() {
		$("#Email").keyup(function() {
				var getemail = $('#Email').val();
				var lengthemail = getemail.length;
				var checkoverlap = "email=" + getemail ;
				$.ajax({
				 url:"usercontroller/checkuser",
				 data:checkoverlap,
				 type:"POST",
				 success:function(res){
					 if (lengthemail > 5) {
						 if (res == 1) {
  						 $("#Email").css("background-color", "#ff6666");
							 $("#usercheck").text("Email นี้ถูกใช้งานแล้ว");
							 $("#usercheck").css("color", "ff6666");
  					 }else{
  						 $("#Email").css("background-color", "#66cc66");
							 $("#usercheck").text("Email สามารถใช้งานได้");
							 $("#usercheck").css("color", "66cc66");
  					 }
					 }else{
						 	 $("#Email").css("background-color", "#ff6666");
							 $("#usercheck").text("Password น้อยกว่า 6 อักขระ");
							 $("#usercheck").css("color", "ff6666");
					 }
				 }
				});
		});

		$('#Refcaptcha').click(function() {
			$.ajax({
				url:"index.php/startweb/refreshcaptchaimage",
				type: "POST",
				dataType: 'json',
				success:function(res){
				getcode2 = res.word
				document.getElementById("captchas").innerHTML = res.image;
				$('#ccha').removeAttr('value');
				$("#submitregisters").prop('disabled', true);
				$('#email').removeAttr('value');
				$('#password').removeAttr('value');
			 }
			});
		});

		$("#ccha").keyup(function() {
			var getcode = $('#ccha').val();
			var getcode2 = '<?php echo $word;?>';
			if (getcode == getcode2) {
					$("#submitregister").prop('disabled', false);
			}else{
					$("#submitregister").prop('disabled', true);
			}
		});
		
		$("#idcade").keyup(function () {
			var getid = $('#idcade').val();
			var lengthid = getid.length;
			var checkoverlapid = "id=" + getid ;
			$.ajax({
				url:"usercontroller/checkid",
				data:checkoverlapid,
				type:"POST",
				success:function(check){
					if (lengthid == 13){
						if (check == 1) {
							$("#idcade").css("background-color", "#ff6666");
							$("#idcheck").text("บัตรประชาชนนี้ถูกใช้งานแล้ว");
							$("#idcheck").css("color", "ff6666");
						}else{
							$.ajax({
								url:"usercontroller/checkidusenot",
								data:checkoverlapid,
								type:"POST",
								success:function(testid){
									if (testid == 1) {
										$("#idcade").css("background-color", "#66cc66");
										$("#idcheck").text("บัตรประชาชนสามารถใช้งานได้");
										$("#idcheck").css("color", "66cc66");
									}else{
										$("#idcade").css("background-color", "#ff6666");
										$("#idcheck").text("บัตรประชาชนนี้ไม่สามารถใช้ได้");
										$("#idcheck").css("color", "ff6666");
									}
			  			 	}
							});
						}
					}else if(lengthid > 13){
							$("#idcade").css("background-color", "#ff6666");
							$("#idcheck").text("บัตรประชาชนมากกว่า 13 อักขระ");
							$("#idcheck").css("color", "ff6666");
					}else {
						$("#idcade").css("background-color", "#ff6666");
						$("#idcheck").text("บัตรประชาชนน้อยกว่า 13 อักขระ");
						$("#idcheck").css("color", "ff6666");
					}
				}
			});

		});
});
</script>
<script>
		function checkid() {

		var pass1 = document.getElementById('idcade').value;
		var sum = 0;
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
		for(i = 0;i < pass1.length-1 ;i++){
			sum = sum + parseInt(pass1[i]) * (13-i);
		}
		sum = sum % 11;
		sum = 11 - sum;

		if(sum == pass1[12]){
			document.getElementById("idcade").style.backgroundColor = goodColor;
		}else{
			document.getElementById("idcade").style.backgroundColor = badColor;
		}
		}

		function checkPass()
		{

				var pass1 = document.getElementById('searchfielddd');
				var pass2 = document.getElementById('searchfieldd');
				var message = document.getElementById('confirmMessage');
				var goodColor = "#66cc66";
				var badColor = "#ff6666";
				if(pass1.value == pass2.value){
						pass2.style.backgroundColor = goodColor;
						message.style.color = goodColor;
						message.innerHTML = "Passwords Match!"
				}else{
						pass2.style.backgroundColor = badColor;
						message.style.color = badColor;
						message.innerHTML = "Passwords Do Not Match!"
				}
		}
</script>
</head>
<body>
<div id="templatemo_container">
	<div id="templatemo_top_panel">
		<!--  Free CSS Templates @ www.TemplateMo.com  -->
    	<div id="top_panel_ls">
            <div id="templatemo_site_title">Music Happy  <br><br> Share</div>
        </div>

      <div id="top_panel_rs">
            <div id="search_section">
                <form action="#" method="get">
                    <input type="text" name="q" size="10" id="searchfield" title="searchfield" />
                  <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
                </form>
            	<div class="cleaner"></div>
            </div>

            <div id="templatemo_menu">
                <ul>
                    <li><a href="#" class="current"><span></span>Home</a></li>
                    <li><a href="#"><span></span>Products</a></li>
                    <li><a href="#"><span></span>Services</a></li>
                    <li><a href="#"><span></span>Company</a></li>
                    <li><a href="#"><span></span>Contact</a></li>
                </ul>
                <div class="cleaner"></div>
            </div> <!-- end of menu -->

            <div class="cleaner"></div>
	  </div>
    </div> <!-- end of top _panel -->
    <div id="ct"></div>

    <div id="templatemo_content">
			<div id="banner_header_01"><center>Register</center></div>
			<div id="banner_header_02"><center>สมัครเพื่อใช้งานฟังก์ชันของเว็บไซต์</center></div>
        <div id="banner_text">
            <center><?php
                $attributes = array("method" => "POST", "autocomplete" => "on");
                echo form_open("usercontroller", $attributes);?>

							<div class="search_section">
									 <div class="col-sm-8">
										E-mail : <input class="form-control" id="Email" type="text" name="Email" placeholder="Enter your email address" multiple>
											</div>
											<span id="usercheck" class="usercheck"></span>
								</div>
								<br>

                <div class="search_section">
               <div class="col-sm-8">
                Password : <input class="form-control" id="searchfielddd"  type="password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                 placeholder="Enter password" title="Invalid Format" required>

               </div><br>
               <p>รหัสผ่านอย่างน้อย 8 ตัว ประกอบด้วย ตัวอักษรพิมพ์ใหญ่ พิมพ์เล็ก ตัวเลข อย่างน้อย 1 ตัว</p>
              </div>
                <div class="search_section">
               <div class="col-sm-8">
                Re-Password : <input class="form-control" id="searchfieldd"  type="password" name="conpassword" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                placeholder="Confirm password" title="Invalid Format" onkeyup="checkPass(); return false;" required><br>
                <span id="confirmMessage" class="confirmMessage"></span>
               </div><br>
              </div>
                <div class="search_section">
              <div class="col-sm-8">
                ชื่อ : <input class="form-control" id="fname" type="text" name="fname" placeholder="Enter name" required>
              </div><br>
              </div>
                <div class="search_section">
              <div class="col-sm-8">
               สกุล : <input class="form-control" id="lname" type="text" name="lname" placeholder="Enter surname" required>
              </div><br>
              </div>
                <div class="search_section">
              <div class="col-sm-8">
              เลขบัตรประจำตัวประชาชน : <input class="form-control" id="idcade" type="text" name="idcard" pattern="[0-9]{13}" placeholder="Enter your ID number" required><br>
              <span id="idcheck" class="idcheck"></span>
              <br>
              </div><br>
              </div>
  							<div class="search_section">
              <div class="col-sm-8">
              ที่อยู่ : <textarea id="Address" class="form-control" rows="4" cols="32" name="Address" required></textarea>
              </div>
              </div><br>



                <div class="search_section">
              <div class="col-sm-8">
                อำเภอ : <input class="form-control" id="Province" type="text" name="Province" placeholder="Enter District Residents" required>
              </div><br>
              </div>
                <div class="search_section">
               <div class="col-sm-8">
               จังหวัด : <input class="form-control" id="Didtrict" list="จังหวัด" name="Didtrict" required>
                <datalist id="จังหวัด">
                  <option value="กรุงเทพมหานคร">
                  <option value="กระบี่">
                  <option value="กาญจนบุรี">
                  <option value="กาฬสินธุ์">
                  <option value="กำแพงเพชร">
                  <option value="ขอนแก่น">
                  <option value="จันทบุรี">
                  <option value="ฉะเชิงเทรา">
                  <option value="ชลบุรี">
                  <option value="ชัยนาท">
                  <option value="ชัยภูมิ">
                  <option value="ชุมพร">
                  <option value="เชียงราย">
                  <option value="เชียงใหม่">
                  <option value="ตรัง">
                  <option value="ตราด">
                  <option value="ตาก">
                  <option value="นครนายก">
                  <option value="นครปฐม">
                  <option value="นครพนม">
                  <option value="นครราชสีมา">
                  <option value="นครศรีธรรมราช">
                  <option value="นครสวรรค์">
                  <option value="นนทบุรี">
                  <option value="นราธิวาส">
                  <option value="น่าน">
                  <option value="บึงกาฬ">
                  <option value="บุรีรัมย์">
                  <option value="ปทุมธานี">
                  <option value="ประจวบคีรีขันธ์">
                  <option value="ปราจีนบุรี">
                  <option value="ปัตตานี">
                  <option value="พระนครศรีอยุธยา">
                  <option value="พังงา">
                  <option value="พัทลุง">
                  <option value="พิจิตร">
                  <option value="พิษณุโลก">
                  <option value="เพชรบุรี">
                  <option value="เพชรบูรณ์">
                  <option value="แพร่">
                  <option value="พะเยา">
                  <option value="ภูเก็ต">
                  <option value="มหาสารคาม">
                  <option value="มุกดาหาร">
                  <option value="แม่ฮ่องสอน">
                  <option value="ยะลา">
                  <option value="ยโสธร">
                  <option value="ร้อยเอ็ด">
                  <option value="ระนอง">
                  <option value="ระยอง">
                  <option value="ราชบุรี">
                  <option value="ลพบุรี ">
                  <option value="ลำปาง">
                  <option value="ลำพูน">
                  <option value="เลย">
                  <option value="ศรีสะเกษ">
                  <option value="สกลนคร">
                  <option value="สงขลา">
                  <option value="สตูล">
                  <option value="สมุทรปราการ">
                  <option value="สมุทรสงคราม">
                  <option value="สมุทรสาคร">
                  <option value="สระแก้ว">
                  <option value="สระบุรี">
                  <option value="สิงห์บุรี">
                  <option value="สุโขทัย">
                  <option value="สุพรรณบุรี">
                  <option value="สุราษฎร์ธานี">
                  <option value="สุรินทร์">
                  <option value="หนองคาย">
                  <option value="หนองบัวลำภู">
                  <option value="อ่างทอง">
                  <option value="อุดรธานี">
                  <option value="อุทัยธานี">
                  <option value="อุตรดิตถ์">
                  <option value="อุบลราชธานี">
                  <option value="อำนาจเจริญ">
                </datalist>
               </div>
              </div><br>
                <div class="search_section">
                 <div class="col-sm-8">
                   รหัสไปรษณีย์ : <input class="form-control" id="Postcode" type="text" name="Postcode" pattern="[0-9]{5}" placeholder="Enter postcode">
                    </div>
              </div><br>
                <div class="search_section">
                   <div class="col-sm-8">
                    โทรศัพท์ : <input class="form-control" id="Tel" type="text" name="Tel" pattern="\d\d-\d\d\d\d-\d\d\d\d" title="08-6371-8551" placeholder="Pattern:08-9584-8910" required>
                      </div>
                </div><br>


										<?php echo '<br><span id="captchas" style="color:#ff0000;text-align:center;">'  . $image . '</span>'; ?>
										<button type="button" id='Refcaptcha'><img src="<?php echo base_url('recaptcha.png');?>" width="20" height="20"></button>

                <div class="search_section">
                       <div class="col-sm-8">
                        <br> Code : <input class="form-control" id="ccha" type="text" name="ccha">

                          </div>
                      </div><br>

                <div class="search_section">
                     <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-8">
                         <button id="submitregisters" type="submit" class="btn btn-default" disabled>สมัครสมาชิก</button><br><br>
                        <br><br>
  										</div>
                      </div>

            <?php echo form_close(); ?></center>

        </div>
    </div>	<!-- end of banner -->

    <div id="cb"></div>
    <div id="templatemo_footer">
        ความสุขของเรา เริ่มต้นที่การแบ่งปัน
    </div> <!-- end of footer -->
<!--  Free Web Templates @ TemplateMo.com  -->
</div> <!-- end of container -->
</html>
