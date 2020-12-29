<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\UserSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\UserMarkSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(UserMarkSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Subject::factory(10)->create();
        // \App\Models\User_Mark::factory(20)->create();

        //generate access token
        // Artisan::call('passport:client',[
        //     '--no-interaction'=>true,
        //     '--name'=>'Tenant Password Grant Client',
        //     '--password' => true
        // ]);
    }
}
