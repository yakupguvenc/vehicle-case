<?php

namespace Database\Seeders;

use App\Repositories\ClassGroupRepositoryInterface;
use Illuminate\Database\Seeder;

class ClassGroupSeeder extends Seeder
{
    private ClassGroupRepositoryInterface $classGroupRepository;

    public function __construct(ClassGroupRepositoryInterface $classGroupRepository)
    {
        $this->classGroupRepository = $classGroupRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->classGroupRepository->truncate();

        $classGroups = [
            ['name' => 'Ekonomi'],
            ['name' => 'Orta'],
            ['name' => 'Üst'],
            ['name' => 'Lüks'],
            ['name' => 'Suv'],
            ['name' => 'Ekonomi+'],
            ['name' => 'SUV Eko']
        ];

        foreach ($classGroups as $classGroup) $this->classGroupRepository->create($classGroup);
    }
}
