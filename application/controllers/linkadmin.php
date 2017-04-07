<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class linkadmin extends CI_Controller
{

  public function index() //Controller สำหรับ link ไปยังหน้า Admin
  {
    if ($this->session->userdata('Typemember') == 2) {
      $captcha['error'] = 1;
      $captcha['admin'] = 2;
      $this->load->view('home' , $captcha);
    }else{
      $captcha = $this->captcha->CreateCaptcha();
      $this->load->view('home' , $captcha);
    }

  }
}
 ?>
