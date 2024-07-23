<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Group::all() as $group) {
            User::factory()
                ->count(10)
                ->for($group)
                ->hasAttached(
                    Subject::all(),
                    function () {
                        return ['assessment' => rand(1, 5)];
                    })
                ->create();
        }
    }
}
