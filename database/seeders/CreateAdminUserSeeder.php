<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Akasi Learning Key',
            'email' => 'admin@akasilearningkey.com',
            'password' => bcrypt('g+$7!XN^>=Zey#z@p&G2ba'),
            'email_verified_at' => now(),
        ]);

        $role = Role::where('name', 'Admin')->first();

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        event(new Registered($user));
    }
}
