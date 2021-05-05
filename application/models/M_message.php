<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_message extends CI_Model
{
  public function getMessage($id_sender, $id_receiver)
  {
    $query = "SELECT *  FROM `message` 
    WHERE `message`.`created_by` = $id_sender AND `message`.`created_for` = $id_receiver
    ORDER BY `message`.`created_at` DESC LIMIT 10";
    return $this->db->query($query)->result_array();
  }

  public function getMessageOld($id_sender, $id_receiver, $offset)
  {
    $query = "SELECT *  FROM `message` 
    WHERE `message`.`created_by` = $id_sender AND `message`.`created_for` = $id_receiver
    ORDER BY `message`.`created_at` DESC LIMIT 5 OFFSET $offset";
    return $this->db->query($query)->result_array();
  }

  public function newMessage($id_sender, $id_receiver)
  {
    $query = "SELECT *  FROM `message` 
    WHERE `message`.`created_by` = $id_sender AND `message`.`created_for` = $id_receiver
    ORDER BY `message`.`created_at` ASC LIMIT 1";
    return $this->db->query($query)->row_array();
  }
}
