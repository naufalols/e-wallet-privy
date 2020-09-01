<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Seed_model extends CI_Model
{
    public function user()
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->select('id');
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
