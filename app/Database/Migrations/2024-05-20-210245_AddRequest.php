<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddRequest extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Request_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Request_numero' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'Request_fecha' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'Request_title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'Request_description' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'Element_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'User_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'Request_status_fk' => [
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
        $this->forge->addPrimaryKey('Request_id');
        $this->forge->addForeignKey('User_fk','users','User_id','CASCADE','SET NULL', 'fk_user');
        $this->forge->addForeignKey('Request_status_fk','request_status','Request_status_id','CASCADE','SET NULL', 'fk_request_status');
        $this->forge->createTable('requests');
    }

    public function down()
    {
        $this->forge->dropTable('requests');
    }
}
