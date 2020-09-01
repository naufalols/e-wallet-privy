<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'E-Wallet';

        $this->load->view('user/dashboard', $data);
    }
}
