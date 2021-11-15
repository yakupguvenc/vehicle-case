<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface FuelTypeRepositoryInterface
{
    public function all(): Collection;
}
