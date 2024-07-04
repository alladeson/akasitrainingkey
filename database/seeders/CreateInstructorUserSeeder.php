<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;

class CreateInstructorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Instructor')->first();
        // 2
        $user = User::create([
            'name' => 'Pierre Houdagba',
            'email' => 'instructor2@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));
        // 3
        $user = User::create([
            'name' => 'Is Dine Boukari',
            'email' => 'instructor3@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));
        // 4
        $user = User::create([
            'name' => 'Alexandre Alle',
            'email' => 'instructor4@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));
        // 5
        $user = User::create([
            'name' => 'Chérif Ligan',
            'email' => 'instructor5@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));
        // 6
        $user = User::create([
            'name' => 'Valentin Akando',
            'email' => 'instructor6@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));
        // 7
        $user = User::create([
            'name' => 'Abdou Ganiyi BAKARY',
            'email' => 'instructor7@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole([$role->id]);
        event(new Registered($user));


    }
}
