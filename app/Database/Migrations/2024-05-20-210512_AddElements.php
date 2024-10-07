<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddElements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Element_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'Element_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'Element_imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'Element_serial' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Element_procesador' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Element_memoria_ram' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'Element_disco' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'Element_valor' => [
                'type' => 'INT',
            ],
            'Element_stock' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'Category_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'Element_status_fk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'Brand_fk' => [
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
        $this->forge->addPrimaryKey('Element_id');
        $this->forge->createTable('elements');
        $this->forge->addForeignKey('Category_fk', 'categories', 'Category_id', 'CASCADE', 'SET NULL','fk_category');
        $this->forge->addForeignKey('Element_status_fk', 'element_status', 'Element_status_id', 'CASCADE', 'SET NULL','fk_element_status');
        $this->forge->addForeignKey('Brand_fk', 'brands', 'Brand_id', 'CASCADE', 'SET NULL','fk_brand');
    }

    public function down()
    {
        $this->forge->dropTable('elements');
    }
}