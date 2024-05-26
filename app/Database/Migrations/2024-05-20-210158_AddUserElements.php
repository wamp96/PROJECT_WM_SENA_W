<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUserElements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'User_element_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'User_element_fecha' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'User_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'Element_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'create_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'update_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('User_element_id');
        $this->forge->createTable('user_elements');
        $this->forge->addForeignKey('User_fk', 'users', 'User_id', 'CASCADE', 'SET NULL','fk_user');
        $this->forge->addForeignKey('Element_fk', 'elements', 'Element_id', 'CASCADE', 'SET NULL','fk_element');
    }

    public function down()
    {
        $this->forge->dropTable('user_elements');
    }
}
