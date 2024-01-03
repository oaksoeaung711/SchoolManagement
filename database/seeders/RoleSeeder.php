<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public $roles_and_desciption = [
        "Global Administrator" => "Can manage administrators./Can manage users./Can manage roles./Can manage signs./Can manage timetables./Can create cards./Cannot manage global administrators.",
        "Administrator" => "Can manage users./Can manage signs./Can manage timetables./Can create cards./Cannot manage global administrators and adminsitrators.",
        "Timetable" => "Can manage timetables.",
        "Teacher" => "Can manage teachers and signs.",
        "Report Card" => "Can create report cards.",
        "Graduation Card" => "Can create graduation certificate cards."
    ];
    public function run(): void
    {
        foreach($this->roles_and_desciption as $role => $description){
            Role::create([
                'name' => "$role",
                'slug' => Str::slug($role),
                "description" => "$description"
            ]);
        }
    }
}
