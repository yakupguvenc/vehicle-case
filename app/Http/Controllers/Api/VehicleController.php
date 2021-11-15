<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class VehicleController extends Controller
{
    private VehicleRepositoryInterface $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }


    public function index(): Collection
    {
        $vehicles = $this->vehicleRepository->all();

        $vehicles->load(['gear_type', 'class_group', 'brand', 'fuel_type']);

        return $vehicles;
    }

    /**
     * @throws BindingResolutionException
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (!$vehicle) {
            return response()->json(['status' => 'error', 'message' => 'Kayıt mevcut değil']);
        }

        return $vehicle;
    }
}
