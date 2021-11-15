<?php

namespace Database\Seeders;

use App\Repositories\GearTypeRepositoryInterface;
use Illuminate\Database\Seeder;

class GearTypeSeeder extends Seeder
{
    private GearTypeRepositoryInterface $gearTypeRepository;

    public function __construct(GearTypeRepositoryInterface $gearTypeRepository)
    {
        $this->gearTypeRepository = $gearTypeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->gearTypeRepository->truncate();

        $gearTypes = [
            ['name' => 'Düz'],
            ['name' => 'Otomatik'],
            ['name' => 'Manuel'],
        ];

        foreach ($gearTypes as $gearType) $this->gearTypeRepository->create($gearType);
    }
}
