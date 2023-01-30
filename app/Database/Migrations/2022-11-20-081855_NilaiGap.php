<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiGap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'id_aspek' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_kriteria' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_posisi' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_pemain' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'id_pelatih' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'nilai_kriteria' => ['type' => 'tinyint', 'constraint' => 3],
			'hasil' => ['type' => 'tinyint', 'constraint' => 2],
			'hasilposisi' => ['type' => 'tinyint', 'constraint' => 2],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('id_aspek', 'aspek', 'id', 'RESTRICT', 'CASCADE');
        // $this->forge->addForeignKey('id_kriteria', 'kriteria', 'id', 'RESTRICT', 'CASCADE');
        // $this->forge->addForeignKey('id_posisi', 'posisi', 'id', 'RESTRICT', 'CASCADE');
        // $this->forge->addForeignKey('id_pemain', 'pemain', 'id', 'RESTRICT', 'CASCADE');
        // $this->forge->addForeignKey('id_pelatih', 'users', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('nilai_gap', true);
    }

    public function down()
    {
        $this->forge->dropTable('nilai_gap', true);
    }
}
