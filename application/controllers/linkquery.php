<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class linkquery extends CI_Controller{
  public function __construct(){

    parent::__construct();

  }
  public function index(){
    if ($this->session->userdata('Fname')) {
      $config = array();
          $config["base_url"] = base_url() . "index.php/linkquery/index";
          $config["total_rows"] = $this->querydonate->rowcount();
          $config["per_page"] = 12;
          $config["uri_segment"] = 3;

          $this->pagination->initialize($config);

          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data["results"] = $this->querydonate->queryrow($config["per_page"], $page);
          $data["links"] = $this->pagination->create_links();

          $this->load->view("showDonate", $data);
    }else{
       redirect('startweb');
    }
  }

  public function Showproduct()
  {
     $donateID = $_GET['donateID'];
     $IDCard = $this->session->userdata('id');
     $result['data'] = $this->donate->SelectdonateBydonateID($IDCard,$donateID);
     $this->load->view('Editdonate' , $result);
  }
  public function testsendvalue()
  {
    $test = $_GET['nos'];
    echo $test;
  }
}
