<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddRequestStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Request_status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Request_status_name' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 30,
            ],
            'Request_status_description' => [
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
        $this->forge->addPrimaryKey('Request_status_id');        
        $this->forge->createTable('request_status');
    }

    public function down()
    {
        $this->forge->dropTable('request_status');
    }
}
