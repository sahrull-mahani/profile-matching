<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BasicSeeder extends Seeder
{
	/**
	 * Dumping data for table 'groups', 'users, 'users_groups'
	 *
	 * @return void
	 */
	public function run()
	{
		$config = config('IonAuth\\Config\\IonAuth');
		$this->DBGroup = empty($config->databaseGroupName) ? '' : $config->databaseGroupName;
		$tables        = $config->tables;

		$groups = [
			[
				'id'          => 1,
				'name'        => 'admin',
				'description' => 'Administrator',
			],
			[
				'id'          => 2,
				'name'        => 'pelatih',
				'description' => 'Pelatih',
			],
			[
				'id'          => 3,
				'name'        => 'manager',
				'description' => 'Manager Tim',
			],
		];
		$this->db->table($tables['groups'])->insertBatch($groups);

		$user = [
			'ip_address'              => '127.0.0.1',
			'username'                => 'administrator',
			'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
			'email'                   => 'admin@admin.com',
			'activation_code'         => '',
			'forgotten_password_code' => null,
			'created_on'              => '1268889823',
			'last_login'              => '1268889823',
			'active'                  => '1',
			'nama_user'               => 'Admin',
			'img'                     => null,
			'phone'                   => '0',
		];
		$this->db->table($tables['users'])->insert($user);

		$userGroup = [
			'user_id'  => '1',
			'group_id' => '1',
		];
		$this->db->table($tables['users_groups'])->insert($userGroup);

		$nilaiBobots = [
            [
                'selisih'       => 0,
                'bobot_nilai'   => 4,
                'ket'           => 'tidak ada selisih (kompetensi sesuai yang dibutuhkan)',
            ],
            [
                'selisih'       => 1,
                'bobot_nilai'   => 3.5,
                'ket'           => 'kompetensi individu kelebihan 1 tingkat/level',
            ],
            [
                'selisih'       => -1,
                'bobot_nilai'   => 3,
                'ket'           => 'kompetensi individu kekurangan 1 tingkat/level',
            ],
            [
                'selisih'       => 2,
                'bobot_nilai'   => 2.5,
                'ket'           => 'kompetensi individu kelebihan 2 tingkat/level',
            ],
            [
                'selisih'       => -2,
                'bobot_nilai'   => 2,
                'ket'           => 'kompetensi individu kekurangan 2 tingkat/level',
            ],
            [
                'selisih'       => 3,
                'bobot_nilai'   => 1.5,
                'ket'           => 'kompetensi individu kelebihan 3 tingkat/level',
            ],
            [
                'selisih'       => -3,
                'bobot_nilai'   => 1,
                'ket'           => 'kompetensi individu kekurangan 3 tingkat/level',
            ],
        ];
        $this->db->table('nilai_bobot')->insertBatch($nilaiBobots);
	}
}
