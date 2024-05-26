<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'User_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'User_documento' => [
                'type' => 'INT',
                'constraint' => 11,
                'unique' => true,
            ],
            'User_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'User_apellido_paterno' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'User_apellido_materno' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'User_ciudad' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'User_area' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'User_telefono' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'User_correo' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 40,
            ],
            'User_password' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 50,
            ],
            'Roles_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'User_status_fk' => [
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
        $this->forge->addPrimaryKey('User_id');
        $this->forge->addForeignKey('User_status_fk', 'user_status', 'User_status_id', 'CASCADE', 'SET NULL','fk_user_status');
        $this->forge->addForeignKey('Roles_fk', 'roles', 'Roles_id', 'CASCADE', 'SET NULL','fk_roles');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}