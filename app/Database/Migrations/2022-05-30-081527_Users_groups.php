<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users_groups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'int', 'constraint' => 11, 'null' => false, 'unsigned' => true,],
            'group_id' => ['type' => 'mediumint', 'constraint' => 8, 'null' => false, 'unsigned' => true,],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('group_id', 'groups', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users_groups', true);
    }

    public function down()
    {
        // $this->forge->dropForeignKey('users', 'users_user_id_foreign');
        // $this->forge->dropForeignKey('groups', 'groups_group_id_foreign');
        $this->forge->dropTable('users_groups', true);
    }
}
/* End of file Users_groupsM.php */
/* Location: ./app/models/Users_groupsM.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-05-30 08:15:27 */