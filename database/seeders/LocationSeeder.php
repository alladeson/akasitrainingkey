<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $locations = [
            'Cotonou',
            'Brazzaville',
            'Abidjan',
            'Accra',
            'Addis-Abeba',
            'Kigali',
            'Kampala',
            'Lome',
            'Kinshasa',
            'Nairobi',
            'Niamey',
            'Ouagadougou',
            'Bruxelles',
            'Lyon',
            'Paris',
            'Montreal',
            'Nashua',
            'Toronto',

        ];

        foreach ($locations as $location) {
            Location::create(['name' => $location]);
        }
    }
}
