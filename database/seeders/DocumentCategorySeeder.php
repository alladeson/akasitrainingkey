<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('document_categories')->insert([
            [
                'name' => 'pdf',
                'description' => 'PDF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'image',
                'description' => 'Image',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
