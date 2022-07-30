<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inovasi extends Migration
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
            'skpd_id' => [
                'type' => 'int',
                'constraint' => 6,
                'unsigned' => true,
            ],
            'judul' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'inovasi' => [
                'type' => 'varchar',
                'constraint' => 350,
            ],
            'pdf' => [
                'type' => 'char',
                'constraint' => 150,
            ],
            'publisher' => [
                'type' => 'tinyint',
                'constraint' => 1,
            ],
            'created_at' => [
                'type' => 'date',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'date',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'date',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inovasi', true);
    }

    public function down()
    {
        $this->forge->dropTable('inovasi', true);
    }
}
