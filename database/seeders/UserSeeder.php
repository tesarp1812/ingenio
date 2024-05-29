<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Tambahkan baris ini untuk mengimpor kelas Str

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan data pengguna ke dalam tabel users
        // DB::table('users')->insert([
        //     'name' => 'tutor',
        //     'email' => 'tutor@ingenioindonesia.co.id',
        //     'password' => Hash::make('12345'), 
        //     'role_id' => '4',
        //     'remember_token' => Str::random(10), 
        //     'email_verified_at' => now(),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        

        DB::table('users')->insert([
            'name' => 'Viola',
            'email' => 'Viola@ingenioindonesia.co.id',
            'password' => Hash::make('12345'), 
            'role_id' => '7',
            'remember_token' => Str::random(10), 
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
