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

        $user->given_name = "Anuradha";
        $user->family_name = "Wickramarachchi";
        $user->name = "Anuradha Wickramarachchi";
        $user->password = bcrypt("732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com");
        $user->sub = "12334";
        $user->picture = "https://lh4.googleusercontent.com/-t_3z1ySLNNU/AAAAAAAAAAI/AAAAAAAACts/noKs8BL3vug/s96-c/photo.jpg";
        $user->admin = 1;
        $user->email = "sanjeewa@live.com";

        $user1->given_name = "Robinson";
        $user1->family_name = "Crusoe";
        $user1->name = "Robinson Crusoe";
        $user1->password = bcrypt("732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com");
        $user1->sub = "1233asd4";
        $user1->picture = "https://lh4.googleusercontent.com/-t_3z1ySLNNU/AAAAAAAAAAI/AAAAAAAACts/noKs8BL3vug/s96-c/photo.jpg";
        $user1->admin = 1;
        $user1->email = "robinson@gmail.com";

        $user2->given_name = "Ravidu";
        $user2->family_name = "Mallawa Arachchi";
        $user2->name = "Ravidu Mallawa Arachchi";
        $user2->password = bcrypt("732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com");
        $user2->sub = "1233114";
        $user2->picture = "https://lh4.googleusercontent.com/-t_3z1ySLNNU/AAAAAAAAAAI/AAAAAAAACts/noKs8BL3vug/s96-c/photo.jpg";
        $user2->admin = 1;
        $user2->email = "ravidu@protonmail.com";

        $user3->given_name = "Dulaj";
        $user3->family_name = "Atapattu";
        $user3->name = "Dualaj Atapattu";
        $user3->password = bcrypt("732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com");
        $user3->sub = "1qq2334";
        $user3->picture = "https://lh4.googleusercontent.com/-t_3z1ySLNNU/AAAAAAAAAAI/AAAAAAAACts/noKs8BL3vug/s96-c/photo.jpg";
        $user3->admin = 1;
        $user3->email = "dulaj@ymail.com";


        $user->save();
        $user1->save();
        $user2->save();
        $user3->save();
    }
}
