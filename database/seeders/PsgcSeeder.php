<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\District;
use League\Csv\Reader;

class PsgcSeeder extends Seeder
{
    public function run()
    {
        $data = json_decode($this->json(), true);
        foreach ($data as $index => $row) {
            if ($index == 0) continue; // Skip headers

            // Insert or get Region
            $region = Region::firstOrCreate(
                ['psgc_code' => $row[9]],
                ['name' => $row[8], 'short_name' => $row[10]]
            );

            // Insert or get Province
            $province = Province::firstOrCreate(
                ['psgc_code' => $row[1]],
                ['name' => $row[0], 'region_id' => $region->id]
            );

            // Insert or get Municipality
            $municipality = Municipality::firstOrCreate(
                ['psgc_code' => $row[3]],
                ['name' => $row[2], 'province_id' => $province->id]
            );

            // Insert Barangay
            $barangay = Barangay::firstOrCreate(
                ['psgc_code' => $row[5]],
                ['name' => $row[4], 'municipality_id' => $municipality->id]
            );

            // Insert District if present
            if (!empty($row[6])) {
                District::firstOrCreate(
                    ['name' => $row[6], 'municipality_id' => $municipality->id]
                );
            }

            echo "Inserted: {$barangay->name}, {$municipality->name}, {$province->name}, {$region->name}\n";
        }
    }

    private function json()
    {
        $reader = Reader::createFromPath(public_path('/dataseeders/psgc.csv'), 'r');
        $data = [];
        foreach ($reader->getRecords() as $row) {
            $data[] = $row;
        }
        return json_encode($data);
    }
}
