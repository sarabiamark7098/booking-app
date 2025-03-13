<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldOffice;
use App\Models\Province;

class FieldOfficeSeeder extends Seeder
{
    public function run(): void
    {
        // Create Regional Office (Located in Davao City, Serving All)
        $davaoCityProvince = Province::where('name', 'Davao City')->first();
        $regionalOffice = FieldOffice::firstOrCreate(
            ['office_acronym' => 'DSWD-XI'],
            [
                'office_name' => 'DSWD Field Office XI',
                'office_description' => 'DSWD Regional Office for Davao Region',
                'province_id' => $davaoCityProvince->id ?? null, // Assign to Davao City
                'parent_id' => null
            ]
        );

        // Satellite Offices and Their Assigned Provinces
        $satelliteOffices = [
            ['Davao del Norte Satellite Office', 'DSWD-XI-DN', 'Davao del Norte'],
            ['Davao del Sur Satellite Office', 'DSWD-XI-DS', 'Davao del Sur'],
            ['Davao de Oro Satellite Office', 'DSWD-XI-DO', 'Davao de Oro'],
            ['Davao Oriental Satellite Office', 'DSWD-XI-OR', 'Davao Oriental'],
            ['Davao Occidental Satellite Office', 'DSWD-XI-OC', 'Davao Occidental'],
        ];

        // Insert Satellite Offices
        foreach ($satelliteOffices as $office) {
            $province = Province::where('name', $office[2])->first();
            $satelliteOffice = FieldOffice::firstOrCreate(
                ['office_acronym' => $office[1]],
                [
                    'office_name' => $office[0],
                    'office_description' => 'Satellite office under DSWD-XI',
                    'province_id' => $province->id ?? null,
                    'parent_id' => $regionalOffice->id
                ]
            );


        }

        echo "✅ Field offices have been assigned to provinces!\n";
    }
}
