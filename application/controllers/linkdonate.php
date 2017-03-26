<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class linkdonate extends CI_Controller
{
  public  function __construct()
  {
    parent::__construct();
    # code...
  }

  public function index()
  {
    if ($this->session->userdata('Fname')) {
      $this->load->view('donorpage');

    }else{
       redirect('startweb');
    }
  }
  // $data = array(
  //   'donateID' => $result['donateID'],
  //   'IDCard' => $result['IDCard'],
  //   'donateName' => $result['donateName'],
  //   'donateSize' => $result['donateSize'],
  //   'donateweight' => $result['donateweight'],
  //   'donateEA' => $result['donateEA'],
  //   'donatecolor' => $result['donatecolor'],
  //   'donateType' => $result['donateType'],
  //   'donateDetail' => $result['donateDetail'],
  //   'donatePathIMG' => $result['donatePathIMG']
  // );
  public function donateControl()
  {
          $IDCard = $this->session->userdata('id');
          $donateName = htmlentities($_POST["donateName"]);
          $donateSize = htmlentities($_POST["donateSize"]);
          $donateweight = htmlentities($_POST["donateweight"]);
          $donateEA = htmlentities($_POST['donateEA']);
          $donatecolor = htmlentities($_POST['donatecolor']);
          $donateType = htmlentities($_POST['donateType']);
          $donateDetail = htmlentities($_POST['donateDetail']);

          $new_name = time().rand();
          $config['file_name'] = $new_name;
          $config['upload_path']          = 'image/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 1024;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;
          $this->load->library('upload', $config);

            if (($_POST["donateName"] == null) || ($_POST["donateSize"] == null) ||
            ($_POST["donateweight"] == null) || ($_POST['donateEA'] == null) || ($_POST['donatecolor'] == null)
            || ($_POST['donateType'] == null) || ($_POST['donateDetail'] == null)) //check null form input ?
            {
              $check['error'] = 1;
              $this->load->view('donorpage',$check);
            }else{
              if ($this->upload->do_upload('donatePathIMG')) //check upload image ?
              {
                $imagepath = $new_name . $this->upload->data('file_ext');
                $this->donate->Insertdonate($IDCard, $donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail,$imagepath);
                $result['data'] = $this->donate->Selectdonate($IDCard,$imagepath);
                $this->load->view('showdetail' , $result);
              }else{
                  $check['error'] = 0;
                  $this->load->view('donorpage',$check);
              }
            }
  }

  public function updatedonate()
  {
    $IDCard = $this->session->userdata('id');
    $donateID = htmlentities($_POST["donateID"]);
    $donateName = htmlentities($_POST["donateName"]);
    $donateSize = htmlentities($_POST["donateSize"]);
    $donateweight = htmlentities($_POST["donateweight"]);
    $donateEA = htmlentities($_POST['donateEA']);
    $donatecolor = htmlentities($_POST['donatecolor']);
    $donateType = htmlentities($_POST['donateType']);
    $donateDetail = htmlentities($_POST['donateDetail']);

    $new_name = time().rand();
    $config['file_name'] = $new_name;
    $config['upload_path']          = 'image/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1024;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $this->load->library('upload', $config);
    if (($_POST["donateName"] == null) || ($_POST["donateSize"] == null) ||
    ($_POST["donateweight"] == null) || ($_POST['donateEA'] == null) || ($_POST['donatecolor'] == null)
    || ($_POST['donateType'] == null) || ($_POST['donateDetail'] == null)) {
      $IDCard = $this->session->userdata('id');
      $donateID = htmlentities($_POST["donateID"]);
      $result['data'] = $this->donate->SelectdonateBydonateID($IDCard,$donateID);
      $result['error'] = 1;
      $this->load->view('Editdonate' , $result);
    }else{
      if ($this->upload->do_upload('IMGPath')) //check upload image ?
      {
         $imagepath = $new_name . $this->upload->data('file_ext');
         $this->donate->EditDonate($donateID,$IDCard, $donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail,$imagepath);
         $result['data'] = $this->donate->SelectdonateBydonateID($IDCard,$donateID);
         $this->load->view('showdetail' , $result);
      }else{
          $this->donate->EditDonateNochangeImage($donateID,$IDCard, $donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail);
          $result['data'] = $this->donate->SelectdonateBydonateID($IDCard,$donateID);
          $this->load->view('showdetail' , $result);
      }
    }
  }

  public function linkEditdonate()
  {
    $IDCard = $this->session->userdata('id');
    $donateID = htmlentities($_POST["donateID"]);
    $result['data'] = $this->donate->SelectdonateBydonateID($IDCard,$donateID);
    $this->load->view('Editdonate' , $result);
  }

}
 ?>
