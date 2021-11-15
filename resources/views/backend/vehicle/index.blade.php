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
                            <h4 class="card-title">Araç Yönetimi
                                <a href="{{route('backend.vehicles.create')}}" class="btn btn-success "
                                   style="float:right"><i class="fa fa-plus"></i> Yeni
                                    Araç
                                </a>
                            </h4>
                            <p class="text-black-50">
                                Araç yönetim işlemleri
                            </p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Başarılı!</strong> {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Marka</th>
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
                                            style="vertical-align: middle">{{$vehicle->class_group->name}}</td>
                                        <td class="text-end"
                                            style="vertical-align: middle">{{number_format($vehicle->price,'2',',','.') }}
                                            ₺
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <div
                                                class="badge mb-0 text-center @if($vehicle->vote <= 3) bg-danger @elseif($vehicle->vote >= 7) bg-success @else bg-warning @endif">
                                                {{$vehicle->vote}}
                                            </div>
                                        </td>

                                        <td class="text-center" style="vertical-align: middle;width:250px">
                                            <a href="{{route('backend.vehicles.edit',$vehicle)}}"
                                               class="btn btn-outline-primary btn-sm ">
                                                <i class="fad fa-edit"></i> Düzenle
                                            </a>

                                            <form method="POST" class="d-inline"
                                                  action="{{route('backend.vehicles.destroy',$vehicle)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-outline-danger btn-sm ">
                                                    <i class="fad fa-trash"></i> Sil
                                                </button>
                                            </form>
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
