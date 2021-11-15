<?php

namespace App\Repositories\Eloquent;

use App\Models\FuelType;
use App\Repositories\FuelTypeRepositoryInterface;
use Illuminate\Support\Collection;

class FuelTypeRepository extends BaseRepository implements FuelTypeRepositoryInterface
{

    /**
     * FuelRepository constructor.
     *
     * @param FuelType $model
     */
    public function __construct(FuelType $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
