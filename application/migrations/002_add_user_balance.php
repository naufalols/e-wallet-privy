<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Migration_Add_user_balance extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'balance' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'balance_achieve' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_balance');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_balance');
    }
}
