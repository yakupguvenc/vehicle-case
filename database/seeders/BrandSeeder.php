<?php

namespace Database\Seeders;

use App\Repositories\BrandRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    private BrandRepositoryInterface $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->brandRepository->truncate();

        $brands = [
            ['name' => 'BMW'],
            ['name' => 'Citroen'],
            ['name' => 'Fiat'],
            ['name' => 'Ford'],
            ['name' => 'Hyundai'],
            ['name' => 'Jeep'],
            ['name' => 'Kia'],
            ['name' => 'Mercedes'],
            ['name' => 'Opel'],
            ['name' => 'Peugeot'],
            ['name' => 'Skoda'],
            ['name' => 'Renault'],
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
        ];

        foreach ($brands as $brand) $this->brandRepository->create($brand);

    }
}
