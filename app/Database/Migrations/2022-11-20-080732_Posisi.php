<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posisi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'nama_posisi' => ['type' => 'char', 'constraint' => 50],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->createTable('posisi', true);
    }

    public function down()
    {
        $this->forge->dropTable('posisi', true);
    }
}
