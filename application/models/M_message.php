<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_message extends CI_Model
{
  public function getMessage($id_sender, $id_receiver)
  {
    $query = "SELECT *  FROM `message` 
    WHERE (`message`.`created_by` = $id_sender OR `message`.`created_by` = $id_receiver) AND (`message`.`created_for` = $id_receiver OR `message`.`created_for` = $id_sender)
    ORDER BY `message`.`created_at` DESC LIMIT 5";
    $result = $this->db->query($query)->result_array();

    return $result;
  }

  public function getMessageOld($id_sender, $id_receiver, $offset)
  {
    $query = "SELECT *  FROM `message` 
    WHERE (`message`.`created_by` = $id_sender OR `message`.`created_by` = $id_receiver) AND (`message`.`created_for` = $id_receiver OR `message`.`created_for` = $id_sender)
    ORDER BY `message`.`created_at` DESC LIMIT 5 OFFSET $offset";
    return $this->db->query($query)->result_array();
  }

  public function getMessageNew($id_sender, $id_receiver)
  {
    $query = "SELECT *  FROM `message` 
    WHERE (`message`.`created_by` = $id_sender OR `message`.`created_by` = $id_receiver) AND (`message`.`created_for` = $id_receiver OR `message`.`created_for` = $id_sender)
    ORDER BY `message`.`created_at` DESC";
    return $this->db->query($query)->row_array();
  }

  public function totalUnreadMessage($id)
  {
    $query = "SELECT COUNT(`message`.`id`) as 'total',`message`.`created_by` FROM `message`
    WHERE `message`.`created_for` = $id AND `message`.`is_read` = 0 GROUP BY `message`.`created_by`";

    return $this->db->query($query)->result_array();
  }
}
