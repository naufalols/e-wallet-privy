<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once(APPPATH . 'libraries/REST_Controller.php');

use Restserver\libraries\REST_Controller;

class Api extends REST_Controller
{
    public function index_get()
    {
        // Display all books

        $data = array(
            'nama' => 'bgst',
            'namo' => 'bgsasdt'
        );
        echo json_encode($data);
    }

    public function index_post()
    {
        // Create a new book
    }
}
