<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student_permissions = Permission::whereIn('name', ['course-list', 'course-edit'])->get();
        $role = Role::where('name', 'Student')->first();
        $role->syncPermissions($student_permissions);
        //
        $instructor_permissions = Permission::whereIn('name', [
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'course-meta-list',
            'course-meta-create',
            'course-meta-edit',
            'course-meta-delete',
        ])->get();
        $role = Role::where('name', 'Instructor')->first();
        $role->syncPermissions($instructor_permissions);
        //
        $instructor_permissions = Permission::whereIn('name', [
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'course-meta-list',
            'course-meta-create',
            'course-meta-edit',
            'course-meta-delete',
        ])->get();
        $role = Role::where('name', 'Commercial')->first();
        $role->syncPermissions($instructor_permissions);

    }
}
