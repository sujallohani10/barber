<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::query()->delete();
        //
        $services = [
            ['name' => 'Hair Cut', 'description' => 'Professional hair cutting service', 'price' => 30],
            ['name' => 'Shave', 'description' => 'Traditional shaving service', 'price' => 20],
            ['name' => 'Combo', 'description' => 'Hair cut and shave combo service', 'price' => 45],
        ];

        // Insert services into the 'services' table
        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}
