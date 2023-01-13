<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'name'=>'Administrador',
            'username'=>'admin',
            'email'=>env('USER_INITIAL'),
            'type'=>0,
            'active'=>true,
            'password'=>Hash::make(env('PASS_INITIAL'))
        ]);
    }
}
