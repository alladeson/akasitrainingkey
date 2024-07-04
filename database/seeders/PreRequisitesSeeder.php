<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PreRequisitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pre_requisites')->insert([
            [
                'course_id' => 4,
                'description_en' => 'If you have previously taken Project Management Fundamentals, you should not take this course, as there is significant content overlap.',
                'description_fr' => 'Si vous avez déjà suivi les principes fondamentaux de la gestion de projet, vous ne devriez pas suivre ce cours, car il existe un chevauchement important des contenus.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'IT professionals must have 5 years or more of IS audit, control, assurance, and security experience.',
                'description_fr' => 'Les professionnels de l’informatique doivent avoir 5 ans ou plus d’expérience en audit, contrôle, assurance et sécurité des SI.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'This ISACA certification prep course is specifically designed for experienced information security professionals who are preparing to take the ISACA CISA exam.',
                'description_fr' => "Ce cours de préparation à la certification ISACA est spécialement conçu pour les professionnels expérimentés en sécurité de l'information qui se préparent à passer l'examen ISACA CISA.",
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);


    }
}
