<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aspek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'aspek_penilaian' => ['type' => 'char', 'constraint' => 150],
			'persentase' => ['type' => 'tinyint', 'constraint' => 3],
			'core' => ['type' => 'tinyint', 'constraint' => 5],
			'secondary' => ['type' => 'tinyint', 'constraint' => 5],
			'created_at' => ['type' => 'date', 'constraint' => 0],
			'updated_at' => ['type' => 'date', 'constraint' => 0],
			'deleted_at' => ['type' => 'date', 'constraint' => 0, 'null' => true],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->createTable('aspek', true);
    }

    public function down()
    {
        $this->forge->dropTable('aspek', true);
    }
}
