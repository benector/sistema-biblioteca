<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        User::updateOrCreate([
            'id' => 1,
         
        ],[
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
        ]);
    }
}