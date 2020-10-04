<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Student;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Department::factory(5)->create();
         \App\Models\Group::factory(10)->create();
         \App\Models\Student::factory(20)->create();
    }
}
