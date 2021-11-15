<?php

namespace Database\Seeders;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository->truncate();

        $this->userRepository->create(
            [
                'name' => 'Admin',
                'email' => 'admin@otokirala.com',
                'password' => bcrypt('password')
            ]);
    }
}
