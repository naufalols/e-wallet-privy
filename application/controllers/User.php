<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

    public function index()
    {

        echo 'a';
        print_r($_SERVER['PHP_AUTH_USER']);
        print_r($_GET);
    }
    public function ses()
    {
        $databaru = $this->session->userdata();
        var_dump($databaru);

        // echo $databaru['kodeUnik'];
    }
}
