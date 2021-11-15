<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\ClassGroupRepositoryInterface;
use App\Repositories\FuelTypeRepositoryInterface;
use App\Repositories\GearTypeRepositoryInterface;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    private VehicleRepositoryInterface $vehicleRepository;
    private FuelTypeRepositoryInterface $fuelTypeRepository;
    private BrandRepositoryInterface $brandRepository;
    private ClassGroupRepositoryInterface $classGroupRepository;
    private GearTypeRepositoryInterface $gearTypeRepository;

    public function __construct(
        VehicleRepositoryInterface    $vehicleRepository,
        FuelTypeRepositoryInterface   $fuelTypeRepository,
        BrandRepositoryInterface      $brandRepository,
        ClassGroupRepositoryInterface $classGroupRepository,
        GearTypeRepositoryInterface   $gearTypeRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
        $this->fuelTypeRepository = $fuelTypeRepository;
        $this->brandRepository = $brandRepository;
        $this->classGroupRepository = $classGroupRepository;
        $this->gearTypeRepository = $gearTypeRepository;
    }

    /**
     * @throws BindingResolutionException
     */
    public function index(Request $request)
    {
        //Repositories
        $fuel_types = $this->fuelTypeRepository->all();
        $brands = $this->brandRepository->all();
        $class_groups = $this->classGroupRepository->all();
        $gear_types = $this->gearTypeRepository->all();

        //Filter options
        $vehicles = $this->vehicleRepository->optionOrderList($request);

        //Load relation options
        $vehicles->load('fuel_type', 'gear_type', 'class_group', 'brand');

        return view('frontend.vehicle.index',
            compact(
                'fuel_types',
                'brands',
                'class_groups',
                'gear_types',
                'vehicles'
            ));
    }

    /**
     * @throws BindingResolutionException
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->find($id);
        $vehicle->load('brand', 'gear_type', 'fuel_type', 'class_group');

        return view('frontend.vehicle.show', compact('vehicle'));
    }

}
