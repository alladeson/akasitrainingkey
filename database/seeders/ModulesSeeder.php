<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'course_id' => 1,
                'title_en' => ' Agile/DevOps Foundation Review',
                'title_fr' => ' Examen de la Fondation Agile/DevOps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Why SecDevOps',
                'title_fr' => ' Pourquoi SecDevOps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => ' Culture and Management',
                'title_fr' => ' Culture et gestion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => ' General Security Considerations',
                'title_fr' => ' Considérations générales sur la sécurité',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Feature and Security Workflow',
                'title_fr' => 'Workflow de fonctionnalités et de sécurité',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Acquisition Lifecycle Security',
                'title_fr' => 'Sécurité du cycle de vie des acquisitions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Identity and Access Management (IAM)',
                'title_fr' => 'Gestion des identités et des accès (IAM)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Application Security',
                'title_fr' => 'Sécurité des applications',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Operational Security',
                'title_fr' => 'Sécurité opérationnelle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Cross-Team Security',
                'title_fr' => 'Sécurité inter-équipes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Roles and Responsibilities',
                'title_fr' => 'Rôles et responsabilités',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Governance, Risk, Compliance(GRC) Audit',
                'title_fr' => 'Audit de gouvernance, de risque et de conformité (GRC)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Logging, Monitoring, and Response',
                'title_fr' => 'Journalisation, surveillance et réponse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 1,
                'title_en' => 'Review and Summary',
                'title_fr' => 'Examen et résumé',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Introduction Power Platform',
                'title_fr' => 'Introduction de la plate-forme de puissance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Introduction to Microsoft Dataverse',
                'title_fr' => 'Introduction à Microsoft Dataverse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Get Sarted with Power Apps',
                'title_fr' => 'Lancez-vous avec Power Apps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Get Sarted with Power Automate',
                'title_fr' => 'Lancez-vous avec Power Automate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Get Sarted with Power BI',
                'title_fr' => 'Lancez-vous avec Power BI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'title_en' => 'Introduction to Power Virtual Agent',
                'title_fr' => 'Introduction à Power Virtual Agent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Fundamentals pf an IT project',
                'title_fr' => "Fondamentaux d'un projet informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Quality of an IT project',
                'title_fr' => "Qualité d'un projet informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Lunch of project',
                'title_fr' => "Déjeuner de projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Definition of scope of project',
                'title_fr' => "Définition de la portée du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Time management and planning',
                'title_fr' => "Gestion du temps et planification",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Resource Planning',
                'title_fr' => "Gestion du temps et planification",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Cost management and control',
                'title_fr' => "Gestion et contrôle des coûts",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Communications management',
                'title_fr' => "Gestion des communications",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Rick management',
                'title_fr' => "Gestion de Rick",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Supplier management',
                'title_fr' => "Gestion des fournisseurs",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Change management',
                'title_fr' => "Gestion du changement",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'Phase and Project closure ',
                'title_fr' => "Phase et clôture du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'title_en' => 'PRACTICAL WORK ',
                'title_fr' => "TRAVAUX PRATIQUES",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'title_en' => 'The Process of Auditing Information System',
                'title_fr' => "Le processus d’audit du système d’information",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'title_en' => 'IT Governance and Management of IT',
                'title_fr' => "Gouvernance informatique et gestion de l'informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'title_en' => 'Information Systems Acquisition, Development, and Implementation',
                'title_fr' => "Acquisition, développement, et mise en œuvre de systèmes d'information",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'title_en' => 'Information Systems Operation, Maintenance, and Support',
                'title_fr' => "Exploitation, maintenance et support des systèmes d'information",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'title_en' => 'Protection and Information Assets',
                'title_fr' => "Actifs de protection et d’information",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
