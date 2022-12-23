<?php

namespace Database\Seeders;

use App\Enums\AdminLevel;
use App\Enums\AdminStatus;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'uuid' => Str::random(20),
            'no_telp' => '02171538879',
            'status' => AdminStatus::Active,
            'level' => AdminLevel::Superadmin,
        ]);
    }
}
