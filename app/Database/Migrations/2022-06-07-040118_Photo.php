<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Photo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'char', 'constraint' => 50, 'null' => false],
            'deskripsi' => ['type' => 'char', 'constraint' => 255, 'null' => false],
            'status' => ['type' => 'int', 'constraint' => 1],
            'users_id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
            'sumber' => ['type' => 'char', 'constraint' => 255, 'null' => false],
            'created_at' => ['type' => 'date', 'null' => true],
            'updated_at' => ['type' => 'date', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('photo', true);
    }

    public function down()
    {
        $this->forge->dropTable('photo', true);
    }
}
