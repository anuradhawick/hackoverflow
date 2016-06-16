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
        $user = new \App\User();
        $user1 = new \App\User();
        $user2 = new \App\User();
        $user3 = new \App\User();
        $user4 = new \App\User();
        $user5 = new \App\User();
        $user6 = new \App\User();

        $user->email = "sanjeewa@live.com";
        $user1->email = "robinson@gmail.com";
        $user2->email = "ravidu@protonmail.com";
        $user3->email = "dulaj@ymail.com";
        $user4->email = "pamoda@yahoo.com";
        $user5->email = "chamal@outlook.com";
        $user6->email = "pasindu@hotmail.com";

        $user->save();
        $user1->save();
        $user2->save();
        $user3->save();
        $user4->save();
        $user5->save();
        $user6->save();
    }
}
