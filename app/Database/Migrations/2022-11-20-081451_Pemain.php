<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemain extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'nama' => ['type' => 'char', 'constraint' => 150],
			'id_posisi' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_tim' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'ttl' => ['type' => 'date'],
			'no_hp' => ['type' => 'char', 'constraint' => 15],
			'alamat' => ['type' => 'text'],
			'foto' => ['type' => 'char', 'constraint' => 150],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemain', true);
    }

    public function down()
    {
        $this->forge->dropTable('pemain', true);
    }
}
