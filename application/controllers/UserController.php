<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class usercontroller extends CI_Controller
{

  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('user','',TRUE);
    $this->load->model('captcha','',TRUE);
  }

  public function index()
  {
    # code...
     $idcade = htmlentities($_POST["idcard"]);
     $fname = htmlentities($_POST["fname"]);
     $lname = htmlentities($_POST["lname"]);
     $address = htmlentities($_POST["Address"]);
     $tel = htmlentities($_POST["Tel"]);
     $email = htmlentities($_POST["Email"]);
     $password = htmlentities($_POST["password"]);
     $conpassword = htmlentities($_POST["conpassword"]);
     $Province = htmlentities($_POST["Province"]);
     $Didtrict = htmlentities($_POST["Didtrict"]);
     $Postcode = htmlentities($_POST["Postcode"]);

     $Cuser = $this->user->checkuser($email);
     $Cid = $this->user->checkssid($idcade);
     $Overlapid =$this->user->checkoverlapssid($idcade);

     if ($Cuser == 0) { //เช็ค email ซ้ำกันหรือไม่
       if ($Overlapid == 0) { //เช็คว่า ID ซ้ำหรือไม่หรือไม่
          if ($Cid == 1) {  //เช็คว่า ID ถูกหรือไม่
            if ($password == $conpassword) { //เช็คว่า พาสเวิด ตรงกันหรือไม่
                  $encodepass = hash('sha256', $password);
                  $this->user->insertuser($idcade,$fname,$lname,$address,$tel,$email,$username,$encodepass,$Province,$Didtrict,$Postcode);
                  echo '<script language="javascript">';
                  echo 'alert("registry Complete!!!!")';
                  echo '</script>';
                  $this->load->helper(array('form'));
                  $this->load->view('login');
            }else{
              $captcha = $this->captcha->CreateCaptcha();
              echo '<script language="javascript">';
              echo 'alert("Password incorrect!!!")';
              echo '</script>';
              $this->load->helper(array('form'));
              $this->load->view('register' , $captcha);
            }
          }else {
            $captcha = $this->captcha->CreateCaptcha();
            echo '<script language="javascript">';
            echo 'alert("บัตรประชาชนไม่ถูกต้อง !!!")';
            echo '</script>';
            $this->load->helper(array('form'));
            $this->load->view('register' , $captcha);
          }
        }else {
          $captcha = $this->captcha->CreateCaptcha();
          echo '<script language="javascript">';
          echo 'alert("บัตรประชาชนนี้ถูกใช้แล้ว!!!")';
          echo '</script>';
          $this->load->helper(array('form'));
         $this->load->view('register' , $captcha);
       }
     }else {
       $captcha = $this->captcha->CreateCaptcha();
       echo '<script language="javascript">';
       echo 'alert("Emailนี้ถูกใช้งานแล้ว!!!")';
       echo '</script>';
      $this->load->helper(array('form'));
      $this->load->view('register' , $captcha);
     }
     // $this->user->insertuser($idcade,$fname,$lname,$address,$tel,$email,$username,$password,$Province,$Didtrict,$Postcode);
    // $this->user->insertuser('2561200748184','Wanart','khamla','119','0827505687','nos@kkumail.com','admin123','admin12345','ขอนแก่น','เมือง','40000');
  }

  public function checkuser(){
    $inputpage = $this->input->post("email");
    $ccc = $this->user->checkuser($inputpage);
    echo $ccc;
  }
  public function checkid()
  {
    $inputid = $this->input->post("id");
    $check1 = $this->user->checkoverlapssid($inputid);
    echo $check1;
  }
  public function checkidusenot()  //เช็คว่า ID ถูกต้องตามหลักหรือไม่
  {
    $inputid2 = $this->input->post("id");
    $check2 = $this->user->checkssid($inputid2);
    echo $check2;
  }

  
}

 ?>
