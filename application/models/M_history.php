<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
  public function getPolyline($id)
  {
    $query = "SELECT `bus_location`.`id`,`bus_location`.`latitude`,`bus_location`.`longitude` FROM `bus_location` 
    WHERE `bus_location`.`id_bus` = $id ORDER BY `bus_location`.`time` DESC LIMIT 10";
    return $this->db->query($query)->result_array();
  }
}
