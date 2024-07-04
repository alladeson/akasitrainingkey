<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            CreateRolePermissionSeeder::class,
            CreateAdminUserSeeder::class,
            CreateInstructorUserSeeder::class,
            CreateCommercialUserSeeder::class,
            TrainingTopicsSeeder::class,
            CourseCategorySeeder::class,
            CertificationSeeder::class,
            VendorSeeder::class,
            InstructorsSeeder::class,
            CoursesSeeder::class,
            CourseGoalsSeeder::class,
            ModulesSeeder::class,
            LessonsSeeder::class,
            SchedulesSeeder::class,
            IncludedMaterialsSeeder::class,
            PreRequisitesSeeder::class,
            TargetedAudiencesSeeder::class,
            LocationSeeder::class,
            DocumentCategorySeeder::class,
        ]);
    }
}
