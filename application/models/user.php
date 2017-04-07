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
      return  $rs->row_array();
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
    $rs = $this->db->select('*')->from('member')->where('Email' , $Email)->get();
    if($rs->num_rows() > 0){
      return 1;  //แสดงว่าซ้ำ
    }else{
      return 0; //แสดงว่าไม่ซ้ำ
    }
  }

  function insertuser($IDCard,$Fname,$Lname,$Address,$Tel,$Email,$Password,$Province,$Didtrict,$Postcode,$Qmember,$Ansmember,$userPathIMG){ //insert ข้อมูลuser
    $now = date('Y-m-d H:i:s');
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
      'Postcode' => $Postcode,
      'Qmember' => $Qmember,
      'Ansmember' => $Ansmember,
      'memberType' => 0,
      'userPathIMG' => $userPathIMG,
      'userTimestamp' => $now
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

  function checkForgetpassword($email,$Qmember,$Ansmember) //เช็คว่า Email คำถาม คำตอบ ตรงกับ database หรือไม่
  {
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where('Email', $email);
    $this->db->where('Qmember', $Qmember);
    $this->db->where('Ansmember', $Ansmember);
    $rs = $this->db->get();
    if($rs->num_rows() > 0){
      return  $rs->row_array();
    }else{
      return  0;
    }
  }

  function UpdatePassword($IDCard,$password) //function update Password ใหม่
  {
    $this->db->set('Password' , $password);
    $this->db->where('IDCard', $IDCard);
    $this->db->update('member');
  }

}

 ?>
