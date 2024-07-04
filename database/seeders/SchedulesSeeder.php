<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('schedules')->insert([
            [
                'course_id' => 1,
                'started_date' => '2025-01-06',
                'end_date' => '2025-01-07',
                'started_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location_en' => 'Cotonou on site',
                'location_fr' => 'Cotonou sur place',
                'published' => true,
                'status' => 'published',
                'description_en' => '1-day training including the Educational Kit, the course material, coffee and lunch breaks, certification preparation coaching',
                'description_fr' => 'Formation de 1 jour incluant le Kit pédagogique, le support de cours, les pauses café et déjeuner, le coaching de préparation à la certification',
                'time_zone' => 'UTC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'started_date' => '2025-08-11',
                'end_date' => '2025-08-12',
                'started_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location_en' => 'Kigali on site',
                'location_fr' => 'Kigali sur place',
                'published' => true,
                'status' => 'published',
                'time_zone' => 'UTC',
                'description_en' => '2-day training including the Educational Kit, the course material, coffee and lunch breaks, certification preparation coaching',
                'description_fr' => 'Formation de 2 jours incluant le Kit pédagogique, le support de cours, les pauses café et déjeuner, le coaching de préparation à la certification',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'started_date' => '2025-09-15',
                'end_date' => '2025-09-16',
                'started_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location_en' => 'Ouagadougou on site',
                'location_fr' => 'Ouagadougou sur place',
                'published' => true,
                'status' => 'published',
                'description_en' => '2-day training including the Educational Kit, the course material, coffee and lunch breaks, certification preparation coaching',
                'description_fr' => 'Formation de 2 jours incluant le Kit pédagogique, le support de cours, les pauses café et déjeuner, le coaching de préparation à la certification',
                'time_zone' => 'UTC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'started_date' => '2025-08-18',
                'end_date' => '2025-08-19',
                'started_time' => '09:00:00',
                'end_time' => '17:00:00',
                'location_en' => 'Lomé on site',
                'location_fr' => 'Lomé sur place',
                'published' => true,
                'status' => 'published',
                'description_en' => '2-day training including the Educational Kit, the course material, coffee and lunch breaks, certification preparation coaching',
                'description_fr' => 'Formation de 2 jours incluant le Kit pédagogique, le support de cours, les pauses café et déjeuner, le coaching de préparation à la certification',
                'time_zone' => 'UTC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 5,
                'started_date' => '2023-12-11',
                'end_date' => '2023-12-15',
                'started_time' => '08:00:00',
                'end_time' => '17:00:00',
                'location_en' => 'Dakar on site',
                'location_fr' => 'Dakar sur place',
                'published' => true,
                'status' => 'published',
                'description_en' => '5-day training including the educational kit, course materials, coffee and lunch breaks, certification preparation coaching',
                'description_fr' => 'Formation de 5 jours incluant le Kit pédagogique, le support de cours, les pauses café et déjeuner, le coaching de préparation à la certification',
                'time_zone' => 'UTC',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
