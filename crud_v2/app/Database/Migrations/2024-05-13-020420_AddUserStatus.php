<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'User_status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'User_status_name' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 30,
            ],
            'User_status_description' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ]
        ]);
        $this->forge->addPrimaryKey('User_status_id');
        $this->forge->createTable('user_status');
    }

    public function down()
    {
        $this->forge->dropTable('user_status');
    }
}
