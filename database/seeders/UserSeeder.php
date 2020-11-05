<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Telkomsel',
            'email' => 'admin@telkomsel.com',
            'password' => Hash::make('password'),
            'roles' => 'Admin'
        ]);

        $company = Company::create([
            'name' => 'PT Telkomsel',
            'description' => 'ehehehwa okeawkoe',
            'user_id' => $user->id,
            'village_id' => 1
        ]);
    }
}
