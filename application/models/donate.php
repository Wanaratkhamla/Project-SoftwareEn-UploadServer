<?php
class donate extends CI_Model
{
  public function __construct()
  {
    # code...
      parent::__construct();
  }


  function Insertdonate($IDCard,$donateName,$donateLength,$donatewidth,$donateweight,$donateEA,$donatecondition,$donatecolor,$donateType,$donateDetail,$donatePathIMG,$donateTypeSendID,$donatesendDetail)
  {
      $now = date('Y-m-d H:i:s');
      $sql = array(
        'IDCard' => $IDCard,
        'donateName' => $donateName,
        'donateLength' => $donateLength,
        'donatewidth' => $donatewidth,
        'donateweight' => $donateweight,
        'donateEA' => $donateEA,
        'donatecondition' => $donatecondition,
        'donatecolor' => $donatecolor,
        'donateType' => $donateType,
        'donateDetail' => $donateDetail,
        'donatePathIMG' => $donatePathIMG,
        'donateTypeSendID' => $donateTypeSendID,
        'donatesendDetail' => $donatesendDetail,
        'donateTimestamp' => $now
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
  function EditDonate($donateID,$IDCard,$donateName,$donateLength,$donatewidth,$donateweight,$donateEA,$donatecondition,$donatecolor,$donateType,$donateDetail,$donatePathIMG,$donateTypeSendID,$donatesendDetail)
  {
    $this->db->set('donateName', $donateName);
    $this->db->set('donateLength' , $donateLength);
    $this->db->set('donatewidth' , $donatewidth);
    $this->db->set('donateweight',$donateweight);
    $this->db->set('donateEA',$donateEA);
    $this->db->set('donatecondition' ,$donatecondition);
    $this->db->set('donatecolor',$donatecolor);
    $this->db->set('donateType',$donateType);
    $this->db->set('donateDetail',$donateDetail);
    $this->db->set('donatePathIMG',$donatePathIMG);
    $this->db->set('donateTypeSendID' , $donateTypeSendID);
    $this->db->set('donatesendDetail' , $donatesendDetail);
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donateID' , $donateID);
    $this->db->update('donate');
  }

  function EditDonateNochangeImage($donateID,$IDCard,$donateName,$donateLength,$donatewidth,$donateweight,$donateEA,$donatecondition,$donatecolor,$donateType,$donateDetail,$donateTypeSendID,$donatesendDetail)
  {
    $this->db->set('donateName', $donateName);
    $this->db->set('donateLength' , $donateLength);
    $this->db->set('donatewidth' , $donatewidth);
    $this->db->set('donateweight',$donateweight);
    $this->db->set('donateEA',$donateEA);
    $this->db->set('donatecondition' ,$donatecondition);
    $this->db->set('donatecolor',$donatecolor);
    $this->db->set('donateType',$donateType);
    $this->db->set('donateDetail',$donateDetail);
    $this->db->set('donateTypeSendID' , $donateTypeSendID);
    $this->db->set('donatesendDetail' , $donatesendDetail);
    $this->db->where('IDCard', $IDCard);
    $this->db->where('donateID' , $donateID);
    $this->db->update('donate');
  }

}

 ?>
