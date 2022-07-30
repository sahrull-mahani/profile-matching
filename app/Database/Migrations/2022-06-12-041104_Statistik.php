<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statistik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nik' => ['type' => 'char', 'constraint' => 18],
            'desa' => ['type' => 'char', 'constraint' => 150, 'null'=>true],
            'jk' => ['type' => 'tinyint', 'constraint' => 1],
            'tahun' => ['type' => 'year'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('statistik', true);
    }

    public function down()
    {
        $this->forge->dropTable('statistik', true);
    }
}
