<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['name' => '日本', 'display_order' => 1],
            ['name' => '中国・朝鮮半島', 'display_order' => 2],
            ['name' => 'モンゴル・南アジア・東南アジア', 'display_order' => 3],
            ['name' => 'アメリカ大陸', 'display_order' => 4],
            ['name' => 'ヨーロッパ・アフリカ', 'display_order' => 5],
            ['name' => '中近東', 'display_order' => 6],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
