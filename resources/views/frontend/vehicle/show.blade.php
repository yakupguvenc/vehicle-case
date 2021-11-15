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
                            <h5 class="card-title pb-2 mb-3" style="border-bottom: 1px solid #efefef;">Araç
                                Bilgileri</h5>
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Marka</label>
                                        <div>{{ $vehicle->brand->name }}</div>
                                    </div>

                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Araç Sınıfı</label>
                                        <div>{{ $vehicle->class_group->name }}</div>
                                    </div>

                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Ehliyet Yaşı</label>
                                        <div>{{ $vehicle->driver_licence_age }}</div>
                                    </div>
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Kilometre
                                        </label>
                                        <div>{{ $vehicle->kilometer}} KM </div>
                                    </div>
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Fiyat</label>
                                        <div>{{ number_format($vehicle->price,'2',',','.') }} ₺</div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Vites Tipi</label>
                                        <div>{{ $vehicle->gear_type->name }}</div>
                                    </div>

                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Yakıt Tipi</label>
                                        <div>{{ $vehicle->fuel_type->name }}</div>
                                    </div>
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Puan</label>
                                        <div>{{ $vehicle->vote }}</div>
                                    </div>
                                    <div class="p-1 mb-1 bg-light text-dark">
                                        <label class="form-label fw-bold">Depozito</label>
                                        <div>{{ number_format($vehicle->deposit,'2',',','.') }} ₺</div>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('frontend.vehicles') }}" class="btn btn-primary btn-lg">
                                    <i class="fal fa-undo-alt"></i> Geri Dön
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
