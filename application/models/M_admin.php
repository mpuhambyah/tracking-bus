<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function create($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $this->db->insert_id(); // return last insert id
    }
}
