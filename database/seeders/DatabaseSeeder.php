<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::factory(1)->create();

        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Khoirun Nyssa',
            'email' => 'Khoirun_n@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Salsa Alifia Faradiba',
            'email' => 'Salsa_af@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Arum Widanarti Putri',
            'email' => 'Arum_wp@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Siska Intan Maysaroh',
            'email' => 'Siska_im@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Amelia Rahmawati',
            'email' => 'Amelia_r@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Wilanda',
            'email' => 'Wilanda@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
        Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => 'Rahma Amelia Putri',
            'email' => 'Rahma_ap@fajrulislam.or.id',
            'password' => bcrypt(12345678),
            'role_id' => 4,
        ]);
    }
}
