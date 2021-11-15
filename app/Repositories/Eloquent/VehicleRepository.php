<?php

namespace App\Repositories\Eloquent;

use App\Models\Vehicle;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Support\Collection;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface
{

    /**
     * CarRepository constructor.
     *
     * @param Vehicle $model
     */
    public function __construct(Vehicle $model)
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

    public function optionOrderList($request): Collection
    {

        $vehicles = $this->model->all();

        $count = $vehicles->count();

        if ($count >= 2) {

            $percent10Vehicle = round((10 / 100) * $count);
            $percent45Price = round((45 / 100) * $count);
            $percent5Age = round((5 / 100) * $count);
            $percent15Deposit = round((15 / 100) * $count);
            $percent15Km = round((15 / 100) * $count);
            $percent10Vote = round((10 / 100) * $count);

            $vehicle10 = $this->model
                ->filter($request)
                ->orderBy('created_at', 'DESC')
                ->limit($percent10Vehicle);

            $price45 = $this->model
                ->filter($request)
                ->whereNotIn('id', $vehicle10->pluck('id'))
                ->orderBy('price', 'ASC')
                ->limit($percent45Price);

            $age5 = $this->model
                ->filter($request)
                ->whereNotIn('id', $price45->pluck('id'))
                ->orderBy('driver_licence_age', 'ASC')
                ->limit($percent5Age);

            $deposit15 = $this->model
                ->filter($request)
                ->whereNotIn('id', $age5->pluck('id'))
                ->orderBy('deposit', 'ASC')
                ->limit($percent15Deposit);

            $km15 = $this->model
                ->filter($request)
                ->whereNotIn('id', $deposit15->pluck('id'))
                ->orderBy('kilometer', 'ASC')
                ->limit($percent15Km);

            $vote15 = $this->model
                ->filter($request)
                ->whereNotIn('id', $km15->pluck('id'))
                ->orderBy('vote', 'DESC')
                ->limit($percent10Vote);

            return $this->model
                ->with(['gear_type', 'class_group', 'brand', 'fuel_type'])
                ->union($km15)
                ->union($deposit15)
                ->union($age5)
                ->union($price45)
                ->union($vehicle10)
                ->union($vote15)
                ->filter($request)
                ->get();
        }

        return $this->model->filter($request)->get();
    }

    /**
     * @param $request
     * @return Collection
     */
    public function filterAll($request): Collection
    {
        return $this->model->filter($request)->get();
    }

    public function update(int $id, array $attributes)
    {
        $vehicle = $this->model->find($id);
        $vehicle->update($attributes);
    }

    public function delete($id): ?bool
    {
        return $this->model->destroy($id);
    }

    public function factory()
    {
        return $this->model->factory();
    }

}
