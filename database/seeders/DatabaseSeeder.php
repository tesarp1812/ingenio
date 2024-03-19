<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Faker\Provider\Fakecar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('id_id');

        //role superadmin
        DB::table('roles')->insert([
            'id' => '1',
            'roles' => 'Super Admin',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'roles' => 'Admin',
        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'roles' => 'General Affair',
        ]);

        DB::table('roles')->insert([
            'id' => '4',
            'roles' => 'Tutor',
        ]);

        // super admin
        DB::table('users')->insert([
            'name' => 'Tama',
            'email' => 'super@ingenio.id',
            'password' => bcrypt('supergariskeras'),
            'role_id' => '1',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // syahrul
        DB::table('users')->insert([
            'name' => 'syahrul',
            'email' => 'logistik@ingenioindonesia.co.id',
            'password' => bcrypt('12345'),
            'role_id' => '3',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // niam
        DB::table('users')->insert([
            'name' => 'niam',
            'email' => 'logistik2@ingenioindonesia.co.id',
            'password' => bcrypt('12345'),
            'role_id' => '3',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // andhika
        DB::table('users')->insert([
            'name' => 'andhika',
            'email' => 'logistik3@ingenioindonesia.co.id',
            'password' => bcrypt('12345'),
            'role_id' => '3',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //faker user
        

        // Seeder untuk Baju
        $existingCombo = [];

        for ($i = 0; $i < 5; $i++) {
            do {
                $jenisBaju = $faker->randomElement(['kemeja', 'kaos', 'polo', 'jaket']);
                $ukuran = $faker->randomElement(['s', 'm', 'l', 'xl', 'xxl', 'xxxl']);
                $combo = $jenisBaju . '-' . $ukuran;
            } while (in_array($combo, $existingCombo));

            // Tambahkan kombinasi ke array existingCombo
            $existingCombo[] = $combo;

            // Masukkan data ke dalam tabel 'bajus'
            DB::table('baju')->insert([
                'nama_barang' => $jenisBaju,
                'ukuran' => $ukuran,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk Buku
        DB::table('barang')->insert([
            'nama_barang' => 'UKMPPD',
            'jenis' => 'buku',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'OSCE',
            'jenis' => 'buku',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'notebook',
            'jenis' => 'buku',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk Merchandise
        DB::table('barang')->insert([
            'nama_barang' => 'payung',
            'jenis' => 'merchandise',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('barang')->insert([
            'nama_barang' => 'bantal',
            'jenis' => 'merchandise',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //faker baju
        for ($i = 0; $i < 50; $i++) {
            $userKepala = DB::table('users')->inRandomOrder()->first();
            $baju = DB::table('baju')->inRandomOrder()->first();

            DB::table('riwayat_barang')->insert([
                'baju_id' => $baju->id,
                'jumlah' => $faker->numberBetween(-10, 30),
                'user_id' => $userKepala->id,
                'keterangan' => $faker->randomElement(['kirim', 'masuk']),
                'created_at' => $faker->dateTimeInInterval($startDate = '- 7 days', $interval = '+ 1 days', $timezone = null),
                'updated_at' => now(),
            ]);
        }

        //faker barang
        for ($i = 0; $i < 50; $i++) {
            $userKepala = DB::table('users')->inRandomOrder()->first();
            $barang = DB::table('barang')->inRandomOrder()->first();

            DB::table('riwayat_barang')->insert([
                'barang_id' => $barang->id,
                'jumlah' => $faker->numberBetween(-10, 30),
                'user_id' => $userKepala->id,
                'keterangan' => $faker->randomElement(['kirim', 'masuk']),
                'created_at' => $faker->dateTimeInInterval($startDate = '- 7 days', $interval = '+ 1 days', $timezone = null),
                'updated_at' => now(),
            ]);
        }

    }
}