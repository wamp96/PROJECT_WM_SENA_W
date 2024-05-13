<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserRoles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Roles_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Roles_name' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 30,
            ],
            'Roles_description' => [
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
            ],
        ]);
        $this->forge->addPrimaryKey('Roles_id');
        $this->forge->createTable('roles');
    }



    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
