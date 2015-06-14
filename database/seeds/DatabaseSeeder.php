<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');

        Model::reguard();
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \ThreeOh\User::create(
            [
                'email'    => env('APP_ADMIN_EMAIL'),
                'name'     => 'Admin',
                'password' => bcrypt(env('APP_ADMIN_PASSWORD'))
            ]
        );
    }


}
