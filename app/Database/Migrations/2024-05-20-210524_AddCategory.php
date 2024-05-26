<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Category_nombre' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 30,
            ],
            'Category_descripcion' => [
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
        $this->forge->addPrimaryKey('Category_id');
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
