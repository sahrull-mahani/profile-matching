<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class IonAuthSeeder extends Seeder
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

		$skpd = [
			[
				'id'        => 1,
				'kode'      => '555',
				'nama'      => 'Dinas Komunikasi Informatika dan Persandian',
				'alias'     => 'diskominfo',
			], [
				'id'        => 2,
				'kode'      => '2',
				'nama'      => 'Dinas Kesehatan',
				'alias'     => 'dinkes',
			], [
				'id'        => 3,
				'kode'      => '3',
				'nama'      => 'Dinas Pertanian',
				'alias'     => 'distan',
			], [
				'id'        => 4,
				'kode'      => '4',
				'nama'      => 'Dinas Ketahanan Pangan',
				'alias'     => 'DKP',
			], [
				'id'        => 5,
				'kode'      => '5',
				'nama'      => 'Dinas Perdagangan',
				'alias'     => 'Disperindagkop',
			], [
				'id'        => 6,
				'kode'      => '6',
				'nama'      => 'Dinas Sosial',
				'alias'     => 'Dinsos',
			],
		];
		$this->db->table('skpd')->insertBatch($skpd);


		$groups = [
			[
				'id'          => 1,
				'name'        => 'admin',
				'description' => 'Administrator',
			],
			[
				'id'          => 2,
				'name'        => 'publisher',
				'description' => 'Publisher/Redaktur',
			],
			[
				'id'          => 3,
				'name'        => 'editors',
				'description' => 'Editor Pemberitaan',
			],
			[
				'id'          => 4,
				'name'        => 'users',
				'description' => 'General User',
			],
			[
				'id'          => 5,
				'name'        => 'operator-stunting',
				'description' => 'managanment Data Stunting',
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
				'skpd_id'                 => 1,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'editor satu',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'e-satu@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'Editor 1',
				'img'                     => null,
				'skpd_id'                 => 1,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'redaktur satu',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'r-satu@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'Redaktur 1',
				'img'                     => null,
				'skpd_id'                 => 1,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'dinsos',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'u-sos@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'dinas sosial',
				'img'                     => null,
				'skpd_id'                 => 6,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'dinkes',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'u-kes@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'dinas kesehatan',
				'img'                     => null,
				'skpd_id'                 => 2,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'distan',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'u-tan@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'dinas pertanian',
				'img'                     => null,
				'skpd_id'                 => 3,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'dkp',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'u-dkp@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'dinas ketahanan pangan',
				'img'                     => null,
				'skpd_id'                 => 4,
				'phone'                   => '0',
			], [
				'ip_address'              => '127.0.0.1',
				'username'                => 'disperindag',
				'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
				'email'                   => 'u-dag@gmail.com',
				'activation_code'         => '',
				'forgotten_password_code' => null,
				'created_on'              => '1268889823',
				'last_login'              => '1268889823',
				'active'                  => '1',
				'nama_user'               => 'dinas perdagangan',
				'img'                     => null,
				'skpd_id'                 => 5,
				'phone'                   => '0',
			]
		];
		$this->db->table($tables['users'])->insertBatch($users);

		$usersGroups = [
			[
				'user_id'  => '1',
				'group_id' => '1',
			],
			[
				'user_id'  => '2',
				'group_id' => '3',
			],
			[
				'user_id'  => '3',
				'group_id' => '2',
			],
			[
				'user_id'  => '4',
				'group_id' => '4',
			],
			[
				'user_id'  => '5',
				'group_id' => '5',
			],
			[
				'user_id'  => '5',
				'group_id' => '4',
			],
			[
				'user_id'  => '6',
				'group_id' => '4',
			],
			[
				'user_id'  => '7',
				'group_id' => '4',
			],
			[
				'user_id'  => '8',
				'group_id' => '4',
			],
		];
		$this->db->table($tables['users_groups'])->insertBatch($usersGroups);

		$berita = [];
		for ($i = 2; $i <= 20; $i++) {
			array_push($berita, [
				'judul' => 'Menantu Wapres Maruf Amin Rapsel Ali Diisukan Jadi Menteri Pertanian Gantikan Syahrul Yasin Limpo',
				'slug'	=> '',
				'gambar' => '1655092263_7d5a9cbaefd2489865da.png',
				'redaksi_foto' => 'redaksi foto',
				'body'	=> '<p><strong>TRIBUNNEWS.COM, JAKARTA -  </strong>Presiden Joko Widodo (Jokowi) menerima para <a class="blue" href="https://www.tribunnews.com/tag/atlet">atlet</a> yang meraih <a class="blue" href="https://www.tribunnews.com/tag/medali">medali</a> pada ajang Sea Games ke-31 <a class="blue" href="https://www.tribunnews.com/tag/vietnam">Vietnam</a>, di Halaman Istana Merdeka, Jakarta, pada, Senin, (13/6/2022).</p>
							<p>Dalam sambutannya Presiden mengaku senang dan bangga atas raihan <a class="blue" href="https://www.tribunnews.com/tag/medali">medali</a> para <a class="blue" href="https://www.tribunnews.com/tag/atlet">atlet</a>.</p>
							<p>Bagaimana tidak, menurutnya dari 499 <a class="blue" href="https://www.tribunnews.com/tag/atlet">atlet</a> yang dikirim sebanyak 408 Atlet memperoleh <a class="blue" href="https://www.tribunnews.com/tag/medali">medali</a> baik itu emas, perak, maupun perunggu.</p>
							<p><br /><br />Artikel ini telah tayang di <a href="https://www.tribunnews.com/">Tribunnews.com</a> dengan judul Presiden Jokowi Senang dan Bangga Atas Raihan Medali Kontingen Indonesia di Sea Games Vietnam, <a href="https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam">https://www.tribunnews.com/sport/2022/06/13/presiden-jokowi-senang-dan-bangga-atas-raihan-medali-kontingen-indonesia-di-sea-games-vietnam</a>.<br />Penulis: Taufik Ismail<br />Editor: Theresia Felisiani</p>',
				'tanggal' => Time::now(),
				'user_id'	=> '3',
				'skpd_id'	=> rand(2, 5),
				'tag'		=> 'tag1, tag2',
				'status'	=> '4',
				'created_at' => Time::now(),
				'updated_at' => Time::now(),
			]);
		}
		$this->db->table('berita')->insertBatch($berita);

		$videos = [];
		for ($i = 2; $i <= 4; $i++) {
			array_push($videos, [
				'users_id' 		=> '4',
				'judul' 		=> 'Di Tengah Isu Reshuffle, Jokowi Panggil Hadi Tjahjanto ke Istana Negara',
				'deskripsi' 	=> '<p><span dir="auto" class="style-scope yt-formatted-string" style="margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); color: rgb(3, 3, 3); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap;">KOMPAS.TV - Di tengah kabar perombakan kabinet Indonesia Maju yang akan dilakukan Rabu 15 Juni besok, sejumlah tokoh menyambangi Istana Kepresidenan Jakarta sore tadi.

									Sejumlah tokoh yang datang ke Istana Presiden di antaranya eks Panglima TNI Panglima Hadi Tjahjanto.
									
									Baca Juga Presiden Panggil Zulkifli Hasan ke Istana di Tengah Isu Reshuffle di </span><a class="yt-simple-endpoint style-scope yt-formatted-string" spellcheck="false" href="https://www.youtube.com/redirect?event=video_description&amp;redir_token=QUFFLUhqa2xfT05ja1F4Nm9sRnFKNGRvUFBJZUkyRkt2UXxBQ3Jtc0tuUWExemJ6Q3VtWXo4X0FIWWNOMV9rdEpVclRTc19nUUFHVTVmN09CV05ueFRJQWEwUWptYnVSN194U3VnZldHNmxjQmE1VF9KWTJlUnZEdGxtZ0UyNEg3dmZYRTBGbl85bXZBRlRnNkRPblhQN3ZiTQ&amp;q=https%3A%2F%2Fwww.kompas.tv%2Farticle%2F299045%2Fpresiden-panggil-zulkifli-hasan-ke-istana-di-tengah-isu-reshuffle&amp;v=U2YfJW9zQ_A" rel="nofollow" target="_blank" dir="auto" style="display: var(--yt-endpoint-display,inline-block); cursor: pointer; text-decoration: var(--yt-endpoint-text-regular-decoration,none); color: var(--yt-endpoint-color,var(--yt-spec-call-to-action)); overflow-wrap: var(--yt-endpoint-word-wrap,none); word-break: var(--yt-endpoint-word-break,none); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: rgb(249, 249, 249);">https://www.kompas.tv/article/299045/...</a><span dir="auto" class="style-scope yt-formatted-string" style="margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); color: rgb(3, 3, 3); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap;">
									
									Tiba sekitar </span><a class="yt-simple-endpoint style-scope yt-formatted-string" spellcheck="false" dir="auto" style="display: var(--yt-endpoint-display,inline-block); cursor: pointer; overflow-wrap: var(--yt-endpoint-word-wrap,none); word-break: var(--yt-endpoint-word-break,none); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: rgb(249, 249, 249);">18:00</a><span dir="auto" class="style-scope yt-formatted-string" style="margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); color: rgb(3, 3, 3); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap;">  tadi, Hadi Tjahjanto mengaku baru mendapat undangan dan belum mengetahui maksud pemanggilan.
									
									Selain Hadi Tjahjanto, Menteri Agraria dan Tata Ruang Sofyan Djalil juga dipanggil ke istana.
									
									Kemudian Menteri Pertahanan Prabowo Subianto, Wakil Menteri Agraria dan Tata Ruang Surya Candra, serta menteri perdagangan Muhammad Lutfhi dipanggil presiden.
									
									Di tengah isu perombakan cabinet, Partai Amanat Nasional (PAN) mengklaim salah satu kader terbaik akan memperoleh posisi menteri di Kabinet Joko Widodo - Maruf Amin.
									
									Ketua DPP PAN Bima Arya mengaku jatah menteri yang bakal didapat oleh partainya berjumlah satu kursi.
									
									Ia pun mengatakan kader Partai Amanat Nasional siap mengisi posisi menteri mana pun.
									
									Bima Arya juga menyebut pan telah menyiapkan sejumlah kader. Namun nama-nama kandidat calon menteri telah dipegang oleh Ketua Umum PAN Zulkifli Hasan.</span><br></p>',
				'link' 			=> 'U2YfJW9zQ_A',
				'status' 		=> '1',
				'created_at' 	=> Time::now(),
				'updated_at' 	=> Time::now(),
			]);
		}
		$this->db->table('video')->insertBatch($videos);

		$statistik = [];
		$maks = 20;
		$desa = ['konoha gakure', 'suna gakure', 'kumo gakure', 'kiri gakure', 'iwa gakure', 'oto gakure', 'ame gakure', 'hoshi gakure'];
		for ($i = 1; $i <= $maks; $i++) {
			array_push($statistik, [
				'nik'	=> 7571050103019200 . sprintf("%02d", rand(1, $maks)),
				'desa'	=> $desa[rand(0, count($desa) - 1)],
				'jk'	=> rand(0, 1),
				'tahun' => 2020
			]);
		}
		$this->db->table('statistik')->insertBatch($statistik);
	}
}
