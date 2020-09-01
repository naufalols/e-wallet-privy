<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->has_userdata('email')) {
            redirect('#');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login E-Wallet';
                $this->load->view('auth/login', $data);
            } else {
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // echo $email;
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($password === $user['password']) {
                $data = [
                    'email' => $user['email'],
                ];
                redirect('wallet/index');
            } else {
                $this->session->set_flashdata('pesan', '<p>Gagal</p>');
                redirect('auth');
            }
        } else {
            // $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email yang anda masukkan belum terdaftar!</div>');
            $this->session->set_flashdata('pesan', '<p>email belum ada</p>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('surel');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda telah logout!</div>');
        redirect('auth');
    }

    public function ses()
    {
        $session->destroy();
    }
}
