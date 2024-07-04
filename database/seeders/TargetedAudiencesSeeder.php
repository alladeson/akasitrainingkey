<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TargetedAudiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('targeted_audiences')->insert([
            [
                'course_id' => 4,
                'description_en' => 'IT professionals',
                'description_fr' => "Professionnels de l'informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'IT project managers',
                'description_fr' => "Chefs de projets informatiques",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'IT managers',
                'description_fr' => "Responsables informatiques",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'IT project team members',
                'description_fr' => "Membres de l'équipe de projet informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Associate project managers',
                'description_fr' => "Chefs de projets associés",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'project managers',
                'description_fr' => "Chefs de projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Project coordinators',
                'description_fr' => "Coordinateurs de projets",
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'course_id' => 4,
                'description_en' => 'Project analysts',
                'description_fr' => "Analystes de projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Project leaders',
                'description_fr' => "Leaders de projets",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Senior project managers',
                'description_fr' => "Chefs de projet seniors",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Team leaders',
                'description_fr' => "Chefs d'équipe",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Product managers',
                'description_fr' => "chefs de production",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Program managers',
                'description_fr' => "Gestionnaires de programmes",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Ajoutez d'autres enregistrements au besoin
    }
}
