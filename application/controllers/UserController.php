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
     $IDCard = htmlentities($_POST["IDCard"]);
     $Fname = htmlentities($_POST["Fname"]);
     $Lname = htmlentities($_POST["Lname"]);
     $Address = htmlentities($_POST["Address"]);
     $Tel = htmlentities($_POST["Tel"]);
     $Email = htmlentities($_POST["Email"]);
     $Password = htmlentities($_POST["Password"]);
     $confirmPassword = htmlentities($_POST["confirmPassword"]);
     $Province = htmlentities($_POST["Province"]);
     $Didtrict = htmlentities($_POST["Didtrict"]);
     $Postcode = htmlentities($_POST["Postcode"]);
     $Qmember = htmlentities($_POST["Qmember"]);
     $Ansmember = htmlentities($_POST["Ansmember"]);
     $Passwordhash = hash('sha256', $Password);
     $Cuser = $this->user->checkuser($Email);
      $Overlapid =$this->user->checkoverlapssid($IDCard);
      $new_name = time().rand();
      $config['file_name'] = $new_name;
      $config['upload_path']          = 'image/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
      $this->load->library('upload', $config);
    if (($_POST["IDCard"] != null) && ($_POST["Fname"] != null) && ($_POST["Lname"] != null) && ($_POST["Address"] != null) && ($_POST["Tel"] != null) &&
      ($_POST["Email"] != null) && ($_POST["Password"] != null) && ($_POST["confirmPassword"] != null) && ($_POST["Province"] != null) && ($_POST["Didtrict"] != null) &&
    ($_POST["Postcode"] != null) && ($_POST["Qmember"] != null) && ($_POST["Ansmember"] != null)) {
      if ($Password == $confirmPassword) { //check password ตรงกันหรือไม่ ?
        if ($Cuser == 0) { //เช็ค email ซ้ำกันหรือไม่
          if ($Overlapid == 0) { //เช็คว่า ID ซ้ำหรือไม่หรือไม่
            if ($this->upload->do_upload('userPathIMG')) { //เช็คว่า อัพรูปได้หรือไม่
              $imagepath = $new_name . $this->upload->data('file_ext');
              $this->user->insertuser($IDCard,$Fname,$Lname,$Address,$Tel,$Email,$Passwordhash,$Province,$Didtrict,$Postcode,$Qmember,$Ansmember,$imagepath);
              $check = 4;
              echo $check;
            } else {
              $check = 3;
              echo $check;
            }
          }else {
            $check = 2;
            echo $check;
          }
        }else {
          $check = 1;
          echo $check;
        }
      }else {
        $check = 0;
        echo $check;
      }
    }else {
      $check = 5;
      echo $check;
    }
  }

  public function checkuser()
  {
    $inputpage = $this->input->post("email");
    $check = $this->user->checkuser($inputpage);
    echo $check;
  }

  public function checkid()
  {
    $inputid = $this->input->post("id");
    $check1 = $this->user->checkoverlapssid($inputid);
    echo $check1;
  }
  public function checkidusenot()  //เช็คว่า ID ถูกต้องตามหลักหรือไม่ *ยังไม่ได้ใช้
  {
    $inputid2 = $this->input->post("id");
    $check2 = $this->user->checkssid($inputid2);
    echo $check2;
  }

  public function Forgetpassword($email,$Qmember,$Ansmember)
  {
      $email = htmlentities($_POST["donateName"]);
      $Qmember = htmlentities($_POST["donateName"]);
      $Ansmember = htmlentities($_POST["donateName"]);
  }
}

 ?>
