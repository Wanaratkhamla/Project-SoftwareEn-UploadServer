<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class startweb extends CI_Controller
{

  public function index()
  {
    # code...

    $captcha = $this->captcha->CreateCaptcha();
    $this->load->view('home' , $captcha);
    

  }

  public function refreshcaptchaimage()
  {
    # code...
    $this->output->set_content_type('application/json');
    $captcha = $this->captcha->CreateCaptcha();
    $data = array("image" => $captcha['image'],
                  "word" => $captcha['word']
                  );
    echo json_encode($data);
    // echo $captcha;
  }
}
 ?>
