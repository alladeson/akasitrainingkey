<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;

class CreateCommercialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'ALEK Commercial',
            'email' => 'commercial@akasilearningkey.com',
            'password' => bcrypt('RyY6={ZQ27$KCGa'),
            'email_verified_at' => now(),
        ]);

        $role = Role::where('name', 'Commercial')->first();

        $user->assignRole([$role->id]);

        event(new Registered($user));
    }
}
