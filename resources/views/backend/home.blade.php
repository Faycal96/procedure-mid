@extends('backend.layout.base')
@section('title')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">



                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Procédure</a>
                                        <span>| <b>Agrement technique</b></span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $nbreAgrement }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                    @endif

                    @if (Auth::user()->agent->service->libelle_court == 'LNBTP' || Auth::user()->role->libelle == 'Administration')
                        {{-- agrement eau --}}
                        <div class="col-xxl-3 col-xl-12">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Procédure</a>
                                        <span>| <b>Etude de sols et fondations</b></span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $nbreEtudeSol }}</h6>
                                            {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Customers Card -->
                    @endif


                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection

@section('script')
@endsection
