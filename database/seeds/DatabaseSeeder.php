<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Subscription_types::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestDataSeeder::class);
    }
}
