<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Hashir khan',
            'email' => 'jabir@admin.com',
            'password' => 'khan1234',
            'image' => 'image.jpg'
        ]);
    }
}
