<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('logged_in') == FALSE) {
            redirect('Auth');
        };
        $this->data = array(
            'id' => $this->session->userdata('id'),
            'username' => $this->session->userdata('username'),
            'email' => $this->session->userdata('email'),
            'key' => $this->session->userdata('key'),
        );
    }
    public function index()
    {

        $data['title'] = 'E-Wallet';
        $data['user_data'] = $this->data;
        $this->load->view('user/dashboard', $data);
    }
}
