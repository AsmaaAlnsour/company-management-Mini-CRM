<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    
    //     // Create companies
    //     Company::factory()->count(10)->create();
    
    //     // Create employees
    //     Employee::factory()->count(50)->create();
    // }


    $this->call([
        CompanySeeder::class,
        EmployeeSeeder::class,
    ]);
        // $admin = \App\User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('password'),
        // ]); 



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }}



    