<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'role' => 'admin',
                'username' => 'admin',
                'email' => 'admin@lepetite.com',
                'password' => bcrypt('123456'),
                'address' => 'Le Petite Pasta',
                'phone_number' => '0218465780',
                'gender' => 'Male',
                'remember_token' => Str::random(50)
            ],
            [
                'first_name' => 'Stefan',
                'last_name' => 'Adisurya',
                'role' => 'member',
                'username' => 'stefanadisurya',
                'email' => 'stefan@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jalan Anggrek, no. 2',
                'phone_number' => '081725192242',
                'gender' => 'Male',
                'remember_token' => Str::random(50)
            ],
            [
                'first_name' => 'Nicholas',
                'last_name' => 'Owen',
                'role' => 'member',
                'username' => 'nicholasowen',
                'email' => 'nic.owen@hotmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jalan Z, no. 10',
                'phone_number' => '0218459078',
                'gender' => 'Male',
                'remember_token' => Str::random(50)
            ],
            [
                'first_name' => 'Kathryn',
                'last_name' => 'Kezia',
                'role' => 'member',
                'username' => 'kathrynkezia',
                'email' => 'keke@yahoo.com',
                'password' => bcrypt('123456'),
                'address' => 'Perum. Gading Asri, no. 10',
                'phone_number' => '089847685970',
                'gender' => 'Female',
                'remember_token' => Str::random(50)
            ],
        ]);
    }
}
