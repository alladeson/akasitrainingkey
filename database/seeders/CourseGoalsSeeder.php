<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('course_goals')->insert([
            [
                'course_id' => 1,
                'description_en' => 'Prepare for the DevOps Institute SecDevOps Foundation Certification (SDOF) with the world’s first accredited SecDevOps certification course',
                'description_fr' => 'Préparez-vous à la certification SecDevOps Foundation (SDOF) du DevOps Institute avec le premier cours de certification SecDevOps accrédité au monde.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'description_en' => 'Trace the history and evolution of SecDevOps',
                'description_fr' => 'Retracer l’histoire et l’évolution de SecDevOps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'description_en' => 'Integrate SecDevOps roles with a DevOps culture and organization',
                'description_fr' => 'Intégrer les rôles SecDevOps à une culture et une organisation DevOps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'description_en' => 'Receive official certification from the DevOps Institute (DOI)',
                'description_fr' => 'Recevez la certification officielle du DevOps Institute (DOI)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'description_en' => 'Continue learning and face new challenges with after-course one-on-one instructor coaching',
                'description_fr' => "Continuez à apprendre et relevez de nouveaux défis grâce au coaching individuel d'un instructeur après le cours.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Describe the Power Platform components: Power Apps, Power BI, and Microsoft Automate',
                'description_fr' => "Décrire les composants Power Platform : Power Apps, Power BI et Microsoft Automate",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Describe the Power Platform components: Common Data Service, Connectors, and AI (Artificial Intelligence) builder',
                'description_fr' => "Décrire les composants de Power Platform : Common Data Service, connecteurs et générateur d'IA (intelligence artificielle)",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Describe cross-cloud scenarios across M365, Dynamics 365, Microsoft Azure, and 3rd party services',
                'description_fr' => "Décrire des scénarios cross-cloud sur M365, Dynamics 365, Microsoft Azure et les services tiers",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Identify the benefits and capabilities of Power Platform',
                'description_fr' => "Identifier les avantages et les capacités de Power Platform",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Identify the basic functionality and business value of Power Platform components',
                'description_fr' => "Identifier les fonctionnalités de base et la valeur commerciale des composants Power Platform",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Implement simple solutions with Microsoft Automate, Power BI, and Power Apps',
                'description_fr' => "Implémentez des solutions simples avec Microsoft Automate, Power BI et Power Apps",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'description_en' => 'Continue learning and face new challenges with after-course one-on-one instructor coaching',
                'description_fr' => "Continuez à apprendre et relevez de nouveaux défis grâce au coaching individuel d'un instructeur après le cours.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'description_en' => 'Develop 21st Century leadership to achieve outstanding results',
                'description_fr' => "Développer le leadership du 21e siècle pour obtenir des résultats exceptionnels",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'description_en' => 'Enhance trust, communicate honestly, and establish a positive climate',
                'description_fr' => "Renforcez la confiance, communiquez honnêtement et établissez un climat positif",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'description_en' => 'Champion change in the contemporary workplace',
                'description_fr' => "Promouvoir le changement sur le lieu de travail contemporain",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'description_en' => 'Navigate multi-generational and diverse teams',
                'description_fr' => "Naviguer dans des équipes multigénérationnelles et diversifiées",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'description_en' => 'Build bridges of understanding in chaotic environments',
                'description_fr' => "Construire des ponts de compréhension dans des environnements chaotiques",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Foundations of project management',
                'description_fr' => "Fondements de la gestion de projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'IT project life cycle',
                'description_fr' => "Cycle de vie d'un projet informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Quality requirements',
                'description_fr' => "Exigences de qualité",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Project stakeholders, scope, and uncertainty',
                'description_fr' => "Parties prenantes du projet, portée et incertitude",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Project requirements',
                'description_fr' => "Exigences du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Create a work breakdown structure',
                'description_fr' => "Créer une structure de répartition du travail",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Create a network diagram based on activity sequence and duration',
                'description_fr' => "Créer un diagramme de réseau basé sur la séquence et la durée des activités",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Assign responsibility for project activities',
                'description_fr' => "Attribuer la responsabilité des activités du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Estimate project cost',
                'description_fr' => "Estimer le coût du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Create a communication management plan',
                'description_fr' => "Créer un plan de gestion de la communication",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Assess project risk and determine risk response strategies',
                'description_fr' => "Évaluer les risques du projet et déterminer les stratégies de réponse aux risques",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Manage vend',
                'description_fr' => "Gérer la vente",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'Prepare for and pass the Certified Information Systems Auditor (CISA) Exam. ',
                'description_fr' => "Préparez-vous et réussissez l'examen d'auditeur certifié des systèmes d'information (CISA).",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'Develop and implement a risk-based IT audit strategy in compliance with IT audit standards. ',
                'description_fr' => "Élaborer et mettre en œuvre une stratégie d'audit informatique basée sur les risques, conformément aux normes d'audit informatique.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'Evaluate the effectiveness of an IT governance structure. ',
                'description_fr' => "Évaluer l’efficacité d’une structure de gouvernance informatique.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'Ensure that the IT organizational structure and human resources (personnel) management support the organization’s strategies and objectives. ',
                'description_fr' => "Veiller à ce que la structure organisationnelle informatique et la gestion des ressources humaines (personnel) soutiennent les stratégies et les objectifs de l’organisation.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'description_en' => 'Review the information security policies, standards, and procedures for completeness and alignment with generally accepted practices. ',
                'description_fr' => "Examinez les politiques, normes et procédures de sécurité de l’information pour vérifier qu’elles sont complètes et alignées avec les pratiques généralement acceptées.",
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);


    }
}
