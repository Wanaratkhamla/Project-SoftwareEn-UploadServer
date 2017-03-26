<?php
class donate extends CI_Model
{
  public function __construct()
  {
    # code...
      parent::__construct();
  }


  function Insertdonate($IDCard,$donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail,$donatePathIMG)
  {
      $sql = array(
        'IDCard' => $IDCard,
        'donateName' => $donateName,
        'donateSize' => $donateSize,
        'donateweight' => $donateweight,
        'donateEA' => $donateEA,
        'donatecolor' => $donatecolor,
        'donateType' => $donateType,
        'donateDetail' => $donateDetail,
        'donatePathIMG' => $donatePathIMG
      );
      $this->db->insert('donate',$sql);
  }
  function Selectdonate($IDCard,$donatePathIMG)
  {
    $this->db->select('*');
    $this->db->from('donate');
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donatePathIMG', $donatePathIMG);
    $rs = $this->db->get();
    return $rs->row_array();
  }
  function SelectdonateBydonateID($IDCard,$donateID)
  {
    $this->db->select('*');
    $this->db->from('donate');
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donateID', $donateID);
    $rs = $this->db->get();
    return $rs->row_array();
  }
  function EditDonate($donateID,$IDCard,$donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail,$donatePathIMG)
  {
    $this->db->set('donateName', $donateName);
    $this->db->set('donateSize',$donateSize);
    $this->db->set('donateweight',$donateweight);
    $this->db->set('donateEA',$donateEA);
    $this->db->set('donatecolor',$donatecolor);
    $this->db->set('donateType',$donateType);
    $this->db->set('donateDetail',$donateDetail);
    $this->db->set('donatePathIMG',$donatePathIMG);
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donateID' , $donateID);
    $this->db->update('donate');
  }
  function EditDonateNochangeImage($donateID,$IDCard,$donateName,$donateSize,$donateweight,$donateEA,$donatecolor,$donateType,$donateDetail)
  {
    $this->db->set('donateName', $donateName);
    $this->db->set('donateSize',$donateSize);
    $this->db->set('donateweight',$donateweight);
    $this->db->set('donateEA',$donateEA);
    $this->db->set('donatecolor',$donatecolor);
    $this->db->set('donateType',$donateType);
    $this->db->set('donateDetail',$donateDetail);
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donateID' , $donateID);
    $this->db->update('donate');
  }

}

 ?>
