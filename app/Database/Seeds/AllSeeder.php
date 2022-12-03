<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
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

        $users = [
            [
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
            ],
            [
                'ip_address'              => '127.0.0.1',
                'username'                => 'andika@gmail.com',
                'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
                'email'                   => 'andika@gmail.com',
                'activation_code'         => '',
                'forgotten_password_code' => null,
                'created_on'              => '1268889823',
                'last_login'              => '1268889823',
                'active'                  => '1',
                'nama_user'               => 'Andika',
                'img'                     => null,
                'phone'                   => '082292110010',
            ],
            [
                'ip_address'              => '127.0.0.1',
                'username'                => 'andre@gmail.com',
                'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
                'email'                   => 'andre@gmail.com',
                'activation_code'         => '',
                'forgotten_password_code' => null,
                'created_on'              => '1268889823',
                'last_login'              => '1268889823',
                'active'                  => '1',
                'nama_user'               => 'Andre',
                'img'                     => null,
                'phone'                   => '082233224452',
            ],
            [
                'ip_address'              => '127.0.0.1',
                'username'                => 'wendi@gmail.com',
                'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
                'email'                   => 'wendi@gmail.com',
                'activation_code'         => '',
                'forgotten_password_code' => null,
                'created_on'              => '1268889823',
                'last_login'              => '1268889823',
                'active'                  => '1',
                'nama_user'               => 'Wendi',
                'img'                     => null,
                'phone'                   => '082233224452',
            ],
            [
                'ip_address'              => '127.0.0.1',
                'username'                => 'surya@gmail.com',
                'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
                'email'                   => 'surya@gmail.com',
                'activation_code'         => '',
                'forgotten_password_code' => null,
                'created_on'              => '1268889823',
                'last_login'              => '1268889823',
                'active'                  => '1',
                'nama_user'               => 'Surya',
                'img'                     => null,
                'phone'                   => '082233441221',
            ],
        ];
        $this->db->table($tables['users'])->insertBatch($users);

        $userGroups = [
            [
                'user_id'  => '1',
                'group_id' => '1',
            ],
            [
                'user_id'  => '2',
                'group_id' => '2',
            ],
            [
                'user_id'  => '3',
                'group_id' => '2',
            ],
            [
                'user_id'  => '3',
                'group_id' => '3',
            ],
            [
                'user_id'  => '4',
                'group_id' => '3',
            ],
        ];
        $this->db->table($tables['users_groups'])->insertBatch($userGroups);

        $aspeks = [
            [
                'aspek_penilaian'   => 'Fisik',
                'persentase'        => 40,
                'core'              => 30,
                'secondary'         => 30,
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ],
            [
                'aspek_penilaian'   => 'Mental',
                'persentase'        => 30,
                'core'              => 20,
                'secondary'         => 30,
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ],
            [
                'aspek_penilaian'   => 'Skill',
                'persentase'        => 60,
                'core'              => 30,
                'secondary'         => 20,
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ],
        ];
        $this->db->table('aspek')->insertBatch($aspeks);

        $kriterias = [
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'akselerasi',
                'target'                => 4,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'aggression',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'agility',
                'target'                => 3,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'attacking position',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'awareness',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'balance',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'ball controll',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'composure',
                'target'                => 1,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'crossing',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'curve',
                'target'                => 4,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'defending',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'dribbling',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'finishing',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'free kick',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'heading',
                'target'                => 4,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'interceptions',
                'target'                => 2,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'jumping',
                'target'                => 2,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'long passing',
                'target'                => 3,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'long shot',
                'target'                => 4,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'marking',
                'target'                => 2,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'overall rating',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'pace',
                'target'                => 3,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'passing',
                'target'                => 3,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'pinalti',
                'target'                => 2,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'fisik',
                'target'                => 4,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 2,
                'kriteria_penilaian'    => 'positioning',
                'target'                => 2,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 1,
                'kriteria_penilaian'    => 'reaction',
                'target'                => 2,
                'type'                  => 'secondary', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'shooting',
                'target'                => 1,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'short pass',
                'target'                => 4,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
            [
                'id_aspek'              => 3,
                'kriteria_penilaian'    => 'shot power',
                'target'                => 4,
                'type'                  => 'core', 
                'created_at'            => date('Y-m-d'),
                'updated_at'            => date('Y-m-d'),
            ],
        ];
        $this->db->table('kriteria')->insertBatch($kriterias);

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

        $tims = [
            [
                'nama'          => 'mania fc',
                'thn_didirikan' => 2012,
                'no_telp'       => '043520091243',
                'alamat'        => 'boroko',
                'pelatih'       => 2,
                'manager'       => 4,
                'formasi'       => '4-4-3',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
            [
                'nama'          => 'ollot fc',
                'thn_didirikan' => 2010,
                'no_telp'       => '043520092010',
                'alamat'        => 'boroko',
                'pelatih'       => 3,
                'manager'       => 5,
                'formasi'       => '3-5-2',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
        ];
        $this->db->table('tim')->insertBatch($tims);

        $posisi = [
            [
                'nama_posisi'   => 'penyerang',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
            [
                'nama_posisi'   => 'gelandang',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
            [
                'nama_posisi'   => 'bek',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
            [
                'nama_posisi'   => 'penjaga gawang',
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
        ];
        $this->db->table('posisi')->insertBatch($posisi);

        $pemains = [
            [
                'nama'      => 'alvi',
                'id_posisi' => 1,
                'id_tim'    => 1,
                'ttl'       => '1998-09-09',
                'no_telp'   => '082211009999',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'vikri',
                'id_posisi' => 1,
                'id_tim'    => 1,
                'ttl'       => '1998-10-29',
                'no_telp'   => '082211001299',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'risman',
                'id_posisi' => 1,
                'id_tim'    => 1,
                'ttl'       => '1991-10-29',
                'no_telp'   => '082211001399',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'havid',
                'id_posisi' => 1,
                'id_tim'    => 1,
                'ttl'       => '1992-10-29',
                'no_telp'   => '082211201399',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'herman',
                'id_posisi' => 1,
                'id_tim'    => 2,
                'ttl'       => '1999-10-29',
                'no_telp'   => '082222201399',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'unenk',
                'id_posisi' => 1,
                'id_tim'    => 2,
                'ttl'       => '2000-10-29',
                'no_telp'   => '082222201313',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'alam',
                'id_posisi' => 1,
                'id_tim'    => 2,
                'ttl'       => '2001-10-29',
                'no_telp'   => '082223101313',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
            [
                'nama'      => 'lasimpala',
                'id_posisi' => 1,
                'id_tim'    => 2,
                'ttl'       => '2002-10-29',
                'no_telp'   => '082298101313',
                'alamat'    => 'boroko',
                'foto'      => '',
                'created_at'=> date('Y-m-d'),
                'updated_at'=> date('Y-m-d'),
            ],
        ];
        $this->db->table('pemain')->insertBatch($pemains);
    }
}
