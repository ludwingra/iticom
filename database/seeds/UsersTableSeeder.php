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
        $user = new User();

        $user->name = 'Ludwing Rivera A.';
        $user->email = 'ludwing.ra@gmail.com';
        $user->password = bcrypt('123456789');
        $user->role_id = 1;
        $user->avatar = 'avatar.png';

        $user->save();

    }
}
