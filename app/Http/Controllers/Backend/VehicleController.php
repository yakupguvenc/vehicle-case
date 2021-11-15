<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleStoreAndUpdateRequest;
use App\Repositories\BrandRepositoryInterface;
use App\Repositories\ClassGroupRepositoryInterface;
use App\Repositories\FuelTypeRepositoryInterface;
use App\Repositories\GearTypeRepositoryInterface;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class VehicleController extends Controller
{
    private VehicleRepositoryInterface $vehicleRepository;
    private FuelTypeRepositoryInterface $fuelTypeRepository;
    private BrandRepositoryInterface $brandRepository;
    private ClassGroupRepositoryInterface $classGroupRepository;
    private GearTypeRepositoryInterface $gearTypeRepository;
    private Collection $fuelTypes;
    private Collection $brands;
    private Collection $classGroups;
    private Collection $gearTypes;

    public function __construct(
        VehicleRepositoryInterface    $vehicleRepository,
        FuelTypeRepositoryInterface   $fuelTypeRepository,
        BrandRepositoryInterface      $brandRepository,
        ClassGroupRepositoryInterface $classGroupRepository,
        GearTypeRepositoryInterface   $gearTypeRepository)
    {

        //Repositories
        $this->vehicleRepository = $vehicleRepository;
        $this->fuelTypeRepository = $fuelTypeRepository;
        $this->brandRepository = $brandRepository;
        $this->classGroupRepository = $classGroupRepository;
        $this->gearTypeRepository = $gearTypeRepository;

        //Options
        $this->fuelTypes = $this->fuelTypeRepository->all();
        $this->brands = $this->brandRepository->all();
        $this->classGroups = $this->classGroupRepository->all();
        $this->gearTypes = $this->gearTypeRepository->all();


    }

    /**
     * @throws BindingResolutionException
     */
    public function index()
    {
        $vehicles = $this->vehicleRepository->all();

        return view('backend.vehicle.index', compact('vehicles'));
    }

    /**
     * @throws BindingResolutionException
     */
    public function create()
    {
        $fuel_types = $this->fuelTypes;
        $brands = $this->brands;
        $class_groups = $this->classGroups;
        $gear_types = $this->gearTypes;

        return view('backend.vehicle.create',
            compact(
                'fuel_types',
                'brands',
                'class_groups',
                'gear_types',
            ));

    }

    public function store(VehicleStoreAndUpdateRequest $request): RedirectResponse
    {
        $this->vehicleRepository->create($request->except('_token'));

        return redirect()->route('backend.vehicles.index')->with('success', 'Araç kayıtlar arasına başarıyla eklendi');
    }

    /**
     * @throws BindingResolutionException
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->find($id);

        if (!$vehicle) return redirect()->back();

        $fuel_types = $this->fuelTypes;
        $brands = $this->brands;
        $class_groups = $this->classGroups;
        $gear_types = $this->gearTypes;

        return view('backend.vehicle.edit',
            compact(
                'fuel_types',
                'brands',
                'class_groups',
                'gear_types',
                'vehicle'
            ));

    }

    public function update($id, VehicleStoreAndUpdateRequest $request): RedirectResponse
    {

        $vehicle = $this->vehicleRepository->find($id);

        if (!$vehicle) return redirect()->back();

        $this->vehicleRepository->update($id, $request->except(['_token', '_put']));

        return redirect()->route('backend.vehicles.index')->with('success', 'Araç bilgileri başarıyla güncellendi');
    }

    public function destroy($id): RedirectResponse
    {
        $this->vehicleRepository->delete($id);

        return redirect()->route('backend.vehicles.index')->with('success', 'Araç kayıtlardan başarıyla silindi');
    }


}
