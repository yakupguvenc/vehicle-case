<?php

namespace App\Repositories\Eloquent;

use App\Models\GearType;
use App\Repositories\GearTypeRepositoryInterface;
use Illuminate\Support\Collection;

class GearTypeRepository extends BaseRepository implements GearTypeRepositoryInterface
{

    /**
     * FuelRepository constructor.
     *
     * @param GearType $model
     */
    public function __construct(GearType $model)
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
