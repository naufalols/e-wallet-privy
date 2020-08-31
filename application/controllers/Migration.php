<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
        $data = $this->migration->find_migrations();
        $this->migration->version(001);
        $this->migration->version(002);
        $this->migration->version(003);
        $this->migration->version(004);
        $this->migration->version(005);
    }
}
