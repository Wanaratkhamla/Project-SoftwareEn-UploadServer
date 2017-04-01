<?php
class querydonate extends CI_Model{

  public function __construct(){

    parent::__construct();

  }

  public function rowcount(){ //นับจำนวนแถวของ table donate

    return $this->db->count_all("donate");

  }

  public function queryrow($limit, $start) {
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

   //  $this->db->limit($limit, $start);
   //  $this->db->select('member.Fname');
   //  $this->db->from('donate');
   //  $this->db->join('member','donate.IDCard = member.IDCard');
   //  $query = $this->db->get();
   // Examples join Table
}
