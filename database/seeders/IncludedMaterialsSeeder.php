<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncludedMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insérer des données dans la table included_materials
        DB::table('included_materials')->insert([

            [
                'course_id' => 4,
                'description_en' => 'Identify Quality Requirements',
                'description_fr' => 'Identifier les exigences de qualité',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Identify the Stakeholders',
                'description_fr' => 'Identifier les parties prenantes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Complete the Project Charter',
                'description_fr' => 'Compléter la charte de projet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Trace Requirements',
                'description_fr' => 'Exigences de traçage',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Determine the Work Breakdown Structure',
                'description_fr' => 'Déterminer la structure de répartition du travail',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Break Down the Work into Activities',
                'description_fr' => 'Décomposez le travail en activités',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Sequence the Activities',
                'description_fr' => 'Séquencer les activités',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Estimate Activity Duration',
                'description_fr' => "Estimer la durée de l'activité",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Use Network Diagramming',
                'description_fr' => "Utiliser les diagrammes de réseau",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Identify Resource Requirements',
                'description_fr' => "Identifier les besoins en ressources",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Create a Responsibility Assignment Matrix',
                'description_fr' => "Créer une matrice d'attribution des responsabilités",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Develop a Project Cost Estimate',
                'description_fr' => "Élaborer une estimation du coût du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Create a Communication Management Plan',
                'description_fr' => "Créer un plan de gestion des communications",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Assess Project Risks',
                'description_fr' => "Évaluer les risques du projet",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Determine Risk Response Strategies',
                'description_fr' => "Déterminer les stratégies de réponse aux risques",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Manage a Vendor Driven Change',
                'description_fr' => "Gérer un changement piloté par le fournisseur",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 4,
                'description_en' => 'Develop a Change Management Plan',
                'description_fr' => "Élaborer un plan de gestion du changement",
                'created_at' => now(),
                'updated_at' => now(),
            ],



        ]);

        // Ajoutez d'autres données si nécessaire
    }
}
