<?php
defined('BASEPATH') or exit('No direct script access allowed');



use Restserver\libraries\REST_Controller;

require_once(APPPATH . 'libraries/REST_Controller.php');
require_once(APPPATH . 'libraries/Format.php');

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'U');
    }
    public function index_get()
    {
        $id = $this->get("user_id");
        // NOT_FOUND (404) being the HTTP response code

        // $id = $this->get("user_id");
        if ($id) {
            $user = $this->U->user($id);
            $user_balance = $this->U->user_balance($id);
            // $user = json_encode($user_balance);
            $this->response($user_balance, REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

        // return $user_balance;
    }

    public function index_post()
    {
        $message = [
            'id' => $this->post('user_id'),
            'value' => $this->post('value_top_up'),
            'message' => 'Added a resource'
        ];
        $user_balance = $this->U->user_top_up($message);
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
}
