<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed some data into the course_categories table
        Certification::create([
            'name_en' => 'Enterprise Architecture',
            'name_fr' => "Architecture d'entreprise",
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'enterprise-architecture',
        ]);

        Certification::create([
            'name_en' => 'Cyber Security',
            'name_fr' => 'La cyber-sécurité',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'cyber-security',
        ]);

        Certification::create([
            'name_en' => 'Networking & Wireless',
            'name_fr' => 'Réseaux et sans fil',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'networking-wireless',
        ]);

        Certification::create([
            'name_en' => 'Business Analysis',
            'name_fr' => 'Analyse commerciale',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'business-analysis',
        ]);

        Certification::create([
            'name_en' => 'IT Service Management',
            'name_fr' => 'Gestion des services informatiques',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'it-service-management',
        ]);

        Certification::create([
            'name_en' => 'Data center',
            'name_fr' => 'Centre de données',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'data-center',
        ]);

        Certification::create([
            'name_en' => 'Cloud Computing',
            'name_fr' => 'Cloud computing',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'cloud-computing',
        ]);

        Certification::create([
            'name_en' => 'Project Management',
            'name_fr' => 'Gestion de projet',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'project-management',
        ]);

        Certification::create([
            'name_en' => 'Java Programming',
            'name_fr' => 'Programmation Java',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 1524.58,
            'fees_fcfa' => 1000000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'java-programming',
        ]);
        Certification::create([
            'name_en' => 'ISACA Certification Training Courses',
            'name_fr' => 'Cours de formation certifiés ISACA',
            'description_en' => '',
            'description_fr' => '',
            'fees_euro' => 762.60,
            'fees_fcfa' => 500000,
            'fees_description_en' => 'Certification Exam Fee',
            'fees_description_fr' => 'Frais d’examen de certification ',
            'tax' => 18,
            'url_tag' => 'isaca-certification-training-courses',
        ]);
    }
}
