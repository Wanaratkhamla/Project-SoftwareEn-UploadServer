<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class linkquery extends CI_Controller{
  public function __construct(){

    parent::__construct();

  }
  public function index(){ //function สำหรับ query และไปยังหน้า โชว์ของบริจา่ค
    if ($this->session->userdata('Fname')) {
          $config = array();
          $config["base_url"] = base_url() . "index.php/linkquery/index";
          $config["total_rows"] = $this->querydonate->rowcount();
          $config["per_page"] = 12;
          $config["uri_segment"] = 3;

          $this->pagination->initialize($config);
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["results"] = $this->querydonate->SelectAlldonate($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();
          $this->session->unset_userdata('word');
          $this->load->view("showDonate", $data);
    }else{
       redirect('startweb');
    }
  }

  public function SearchshowDonate() //function สำหรับ Search แยกตามประเภท
  {
    $keyword = $_GET['keyword'];
    $Typesearch = $_GET['Typesearch'];
    $this->session->set_userdata('word', $keyword);
    if ($_GET['keyword'] != null) {
      $this->session->set_userdata('word', $keyword);
        if ($Typesearch == "1") {
          $this->QueryDonateByType(); //เสร็จสิ้น
        }elseif ($Typesearch == "2") {
          $this->QueryDonateByName(); //เสร็จสิ้น
        }elseif ($Typesearch == "3") {
          $this->QueryDonateByKeyword();
        }
    }else{
      $this->index();
    }
  }

  public function QueryDonateByType() //CTRL ค้นหาตาม Type
  {
    $config = array();
    $config["base_url"] = base_url() . "index.php/linkquery/QueryDonateByType";
    $config["total_rows"] = $this->querydonate->rowcountType($this->session->userdata('word'));
    $config["per_page"] = 12;
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->querydonate->SelectdonateType($config["per_page"], $page ,$this->session->userdata('word'));
    $data["links"] = $this->pagination->create_links();
    $this->load->view("showDonate", $data);
  }

  public function QueryDonateByName() //CTRL ค้นหาตาม ชื่อ
  {
    $config = array();
    $config["base_url"] = base_url() . "index.php/linkquery/QueryDonateByName";
    $config["total_rows"] = $this->querydonate->rowcountName($this->session->userdata('word'));
    $config["per_page"] = 12;
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->querydonate->SelectdonateName($config["per_page"], $page ,$this->session->userdata('word'));
    $data["links"] = $this->pagination->create_links();
    $this->load->view("showDonate", $data);
  }

  public function QueryDonateByKeyword() //CTRL ค้นหาตาม Keyword
  {
    $config = array();
    $config["base_url"] = base_url() . "index.php/linkquery/QueryDonateByKeyword";
    $config["total_rows"] = $this->querydonate->rowcountKeyword($this->session->userdata('word'));
    $config["per_page"] = 12;
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["results"] = $this->querydonate->SelectdonateKeyword($config["per_page"], $page ,$this->session->userdata('word'));
    $data["links"] = $this->pagination->create_links();
    $this->load->view("showDonate", $data);
  }

  public function showlistdetail() //CTRL สำหรับโชว์ สินค้า
  {
    $donateID = $_GET['donateid'];
    $result['data'] = $this->querydonate->SelectdoneteByID($donateID);
    $this->load->view('listDetail' , $result);
  }
}
