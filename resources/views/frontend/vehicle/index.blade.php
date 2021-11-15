@extends('layouts.app')
@section('content')
    <section class="main-section" id="main-section">
        <nav id="nav-breadcrumb" aria-label="breadcrumb">
            <div class="container">
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Araçlar</h4>
                            <p class="text-black-50">
                                Araçları filtreleyerek size uygun aracı seçebilirsiniz.
                            </p>
                            <div class="my-3 p-3" style="border: 1px solid #efefef; border-radius: 4px">
                                <form method="GET" action="{{route('frontend.vehicles')}}">
                                    <div class="row row-cols-lg-auto g-3 align-items-center">
                                        <div class="col-12">
                                            <label for="brand_id">Marka</label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                <option value="">Seçim yapın</option>
                                                @foreach($brands as $brand)
                                                    <option value='{{$brand->id}}'
                                                            @if(($_GET['brand_id'] ?? null) == $brand->id) selected @endif >
                                                        {{$brand->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="class_group_id">Sınıf Tipi</label>
                                            <select name="class_group_id" id="class_group_id" class="form-control">
                                                <option value="">Seçim yapın</option>
                                                @foreach($class_groups as $group)
                                                    <option value='{{$group->id}}'
                                                            @if(($_GET['class_group_id'] ?? null) == $group->id) selected @endif
                                                    >{{$group->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="gear_type_id">Vites Tipi</label>
                                            <select name="gear_type_id" id="gear_type_id" class="form-control">
                                                <option value="">Seçim yapın</option>
                                                @foreach($gear_types as $gear_type)
                                                    <option value='{{$gear_type->id}}'
                                                            @if(($_GET['gear_type_id'] ?? null) == $gear_type->id) selected @endif
                                                    >{{$gear_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="fuel_type_id">Yakıt Tipi</label>
                                            <select name="fuel_type_id" id="fuel_type_id" class="form-control">
                                                <option value="">Seçim yapın</option>
                                                @foreach($fuel_types as $fuel_type)
                                                    <option value='{{$fuel_type->id}}'
                                                            @if(($_GET['fuel_type_id'] ?? null) == $fuel_type->id) selected @endif
                                                    >{{$fuel_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 text-end text-lg-start" style="margin-top: 35px">
                                            <button type="submit" class="btn btn-primary">Filtrele</button>
                                            <button onClick="document.getElementById('clearForm').submit()"
                                                    type="button"
                                                    class="btn btn-warning">Temizle
                                            </button>

                                        </div>
                                    </div>
                                </form>
                                <form method="GET" id="clearForm" action="{{route('frontend.vehicles')}}">
                                    <input name="brand_id" class="d-none">
                                    <input name="class_group_id" class="d-none">
                                    <input name="fuel_type_id" class="d-none">
                                    <input name="gear_type_id" class="d-none">
                                    <button type="submit" class="d-none"></button>
                                </form>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Marka</th>
                                    <th scope="col" class="text-end" style="width: 140px;">Kilometre</th>
                                    <th scope="col" class="text-end" style="width: 140px;">Sınıf</th>
                                    <th scope="col" class="text-end" style="width: 200px;">Fiyat</th>
                                    <th scope="col" class="text-center" style="width: 100px;">Puan</th>
                                    <th scope="col" class="text-center" style="width: 50px;">İncele</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($vehicles as $vehicle)
                                    <tr>
                                        <td style="vertical-align: middle">{{$vehicle->brand->name}}</td>
                                        <td class="text-end"
                                            style="vertical-align: middle">{{$vehicle->kilometer}} KM</td>
                                        <td class="text-end"
                                            style="vertical-align: middle">{{$vehicle->class_group->name}}</td>
                                        <td class="text-end"
                                            style="vertical-align: middle">{{number_format($vehicle->price,'2',',','.') }}  ₺
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <div
                                                class="badge mb-0 text-center @if($vehicle->vote <= 3) bg-danger @elseif($vehicle->vote >= 7) bg-success @else bg-warning @endif">
                                                {{$vehicle->vote}}
                                            </div>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;width:250px">
                                            <a href="{{route('frontend.vehicles.show',$vehicle)}}"
                                               class="btn btn-outline-primary btn-sm ">
                                                <i class="fad fa-eye"></i> Detay
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aradığınız değerler karşılığında araç bulunamadı.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
