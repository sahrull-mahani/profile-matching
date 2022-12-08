<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'id_tim' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_posisi' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_aspek' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'kriteria_penilaian' => ['type' => 'char', 'constraint' => 150],
			'target' => ['type' => 'enum', 'constraint' => ['1','2','3','4']],
			'type' => ['type' => 'enum', 'constraint' => ['core','secondary']],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_tim', 'aspek', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('id_posisi', 'aspek', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('id_aspek', 'aspek', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('kriteria', true);
    }

    public function down()
    {
        $this->forge->dropTable('kriteria', true);
    }
}
