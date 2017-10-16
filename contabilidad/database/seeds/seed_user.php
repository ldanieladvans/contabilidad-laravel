<?php

use Illuminate\Database\Seeder;
use App\User;

class seed_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apiUser = User::create([
            'name' => 'Usuario API',
            'email' => 'api@advans.mx', 
            'password' => bcrypt('Usuarioapi123*'),
        ]);

        $adminUser = User::create([
            'name' => 'Usuario Admin',
            'email' => 'admin@advans.mx', 
            'password' => bcrypt('Admin123*'),
        ]);
    }
}
