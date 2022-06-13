<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemsTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id'            => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'category_id'        => [
                'type' => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'created_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at'         => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('item_id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'category_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
