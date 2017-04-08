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
      $this->load->view('AdminPage' , $captcha);
    }else{
      $captcha = $this->captcha->CreateCaptcha();
      $this->load->view('home' , $captcha);
    }
  }

    function QueryMemberPagination() //CTRL Pagination สำหรับ Admin เพื่อโชว์ member ที่รอการยืนยัน
    {
      $config = array();
      $config["base_url"] = base_url() . "index.php/linkquery/QueryMemberPagination";
      $config["total_rows"] = $this->Admin->SelectMemberType0row();
      $config["per_page"] = 12;
      $config["uri_segment"] = 3;
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data["result"] = $this->Admin->SelectMemberType0($config["per_page"], $page);
      $data["links"] = $this->pagination->create_links();
      $data['row'] = $this->Admin->SelectMemberType0row();
      $this->load->view("AdminMember", $data);
    }


    function ConfirmMemberByadmin()
    {
        $IDCard = $_GET['IDCard'];
        $Email = $_GET['Email'];
        $Check = $_GET['Check'];
        if ($Check == 1) {
          $this->Admin->UpdateMemberType($IDCard);
          $this->Admin->SendMailConfirmByAdmin($Email,$Check);
          $this->QueryMemberPagination();
        }else if($Check == 0){
          $this->Admin->SendMailConfirmByAdmin($Email,$Check);
          $this->QueryMemberPagination();
        }
    }
}
 ?>
