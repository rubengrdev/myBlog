<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user=new User;
        $user->username='User';
        $user->email="user@post.com";
        $user->password=Hash::make('1234');
        $user->role_id=1;
        $user->save();
        $user=new User;
        $user->username='Admin';
        $user->email="admin@post.com";
        $user->password=Hash::make('1234');
        $user->role_id=2;
        $user->save();


    }
}
