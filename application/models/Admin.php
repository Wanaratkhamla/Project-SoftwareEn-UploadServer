<?php
/**
 *
 */
class Admin extends CI_Model
{
  public function __construct()
  {
    # code...
      parent::__construct();
  }

  function SelectMemberType0row() //select row ของ member ที่รอการยืนยัน
  {
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where('memberType', 0);
    $query = $this->db->get();
    $num = $query->num_rows();
    return $num;
  }

  public function SelectMemberType0($limit, $start) // select data on member ที่รอการยืนยัน
  {
     $this->db->limit($limit, $start);
     $this->db->select('*');
     $this->db->from('member');
     $this->db->where('memberType', 0);
     $query = $this->db->get();
     if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
             $data[] = $row;
         }
         return $data;
     }
     return false;
  }

  public function SendMailConfirmByAdmin($Email,$check)
  {
    $msg = '';
    if ($check == 1) {
      $msg = 'การสมัครสมาชิก เข้าใช้งาน Website WeShare4U เสร็จสิ้น ท่านสมาชิกใช้งานได้ผ่าน link : https://10.199.66.227/SoftEn2017/group8';
    }else{
      $msg = 'การสมัครสมาชิก เข้าใช้งาน Website WeShare4U มีความผิดพลาด กรุณาสมัครสมาชิกใหม่ ท่านสามารถใช้งานได้ผ่าน link : https://10.199.66.227/SoftEn2017/group8';
    }
      $ci = get_instance();
			$ci->load->library('Email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "group6soften@gmail.com"; //email address
			$config['smtp_pass'] = "1234567812345678";  // password
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$ci->email->initialize($config);
			$ci->email->from('group6soften@gmail.com', 'WeShare4U infrastructureTeam');
			$list = array($Email); //email ที่จะให้ส่งไป
			$ci->email->to($list);
			$ci->email->subject('Confirm Register WeShare4U');
			$ci->email->message($msg);
			$result = $ci->email->send();
  }

  public function UpdateMemberType($IDCard)
  {
    $this->db->set('memberType', 1);
    $this->db->where('IDCard', $IDCard);
    $this->db->update('member');
  }
}

 ?>
