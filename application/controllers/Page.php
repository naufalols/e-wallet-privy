<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/Faker/src/autoload.php';
class Page extends CI_Controller
{


    public function index()
    {
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        // generate data by accessing properties
        echo $faker->name;
        // 'Lucy Cechtelar';
        echo $faker->address;
        // "426 Jordy Lodge
        // Cartwrightshire, SC 88120-6700"
        echo $faker->text;
        // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
        // et sit et mollitia sed.
        // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
        // sit minima sint.
    }

    public function Seed_User($qty = null)
    {
        $this->load->helper('date');
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < $qty; $i++) {

            $data[] = array(
                'username' => $faker->unique()->name,
                'email' =>  $faker->unique()->safeEmail,
                'password' => 'qwerty',
                'created_at' => date(DATE_ATOM, time()),
                'updated_at' => date(DATE_ATOM, time()),
            );
        }

        $this->db->insert_batch('user', $data);
    }

    public function Seed_User_Balance($qty = null)
    {
        $this->load->helper('date');
        $this->load->helper('array');
        $this->load->model('Seed_model');
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < $qty; $i++) {
            $id = $this->Seed_model->user();

            $data[] = array(
                'user_id' => random_element($id),
                'balance' => '0',
                'balance_achieve' => '0',
                'created_at' => date(DATE_ATOM, time()),
                'updated_at' => date(DATE_ATOM, time()),
            );
        }

        $this->db->insert_batch('user_balance', $data);
    }


    public function down()
    {
        $this->db->truncate('user');
        $this->db->truncate('user_balance');
    }
}
