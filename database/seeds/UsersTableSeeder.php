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
        $user = User::where('email', 'admin@admin.com')->first();
        if (is_null($user)){

            $user = new User();
            $user->name = "Admin";
            $user->email = "admin@admin.com";
            $user->password = \Illuminate\Support\Facades\Hash::make('password');
            $user->save();

        }
    }
}
