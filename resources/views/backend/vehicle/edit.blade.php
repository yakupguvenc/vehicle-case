@extends('layouts.app')
@section('content')
    <section class="main-section" id="main-section">
        <nav id="nav-breadcrumb" aria-label="breadcrumb">
            <div class="container">
            </div>
        </nav>

        <div class="container">

            <div class="row mt-3">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title pb-2 mb-3" style="border-bottom: 1px solid #efefef;">Araç Düzenle</h5>

                            <form method="post" action="{{ route('backend.vehicles.update',$vehicle) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="brand">Marka</label>
                                            <select
                                                class="form-control form-control-lg @error('brand_id') is-invalid @enderror"
                                                id="brand" name="brand_id">
                                                <option value="">Seçim yapın</option>
                                                @foreach($brands as $brand)
                                                    <option @if($vehicle->brand_id == $brand->id) selected @endif
                                                    value="{{$brand->id}}">{{$brand->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('brand_id')}}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="class_group_id">Sınıf Grubu</label>
                                            <select
                                                class="form-control form-control-lg @error('class_group_id') is-invalid @enderror"
                                                id="class_group_id" name="class_group_id">
                                                <option value="">Seçim yapın</option>
                                                @foreach($class_groups as $group)
                                                    <option @if($vehicle->class_group_id == $group->id) selected @endif
                                                    value="{{$group->id}}">{{$group->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('class_group_id')}}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="driver_licence_age">Ehliyet Yaşı</label>
                                            <input type="text"
                                                   class="form-control form-control-lg @error('driver_licence_age') is-invalid @enderror "
                                                   id="driver_licence_age" name="driver_licence_age"
                                                   placeholder="Ehliyet Yaşı" value="{{$vehicle->driver_licence_age}}">
                                            <div class="invalid-feedback">
                                                {{$errors->first('driver_licence_age')}}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kilometer">Kilometre</label>
                                            <input type="text"
                                                   class="form-control form-control-lg @error('kilometer') is-invalid @enderror "
                                                   id="kilometer" name="kilometer"
                                                   placeholder="50000" value="{{$vehicle->kilometer}}">
                                            <div class="invalid-feedback">
                                                {{$errors->first('kilometer')}}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price">Fiyat</label>
                                            <input type="text"
                                                   class="form-control form-control-lg @error('price') is-invalid @enderror "
                                                   id="price" name="price"
                                                   placeholder="10.000" value="{{$vehicle->price}}">
                                            <div class="invalid-feedback">
                                                {{$errors->first('price')}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="fuel_type_id">Yakıt Tipi</label>
                                            <select
                                                class="form-control form-control-lg @error('fuel_type_id') is-invalid @enderror"
                                                id="fuel_type_id"
                                                name="fuel_type_id">
                                                <option value="">Seçim yapın</option>
                                                @foreach($fuel_types as $fuel_type)
                                                    <option @if($vehicle->fuel_type_id == $fuel_type->id) selected
                                                            @endif
                                                            value="{{$fuel_type->id}}">{{$fuel_type->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('fuel_type_id')}}

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gear_type_id">Vites Tipi</label>
                                            <select
                                                class="form-control form-control-lg @error('gear_type_id') is-invalid @enderror"
                                                id="gear_type_id"
                                                name="gear_type_id">
                                                <option value="">Seçim yapın</option>
                                                @foreach($gear_types as $gear_type)
                                                    <option @if($vehicle->gear_type_id == $gear_type->id) selected
                                                            @endif
                                                            value="{{$gear_type->id}}">{{$gear_type->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('gear_type_id')}}

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="vote">Puan</label>
                                            <select
                                                class="form-control form-control-lg @error('vote') is-invalid @enderror"
                                                id="vote"
                                                name="vote">
                                                <option value="">Seçim yapın</option>
                                                @foreach([1,2,3,4,5,6,7,8,9,10] as $vote)
                                                    <option @if($vehicle->vote == $vote) selected @endif
                                                    value="{{$vote}}">{{$vote}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{$errors->first('vote')}}

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deposit">Depozito</label>
                                            <input type="text"
                                                   class="form-control form-control-lg @error('deposit') is-invalid @enderror "
                                                   id="deposit" name="deposit"
                                                   placeholder="5.000" value="{{$vehicle->deposit}}">
                                            <div class="invalid-feedback">
                                                {{$errors->first('deposit')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('backend.vehicles.index') }}" class="btn btn-default btn-lg">
                                        <i class="fal fa-undo-alt"></i> Vazgeç
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg ms-2">
                                        <i class="fal fa-paper-plane"></i> Güncelle
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
