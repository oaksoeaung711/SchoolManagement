<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'firstname' => "Oak Soe",
            'lastname' => "Aung",
            'email' => "oaksoeaung01@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Oak Soe"),
        ])->roles()->attach(1);

        User::create([
            'firstname' => "Kyaw",
            'lastname' => "Kyaw",
            'email' => "kyawkyaw@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Kyaw"),
        ])->roles()->attach(1);

        User::create([
            'firstname' => "Su",
            'lastname' => "Su",
            'email' => "susu@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Su"),
        ])->roles()->attach(2);

        User::create([
            'firstname' => "Yu",
            'lastname' => "Yu",
            'email' => "yuyu@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Yu"),
        ])->roles()->attach(2);

        User::create([
            'firstname' => "Nu",
            'lastname' => "Nu",
            'email' => "nunu@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Nu"),
        ])->roles()->attach(3);

        User::create([
            'firstname' => "Tun",
            'lastname' => "Tun",
            'email' => "tuntun@kbtc.edu.mm",
            'password' => Hash::make('Butterflies123$'),
            'phone' => "09777557034",
            'status' => "active",
            'slug' => Str::slug("Tun"),
        ])->roles()->attach(4);
    }
}
