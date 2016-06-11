<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->given_name = "Anuradha";
        $user->family_name = "Wickramarachchi";
        $user->name = "Anuradha Wickramarachchi";
        $user->password = bcrypt("732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com");
        $user->sub = "105315013893547490786";
        $user->picture = "https://lh4.googleusercontent.com/-t_3z1ySLNNU/AAAAAAAAAAI/AAAAAAAACts/noKs8BL3vug/s96-c/photo.jpg";
        $user->admin = 1;
        $user->email = "anuradhawick@gmail.com";
        $user->save();
    }
}
