<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        DB::table('role_user')->truncate();

        // Insert a record into users table.
        $admin_user = factory(User::class)->create([ 'email' => 'admin@gmail.com' ]);
        $admin_user->roles()->attach(Role::where('name', 'Admin')->first()->id);

        $user = factory(User::class)->create([ 'email' => 'any@gmail.com' ]);
        $user->roles()->attach(Role::where('name', '!=', 'Admin')->first()->id);
    }
}
