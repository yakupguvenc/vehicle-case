<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface BrandRepositoryInterface
{
    public function all(): Collection;
}
