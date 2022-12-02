<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tim extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'nama' => ['type' => 'char', 'constraint' => 150],
			'thn_didirikan' => ['type' => 'year', 'constraint' => 4],
			'no_telp' => ['type' => 'char', 'constraint' => 15],
			'alamat' => ['type' => 'text'],
			'pelatih' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'manager' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('pelatih', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('manager', 'users', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('tim', true);
    }

    public function down()
    {
        $this->forge->dropTable('tim', true);
    }
}
