@extends('backend.layout.base')
@section('title')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">{{ $procedureName }}</li>
                {{-- <li class="" style="margin-left: auto">
        <a href="#">Paramétres des sessions
          <i class="bi bi-clock" @style("font-size: 48px;") title="Paramétres des sessions"></i>
        </a>
      </li> --}}
                @if ($procedure->estperiodique)
                    <li class="" style="margin-left: auto">
                        <button title="Editer" type="button" class="btn btn-info " data-bs-toggle="modal"
                            data-bs-target="#sessionModalEdit">
                            <i class="bi bi-clock"></i> Paramétres des sessions</button>
                    </li>
                @endif
            </ol>
        </nav>
        <p>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">{{ session('success') }}</h4>

                </div>

                <script>
                    setTimeout(function() {
                        document.querySelector('.alert.alert-success').style.display = 'none';
                    }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
                </script>
            @endif
        </p>
    </div><!-- End Page Title -->
@endsection

@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>déposées</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeDeposee }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>Validées</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeValider }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>Signées</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-circle"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeSigne }}</h6>
                                        {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>rejettées</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-trash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeRejeter }}</h6>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Customers Card -->

                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>Attente de Complement de Dossiers</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder-x"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeComplement }}</h6>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>En Etudes</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-folder2-open"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeEtude }}</h6>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-xxl-3 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Demandes <span>| <b>Archivées</b></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-server"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $demandeArchive }}</h6>
                                        {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Customers Card -->




                </div>
            </div><!-- End Left side columns -->

        </div>

        {{-- editer modal --}}
        <div class="modal fade" id="sessionModalEdit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 800px">
                    <div class="modal-header">
                        <h5 class="modal-title">Editer la Session </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('procedure-session-update', $procedure->uuid) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">Date début</h5>
                                    <div class="input-group mb-3">

                                        {{-- <label for="libelle">Libelle</label> --}}

                                        <input type="date" name="session_debut" class="form-control border-success"
                                            min="{{ date('Y-m-d', strtotime(now())) }}"
                                            value="{{ $procedure->session_debut ? date('Y-m-d', strtotime($procedure->session_debut)) : '' }}"
                                            aria-describedby="basic-addon1" required>

                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="card-title">Date fin</h5>
                                    <div class="input-group mb-3">

                                        {{-- <label for="libelle">Libelle</label> --}}

                                        <input type="date" name="session_fin" class="form-control border-success"
                                            value="{{ $procedure->session_fin ? date('Y-m-d', strtotime($procedure->session_fin)) : '' }}"
                                            aria-describedby="basic-addon1" required>

                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Modifier
                                </button>
                            </div>



                        </div>
                    </form>

                </div>
            </div>
        </div><!-- End Basic Modal-->
    </section>
@endsection

@section('script')
    <script></script>
@endsection
