<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ClassGroupRepositoryInterface
{
    public function all(): Collection;
}
