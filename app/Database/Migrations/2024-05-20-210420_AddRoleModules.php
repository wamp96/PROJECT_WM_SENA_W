<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddRoleModules extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'RoleModules_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'Roles_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'Modules_fk' => [
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
        $this->forge->addPrimaryKey('RoleModules_id');
        $this->forge->createTable('role_modules');
        $this->forge->addForeignKey('Roles_fk','roles','Roles_id','CASCADE','SET NULL', 'fk_role');
        $this->forge->addForeignKey('Modules_fk','modules','Modules_id','CASCADE','SET NULL', 'fk_module');
    }

    public function down()
    {
        $this->forge->dropTable('role_modules');
    }
}
