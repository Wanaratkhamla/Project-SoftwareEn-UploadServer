<?php
class querydonate extends CI_Model{

  public function __construct(){

    parent::__construct();

  }

  //ค้นหาทั้งหมด
  public function rowcount(){ //นับจำนวนแถวของ table donate
    return $this->db->count_all("donate");
  }

  public function SelectAlldonate($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->select('donateID,donateName,donatePathIMG,member.Fname,member.Lname');
        $this->db->from('donate');
        $this->db->join('member','donate.IDCard = member.IDCard');
        $this->db->order_by("donateTimestamp", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   //จบการค้นหาทั้งหมด

   //ค้นหาแบบตามType
   public function rowcountType($keyword) //นับจำนวนแถวของ table donate ยึดตามการค้นหาชนิด Type
   {
     $this->db->select('*');
     $this->db->from('donate');
     $this->db->like('donateType', $keyword);
     $query = $this->db->get();
     $num = $query->num_rows();
     return $num;
   }

   public function SelectdonateType($limit, $start , $keyword)
   {
      $this->db->limit($limit, $start);
      $this->db->select('donateID,donateName,donatePathIMG,member.Fname,member.Lname');
      $this->db->from('donate');
      $this->db->join('member','donate.IDCard = member.IDCard');
      $this->db->like('donateType', $keyword);
      $this->db->order_by("donateTimestamp", "desc");
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
   }
   //จบการค้นหาตาม Type

    //ค้นหาตามชื่อ
    public function rowcountName($keyword) //นับจำนวนแถวของ table donate ยึดตามการค้นหาชนิด Name
    {
      $this->db->select('*');
      $this->db->from('donate');
      $this->db->like('donateName', $keyword);
      $query = $this->db->get();
      $num = $query->num_rows();
      return $num;
    }
   public function SelectdonateName($limit, $start , $keyword)
   {
      $this->db->limit($limit, $start);
      $this->db->select('donateID,donateName,donatePathIMG,member.Fname,member.Lname');
      $this->db->from('donate');
      $this->db->join('member','donate.IDCard = member.IDCard');
      $this->db->like('donateName', $keyword);
      $this->db->order_by("donateTimestamp", "desc");
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
   }
   //สิ้นสุดการค้นหาตามชื่อ

   //ค้นหาตาม Keyword
   public function rowcountKeyword($keyword) //นับจำนวนแถวของ table donate ยึดตามการค้นหาชนิด Name
   {
     $this->db->select('donateID,donateName,donatePathIMG,member.Fname,member.Lname,donatetype.donateTypeName');
     $this->db->from('donate');
     $this->db->join('member','donate.IDCard = member.IDCard');
     $this->db->join('donatetype','donate.donateTypeSendID = donatetype.donateTypeSendID');
     $this->db->like('donateName', $keyword);
     $this->db->or_like('donateName', $keyword);
     $this->db->or_like('donateLength', $keyword);
     $this->db->or_like('donatewidth', $keyword);
     $this->db->or_like('donateweight', $keyword);
     $this->db->or_like('donateEA', $keyword);
     $this->db->or_like('donatecondition', $keyword);
     $this->db->or_like('donatecolor', $keyword);
     $this->db->or_like('donateType', $keyword);
     $this->db->or_like('donateDetail', $keyword);
     $this->db->or_like('donatesendDetail', $keyword);
     $this->db->or_like('donateTimestamp', $keyword);
     $this->db->or_like('donateTypeName', $keyword);
     $query = $this->db->get();
     $num = $query->num_rows();
     return $num;
   }

   public function SelectdonateKeyword($limit, $start , $keyword)
   {
      $this->db->limit($limit, $start);
      $this->db->select('donateID,donateName,donatePathIMG,member.Fname,member.Lname,donatetype.donateTypeName');
      $this->db->from('donate');
      $this->db->join('member','donate.IDCard = member.IDCard');
      $this->db->join('donatetype','donate.donateTypeSendID = donatetype.donateTypeSendID');
      $this->db->like('donateName', $keyword);
      $this->db->or_like('donateName', $keyword);
      $this->db->or_like('donateLength', $keyword);
      $this->db->or_like('donatewidth', $keyword);
      $this->db->or_like('donateweight', $keyword);
      $this->db->or_like('donateEA', $keyword);
      $this->db->or_like('donatecondition', $keyword);
      $this->db->or_like('donatecolor', $keyword);
      $this->db->or_like('donateType', $keyword);
      $this->db->or_like('donateDetail', $keyword);
      $this->db->or_like('donatesendDetail', $keyword);
      $this->db->or_like('donateTimestamp', $keyword);
      $this->db->or_like('donateTypeName', $keyword);
      $this->db->order_by("donateTimestamp", "desc");
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
   }
   //สิ้นสุดการค้นหาตาม Keyword

   function SelectdoneteByID($donateID)
   {
     $this->db->select('*');
     $this->db->from('donate');
     $this->db->where('donateID', $donateID);
     $rs = $this->db->get();
     return $rs->row_array();
   }
}
