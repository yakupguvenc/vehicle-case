<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface VehicleRepositoryInterface
{
    public function all(): Collection;
}
