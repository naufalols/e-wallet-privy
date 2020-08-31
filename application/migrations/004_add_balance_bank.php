<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Migration_Add_balance_bank extends CI_Migration
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
            'balance' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'balance_achieve' => array(
                'type' => 'INT',
                'constraint' => 100,
            ),
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'enable' => array(
                'type' => 'BOOLEAN',
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
        $this->dbforge->create_table('balance_bank');
    }

    public function down()
    {
        $this->dbforge->drop_table('balance_bank');
    }
}
