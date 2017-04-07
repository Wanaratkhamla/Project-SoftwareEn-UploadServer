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

  public function index()   //เช็คการ login
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
      if ($result['memberType'] == 0) { //check รอการอัพเดต
        $check = 7;
        echo $check;
      }elseif ($result['memberType'] == 1) { //check member ?
        $sess_array = array(
          'id' => $result['IDCard'],
          'Fname' => $result['Fname']
        );
        $this->session->sess_expiration = '7200';
        $this->session->set_userdata($sess_array);
        $data = array("Fname" => $this->session->userdata('Fname'),
                      "check" => 5
                      );
        echo json_encode($data);
      }elseif ($result['memberType'] == 2) { //check admin ?
        $sess_array = array(
          'id' => $result['IDCard'],
          'Fname' => $result['Fname'],
          'Typemember' => $result['memberType']
        );
        $this->session->sess_expiration = '7200';
        $this->session->set_userdata($sess_array);
        $data = array("Fname" => $this->session->userdata('Fname'),
                      "check" => 6
                      );
        echo json_encode($data);
      }
    }
  }

  public function Logoutuser() //function สำหรับการ logput
  {
    $this->session->sess_destroy();
    redirect('startweb');
  }

}
?>
