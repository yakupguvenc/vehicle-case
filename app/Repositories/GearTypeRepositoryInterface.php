<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface GearTypeRepositoryInterface
{
    public function all(): Collection;
}
