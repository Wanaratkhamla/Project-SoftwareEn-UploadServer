<?php
/**
 *
 */
class captcha extends CI_Model
{
  public function __construct()
  {
    # code...
      parent::__construct();
      $this->load->helper('captcha');
  }

  function CreateCaptcha()
  {
          $vals = array(
              'img_path'      => 'captcha/',
              'img_url'       =>  base_url() . 'captcha/',
              'font_path'     => 'captcha/times_new_yorker.ttf',
              'img_width'     => 200,
              'img_height'    => 80,
              'expiration'    => 7200,
              'word_length'   => 4,
              'font_size'     => 35,
              'img_id'        => 'Imageid',
              'pool'          => '0123456789ABCDEFGHIJKLMNPQRSTUVWXYZ',

              // White background and border, black text and red grid
                      'colors'        => array(
                      'background' => array(255, 255, 255),
                      'border' => array(255, 255, 255),
                      'text' => array(0, 0, 0),
                      'grid' => array(255, 40, 40)
              )
      );
      $cap = create_captcha($vals);
      return $cap;
  }
}

 ?>
