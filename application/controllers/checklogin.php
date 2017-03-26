<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class checklogin extends CI_Controller
{

  public  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
    # code...
  }

  public function index()
  {

    $email = htmlentities($_POST["Email"]);
    $password = htmlentities(hash('sha256', $_POST["password"]));

    $result = $this->user->listname($email, $password);
    if($result == 0){
        if($email == null && $_POST["password"] == null){
          $check = 2;
          echo $check;
        }else if($email == null){
          $check = 3;
          echo $check;
        }else if($_POST["password"] == null){
          $check = 4;
          echo $check;
        }else{
          $check = 1;
          echo $check;
        }
    }else{
      $check = 5;
      foreach($result as $row)
         {
           $sess_array = array(
             'id' => $row->IDCard,
             'Fname' => $row->Fname
           );
           $this->session->sess_expiration = '7200';
           $this->session->set_userdata($sess_array);
         }
      echo $check;
    }
  }

  public function showlist()
  {
    $email = htmlentities($_POST["Email"]);
    $password = htmlentities(hash('sha256', $_POST["password"]));
    $result = $this->user->listname($email, $password);
    foreach ($result as $row) {
      echo "Successfuly!!!"; echo '<br>';
      echo "บัตรประชาชน : " . $row->IDCard; echo '<br>';
      echo "ชื่อจริง : ". $row->Fname; echo '<br>';
      echo "นามสกุล : " . $row->Lname; echo '<br>';
      echo "ที่อยู่ : " . $row->Address; echo '<br>';
      echo "เบอร์โทรศัพท์ : " . $row->Tel; echo '<br>';
      echo "Email : " . $row->Email; echo '<br>';
      echo "จังหวัด : " . $row->Province; echo '<br>';
      echo "ตำบล : " . $row->Didtrict; echo '<br>';
      echo "รหัสไปรษณีย์ : " . $row->Postcode; echo '<br>';
    }
  }

  public function Logoutuser()
  {
    $this->session->sess_destroy();
    redirect('startweb');
  }
}
?>
