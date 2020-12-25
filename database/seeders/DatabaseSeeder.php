<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        \App\Models\Subject::factory(5)->create();
        \App\Models\User_Mark::factory(10)->create();

        //generate access token
        Artisan::call('passport:client',[
            '--no-interaction'=>true,
            '--name'=>'Tenant Password Grant Client',
            '--password' => true
        ]);
    }
}
