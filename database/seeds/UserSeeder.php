<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'JMS Admin',
            'email' => 'admin@jms.com',
            'password' => bcrypt('00000000'),
            'user_type_id' => 0,
            'status' => 1,
        ]);
// php artisan db:seed

    }
}
