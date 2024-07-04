<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class TrainingTopicsSeeder extends Seeder
{
    public function run()
    {
        DB::table('training_topics')->insert([
            [
                'name_en' => 'Software Development',
                'name_fr' => 'Développement de logiciels',
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'software-development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'IT Infrastructure & Networks',
                'name_fr' => 'Infrastructure informatique et réseaux',
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'it-infrastructure-networks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Enterprise Integration',
                'name_fr' => "Intégration d'entreprise",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'enterprise-integration',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Business Application & Analytics',
                'name_fr' => "Applications et analyses commerciales",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'business-application-analytics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Cloud Computing',
                'name_fr' => "Cloud computing",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'cloud-computing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Project Management',
                'name_fr' => "Gestion de projet",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'project-management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Machine Learning & Artificial Intelligence',
                'name_fr' => "Apprentissage automatique et intelligence artificielle",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'machine-learning-artificial-intelligence',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Agile Developpement & Scrum Training',
                'name_fr' => "Développement Agile & Formation Scrum",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'agile-developpement-scrum-training',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Sales, Marketing & Communication Strategies',
                'name_fr' => "Stratégies de vente, de marketing et de communication",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'sales-marketing-communication-strategies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Cyber Security Training Courses',
                'name_fr' => "Cours de formation en cybersécurité",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'cyber-security-training-courses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Database',
                'name_fr' => "Base de données",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'database',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Health Safety Environment',
                'name_fr' => "Santé Sécurité Environnement",
                'description_en' => '',
                'description_fr' => '',
                'url_tag' => 'health-safety-environment',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
