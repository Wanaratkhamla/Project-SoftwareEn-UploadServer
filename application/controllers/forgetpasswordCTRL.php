<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class forgetpasswordCTRL extends CI_Controller
{
  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('user','',TRUE);
    $this->load->model('captcha','',TRUE);
  }

  public function index() //สำหรับ link ไปยังหน้า Forgetpassword ถามคำถาม และ เลือกคำตอบ
  {
    $captcha = $this->captcha->CreateCaptcha();
    $this->load->view('ForgetPassword' , $captcha);
  }

  public function checkEmailandQA() //เช็คว่ามี Email นี้หรือไม่ คำถาม คำตอบ ตรงกันหรือไม่
  {
    $Email = htmlentities($_POST["Email"]);
    $Qmember = $_POST["Qmember"];
    $Ansmember = htmlentities($_POST["Ansmember"]);
    $result = $this->user->checkForgetpassword($Email,$Qmember,$Ansmember);
    if ($result == 0) {
      $check = 0;
      echo $check;
    }else{
      $data = array("IDCard" => $result['IDCard']
                    );
      echo json_encode($data);
    }
  }

  public function linkResertPassword() //Function สำหรับ link ไปยังหน้า ตั้งรหัสผ่านใหม่
  {
    $IDCard = htmlentities($_POST["IDCard"]);
    $captcha = $this->captcha->CreateCaptcha();
    $captcha['IDCard'] = $IDCard;
    $this->load->view('ResetPassword' , $captcha);
  }

  public function UpdatePass() //Controller สำหรับใช้งาน การupdate Password ใหม่
  {
    $IDCard = htmlentities($_POST["IDCard"]);
    $password = htmlentities(hash('sha256', $_POST["Password"]));
    $this->user->UpdatePassword($IDCard,$password);
    $data = array("check" => 1
                  );
    echo json_encode($data);
  }


}

 ?>
