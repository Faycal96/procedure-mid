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

            <h3> - Agrement technique </h3>
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique </a>
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
                    @endif 



                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                    <!-- Revenue Card produit chimique -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique </a>
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
                @endif


                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique</a>
                                        <span>| <b>Complément</b></span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $nbAgrementTechniqueEnComplement }}</h6>
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
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Agrement technique</a>
                                    <span>| <b> En cours d'étude</b></span>
                                </h5>
 
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $nbAgrementTechniqueEnEtude }}</h6> 
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



        <div class="col-lg-12">
            <div class="row">

                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                    <!-- Revenue Card produit chimique -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique </a>
                                    <span>| <b>Réjetée</b></span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $nbAgrementTechniqueRejette }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                @endif 



                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                <!-- Revenue Card produit chimique -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique </a>
                                <span>| <b>En attente(Visa)</b></span>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-folder"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $nbAgrementTechniqueEnAttenteVisa }}</h6>
                                    {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->
            @endif


                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                    <!-- Revenue Card produit chimique -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Agrement technique</a>
                                    <span>| <b>Actes signé</b></span>
                                </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $nbAgrementTechniqueSigner }}</h6>
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
                                    href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Agrement technique</a>
                                <span>| <b> Archivée</b></span>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-folder"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $nbAgrementTechniqueArchiver }}</h6> 
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




        <br />
        <br />







        <h3> - Etude de sols et fondation  </h3>
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    @if (Auth::user()->agent->service->libelle_court == 'LNBTP' || Auth::user()->role->libelle == 'Administration')
                    {{-- agrement eau --}}
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Etude de sols et fondation</a>
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
                @endif




                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                <!-- Revenue Card produit chimique -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Etude de sols et fondation </a>
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
            @endif


                
                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}"> Etude de sols </a>
                                        <span>| <b>Complément</b></span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $nbEtudeSolEnComplement }}</h6>
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
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Etude de sols et fondations</a>
                                    <span>| <b>En étude</b></span>
                                </h5>
 
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $nbEtudeSolEnEtude }}</h6> 
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




        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    @if (Auth::user()->agent->service->libelle_court == 'LNBTP' || Auth::user()->role->libelle == 'Administration')
                    {{-- agrement eau --}}
                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Etude de sols et fondation</a>
                                    <span>| <b>Réjetée</b></span>
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
                @endif




                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                <!-- Revenue Card produit chimique -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Etude de sols et fondation </a>
                                <span>| <b>En attente(Visa)</b></span>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-folder"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $nbEtudeSolEnAttenteVisa }}</h6>
                                    {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->
            @endif


                
                @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}"> Etude de sols</a>
                                        <span>| <b>Actes signé</b></span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $nbEtudeSolSigner }}</h6>
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
                                        href="{{ route('procedure-dashboard', ['procedure' => 'demande_p002_s', 'procedureName' => 'Agrement en Eau']) }}">Etude de sols et fondations</a>
                                    <span>| <b>Archivée</b></span>
                                </h5>
 
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $nbEtudeSolArchiver }}</h6> 
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




        <br />
        <br />





        <h3> - Agrément par categorie </h3>
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
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Categorie Agrement</a>
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
                    @endif

                    
                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Categorie Agrement</a>
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
                    @endif


                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Categorie Agrement</a>
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
                    @endif


                    @if (Auth::user()->agent->service->libelle_court == 'DGESS' || Auth::user()->role->libelle == 'Administration')
                        <!-- Revenue Card produit chimique -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Categorie Agrement</a>
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
                    @endif

                   
                </div>

            </div><!-- End Left side columns -->

        </div>




        

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
                                            href="{{ route('procedure-dashboard', ['procedure' => 'demande_p001_s', 'procedureName' => 'Produit Chimique']) }}">Categorie Agrement</a>
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
                    @endif


                   
                </div>

            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection

@section('script')
@endsection
