<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiBobot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'selisih' => ['type' => 'int', 'constraint' => 11],
			'bobot_nilai' => ['type' => 'char', 'constraint' => 4],
			'ket' => ['type' => 'char', 'constraint' => 150],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->createTable('nilai_bobot', true);
    }

    public function down()
    {
        $this->forge->dropTable('nilai_bobot', true);
    }
}
