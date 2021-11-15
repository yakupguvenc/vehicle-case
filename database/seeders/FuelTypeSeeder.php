<?php

namespace Database\Seeders;

use App\Repositories\FuelTypeRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTypeSeeder extends Seeder
{
    private FuelTypeRepositoryInterface $fuelRepository;

    public function __construct(FuelTypeRepositoryInterface $fuelRepository)
    {
        $this->fuelRepository = $fuelRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fuelRepository->truncate();

        $fuel_types = [
            ['name' => 'Benzin'],
            ['name' => 'Dizel'],
            ['name' => 'LPG'],
            ['name' => 'Hibrit'],
        ];

        foreach ($fuel_types as $fuel) $this->fuelRepository->create($fuel);
    }
}
