<?php
/**
 *
 */
class user extends CI_Model
{
  public function __construct()
  {
    # code...
      parent::__construct();
  }

  function listname($email, $pass)
  {
    $sql = 'SELECT * FROM member WHERE Email = ? AND Password = ?';
    $rs = $this->db->query($sql,array($email , $pass));
    if($rs->num_rows() > 0){
      return  $rs->result();
    }else{
      return  0;
    }
  }

  function checkoverlapssid($id) //เช็คว่าบัตรประชาชน ซ้ำหรือไม่
  {
    # code...
    $rs = $this->db->select('*')->from('member')->where('IDCard' , $id)->get();
    if($rs->num_rows() > 0){
      return 1;  //แสดงว่าซ้ำ
    }else{
      return 0; //แสดงว่าไม่ซ้ำ
    }
  }

  function checkuser($Email) //เช็คว่า email ซ้ำกันหรือไม่
  {
    # code...
    $rs = $this->db->select('*')->from('member')->where('Email' , $Email)->get();
    if($rs->num_rows() > 0){
      return 1;  //แสดงว่าซ้ำ
    }else{
      return 0; //แสดงว่าไม่ซ้ำ
    }
  }

  function insertuser($IDCard,$Fname,$Lname,$Address,$Tel,$Email,$Password,$Province,$Didtrict,$Postcode){ //insert ข้อมูลuser
    $sql = array(
      'IDCard' => $IDCard,
      'Fname' => $Fname,
      'Lname' => $Lname,
      'Address' => $Address,
      'Tel' => $Tel,
      'Email' => $Email,
      'Password' => $Password,
      'Province' => $Province,
      'Didtrict' => $Didtrict,
      'Postcode' => $Postcode
    );
    $this->db->insert('member',$sql);
  }

  function checkssid($ssid) //เช็คบัตรประชาชน
  {
    # code...
    $sum = 0;
    for ($i=0; $i < strlen($ssid)-1; $i++) {
      # code...
      $sum = $sum + $ssid[$i] * (13 - $i);
    }
    $sum = $sum % 11;
    $sum = 11 - $sum;
    if($sum == $ssid[12]){
      return 1; //สามารถใช้งานได้
    }else{
      return 0; //ใช้งานไม่ได้
    }
  }

  function CreateCaptcha()
  {
    $vals = array(
        'img_path'      => 'captcha/',
        'img_url'       =>  base_url() . 'captcha/',
        'font_path'     => 'captcha/times_new_yorker.ttf',
        'img_width'     => 250,
        'img_height'    => 80,
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 26,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

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
