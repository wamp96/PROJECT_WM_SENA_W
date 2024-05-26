<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddElementStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Element_status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Element_status_name' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 30,
            ],
            'Element_status_description' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
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
            ]
        ]);
        $this->forge->addPrimaryKey('Element_status_id');        
        $this->forge->createTable('element_status');
    }

    public function down()
    {
        $this->forge->dropTable('element_status');
    }
}
