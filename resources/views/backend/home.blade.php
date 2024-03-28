@extends('backend.layout.base')
@section('title')
    <div class="pagetitle">
        <h1>Statistiques</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Statistiques</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <section class="section dashboard">

        @if (Auth::user()->agent->service->libelle_court == 'LNBTP' || Auth::user()->role->libelle == 'Administration')
            <h3> - Etude de sols et fondation  </h3>
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                            {{-- agrement eau --}}
                            <div class="col-xxl-3 col-xl-12">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'Toutes']) }}">Etude de sols et fondation</a>
                                            <span>| <b>Total</b></span>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbEtudeSol }}</h6> 
                                                {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Customers Card -->

                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'D']) }}">Etude de sols et fondation </a>
                                            <span>| <b>En attente</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbEtudeSolEnAttente }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'V']) }}"> Etude de sols et fondation </a>
                                            <span>| <b>Validés</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbEtudeSolValider }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            {{-- agrement eau --}}
                            <div class="col-xxl-3 col-xl-12">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'R']) }}">Etude de sols et fondations</a>
                                            <span>| <b>Rejettés</b></span>
                                        </h5>
        
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbEtudeSolRejette }}</h6> 
                                                {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- End Customers Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        @endif
        <br>
        @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
            <div class="row">
                <h3> - Agrement technique </h3>
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'Toutes']) }}">Agrement technique </a>
                                            <span>| <b>Total</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbAgrementTechnique }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'D']) }}">Agrement technique </a>
                                            <span>| <b>En attente</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbAgrementTechniqueEnAttente }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'V']) }}">Agrement technique</a>
                                            <span>| <b>Validés</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbAgrementTechniqueValider }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            {{-- agrement eau --}}
                            <div class="col-xxl-3 col-xl-12">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                            href="{{ route('demandes-list', ['procedure' => 'R']) }}">Agrement technique</a>
                                            <span>| <b> Rejettés</b></span>
                                        </h5>
        
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $nbAgrementTechniqueRejette }}</h6> 
                                                {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- End Customers Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        <br>
            <h3> - Agrément par categorie </h3>
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="#">Categorie Agrement</a>
                                            <span>| <b>TH</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                            

                                            
                                                <h6>{{ $countTH}}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="#">Categorie Agrement</a>
                                            <span>| <b>TR1</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $countTR1 }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="#">Categorie Agrement</a>
                                            <span>| <b>TR2</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $countTR2 }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <!-- Revenue Card produit chimique -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="#">Categorie Agrement</a>
                                            <span>| <b>TR3</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $countTR3 }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title"><a
                                                href="#">Categorie Agrement</a>
                                            <span>| <b>EC</b></span>
                                        </h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-folder"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $countEC }}</h6>
                                                {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        @endif 
    </section>
@endsection

@section('script')
@endsection
