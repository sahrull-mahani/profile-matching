<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'users_id' => [
                'type' => 'int',
                'constraint' => 6,
                'unsigned' => true,
                'null' => true
            ],
            'judul' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'deskripsi' => [
                'type' => 'text',
            ],
            'link' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'status' => [
                'type' => 'int',
                'constraint' => 1,
            ],
            'created_at' => [
                'type' => 'date',
                'constraint' => 0,
                'null' => true
            ],
            'updated_at' => [
                'type' => 'date',
                'constraint' => 0,
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('users_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('video', true);
    }

    public function down()
    {
        $this->forge->dropTable('video', true);
    }
}
