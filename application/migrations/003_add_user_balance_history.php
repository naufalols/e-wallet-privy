<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Migration_Add_user_balance_history extends CI_Migration
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
            'user_balance_id' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'balance_before' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'balance_after' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'activity' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'type' => array(
                'type' => 'ENUM("credit","debit")',
                'default' => 'debit',
                'null' => FALSE,
            ),
            'ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'location' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'user_agent' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'author' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->dbforge->create_table('user_balance_history');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_balance_history');
    }
}
