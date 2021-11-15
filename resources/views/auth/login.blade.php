@extends('layouts.app')
@section('content')
    <section class="main-section" id="main-section">
        <nav id="nav-breadcrumb" aria-label="breadcrumb">
            <div class="container">
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">Giriş</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email">E-posta</label>
                                    <input type="email" class="form-control form-control-lg" name="email"
                                           id="email"
                                           value="admin@otokirala.com">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Parola</label>
                                    <input type="password" class="form-control form-control-lg" name="password"
                                           id="password" value="password">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg btn-outline-secondary"><i
                                            class="fal fa-sign-in"></i> Giriş Yap
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
