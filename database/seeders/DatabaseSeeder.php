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


        // faker user
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $existingCombos = [];

        for ($i = 0; $i < 5; $i++) {
            do {
                $jenisBaju = $faker->randomElement(['kemeja', 'kaos', 'polo', 'jaket']);
                $ukuran = $faker->randomElement(['s', 'm', 'l', 'xl', 'xxl', 'xxxl']);
                $combo = $jenisBaju . '-' . $ukuran;
            } while (in_array($combo, $existingCombos));

            // Tambahkan kombinasi ke array existingCombos
            $existingCombos[] = $combo;

            // Masukkan data ke dalam tabel 'bajus'
            DB::table('bajus')->insert([
                'baju' => $jenisBaju,
                'ukuran' => $ukuran,
            ]);
        }


<<<<<<< HEAD
        // //faker baju
        for ($i = 0; $i < 150; $i++) {
=======
        //faker baju
        for ($i = 0; $i < 15; $i++) {
>>>>>>> d79b546ac5e3268e8b1c95f449eb91819a82858d
            $userKepala = DB::table('users')->inRandomOrder()->first();
            $baju = DB::table('bajus')->inRandomOrder()->first();

            DB::table('riwayat_bajus')->insert([
                'baju_id' => $baju->id,
                'jumlah' => $faker->numberBetween(-10, 30),
                'user_id' => $userKepala->id,
                'keterangan' => $faker->randomElement(['kirim', 'masuk']),
                'created_at' => $faker->dateTimeInInterval($startDate = '- 7 days', $interval = '+ 1 days', $timezone = null),
                'updated_at' => now(),
            ]);
        }

        //faker buku
        // Masukkan data ke dalam tabel 'bajus'
        DB::table('bukus')->insert([
            'nama_buku' => 'OSCE'
        ]);

        DB::table('bukus')->insert([
            'nama_buku' => 'UKMPPD'
        ]);

        for ($i = 0; $i < 15; $i++) {
            $userKepala = DB::table('users')->inRandomOrder()->first();
            $buku = DB::table('bukus')->inRandomOrder()->first();

            DB::table('riwayat_bukus')->insert([
                'buku_id' => $buku->id,
                'jumlah' => $faker->numberBetween(-10, 30),
                'user_id' => $userKepala->id,
                'keterangan' => $faker->randomElement(['kirim', 'masuk']),
                'created_at' => $faker->dateTimeInInterval($startDate = '- 7 days', $interval = '+ 1 days', $timezone = null),
                'updated_at' => now(),
            ]);
        }
    }
}
