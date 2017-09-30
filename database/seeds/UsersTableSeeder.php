<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate all of users table data.
        User::truncate();

        // Insert a record into users table.
        factory(User::class)->create([ 'email' => 'admin@gmail.com' ]);
    }
}
