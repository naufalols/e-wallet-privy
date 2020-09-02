<?php

defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{
    public function user($id = null)
    {
        if ($id === null) {
            $query = $this->db->get('user');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('user', array('id' => $id));
            return $query->row_array();
        }
    }

    public function user_balance($id = null)
    {
        $query = $this->db->get_where('user_balance', array('user_id' => $id));
        return $query->row_array();
        // if ($id === null) {
        //     $query = $this->db->get('user_balance');
        //     return $query->result_array();
        // } else {
        //     $query = $this->db->get_where('user_balance', array('user_id' => $id));
        //     return $query->row_array();
        // }
    }

    public function user_api_key($id = null)
    {
        $query = $this->db->get_where('key', array('user_id' => $id));
        return $query->row_array();
    }

    public function user_top_up($data = null)
    {

        $this->db->set('balance', 'balance+' . $data['value'], FALSE);
        $this->db->set('balance_achieve', 'balance_achieve+balance', FALSE);
        $this->db->where('user_id', $data['id']);
        $this->db->update('user_balance'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
    }
}
