<?php

namespace App\Repositories\Eloquent;

use App\Models\Brand;
use App\Repositories\BrandRepositoryInterface;
use Illuminate\Support\Collection;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    /**
     * BrandRepository constructor.
     *
     * @param Brand $model
     */
    public function __construct(Brand $model)
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
