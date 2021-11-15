<?php

namespace App\Repositories\Eloquent;

use App\Models\ClassGroup;
use App\Repositories\ClassGroupRepositoryInterface;
use Illuminate\Support\Collection;

class ClassGroupRepository extends BaseRepository implements ClassGroupRepositoryInterface
{

    /**
     * FuelRepository constructor.
     *
     * @param ClassGroup $model
     */
    public function __construct(ClassGroup $model)
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
