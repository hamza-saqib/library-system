<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Rack;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Hamza Saqib', 'email'=>'admin@gmail.com', 'password'=>Hash::make('admin@123'), 'role'=>'admin']);
        //\App\Models\User::factory(10)->create();
        \App\Models\Rack::factory(10)->create();
        \App\Models\Book::factory(20)->create();
    }
}
