<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HitungCfSfNt extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'id_pemain' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'aspek' => ['type' => 'int', 'constraint' => 150],
			'posisi' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true],
			'core' => ['type' => 'double'],
			'second' => ['type' => 'double'],
			'total' => ['type' => 'double'],
        ]);        
        $this->forge->addKey('id', true);
        $this->forge->createTable('hitung_cf_sf_nt', true);
    }

    public function down()
    {
        $this->forge->dropTable('hitung_cf_sf_nt', true);
    }
}
