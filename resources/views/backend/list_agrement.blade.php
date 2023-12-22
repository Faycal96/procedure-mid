@extends('backend.layout.base')
@section('title')
<div class="pagetitle">
    <h1>Liste des arrêté d'agréments </h1>
    {{-- <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Liste</a></li>
            <li class="breadcrumb-item active">plaintes</li>
        </ol>
    </nav> --}}
</div><!-- End Page Title -->
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                                <li><a class="dropdown-item" href="#">Mois Courant</a></li>
                                <li><a class="dropdown-item" href="#">Cette Année</a></li>
                            </ul>
                        </div>


                        <h5 class="card-title">Liste des arrêtés d'agréments   <span>| Agréments</span></h5>

                        <div class="card-body">
                            <p> @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="alert-heading">{{session('success')}}</h4>

                            </div>

                            <script>
                                setTimeout(function() {
                                        document.querySelector('.alert.alert-success').style.display = 'none';
                                    }, 3000);
                            </script>
                            @endif</p>
                            <div class="row">
                                <div class="col-9">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dt-buttons btn-group flex-wrap">

                                            <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button"><span>CSV</span></button>
                                            <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button"><span>Excel</span></button>
                                            <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button"><span>PDF</span></button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example1" type="button"><span>Imprimer</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">

                                    <div style="float: right">
                                        <button style="float: right " data-bs-toggle="modal" data-bs-target="#createModal"
                                            type="button" class="btn btn-success"><i class="bi bi-plus"></i></button>

                                        {{-- Modal de creation --}}
                                        <div class="modal fade" id="createModal" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ajouter un arrêté d'agrément</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="{{ route('agrement-store') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title">Date</h5>
                                                                    <div class="input-group mb-3">
                                                                        <input type="date" name="Annee"
                                                                            class="form-control border-success"
                                                                            placeholder="Année" aria-label="Année"
                                                                            aria-describedby="basic-addon1" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <h5 class="card-title">Libellé</h5>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" name="libelle"
                                                                            class="form-control border-success"
                                                                            placeholder="Titre de l'agrément" aria-label="Libellé"
                                                                            aria-describedby="basic-addon1" required>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h5 class="card-title">Fichier</h5>
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" name="chemin"
                                                                            class="form-control border-success"
                                                                            placeholder="Document de l'arrêté" aria-label="Fichier"
                                                                            aria-describedby="basic-addon1" required>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Valider</button>

                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div><!-- End Large Modal-->
                                    </div>
                                </div>
                            </div><br>


                            <!-- Table with stripped rows -->
                            <table class="table datatable table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Année</th>
                                        <th scope="col">Libellé</th>
                                        <th scope="col">Fichiers</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                
                                @php
                                    $i = 1;
                                @endphp

                                
                                <tbody>
                                    @foreach ($objectList as $object)

                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{  $object->Annee }}</td>
                                            <td>{{ $object->libelle }}</td>
                                            <td> <a href="{{ Storage::url($object->chemin) }}">Télécharger</a> </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#signer{{ $object->uuid}}"
                                                    type="button" title="Modifier un arrêté d'agrément" class="btn btn-success"><i
                                                    class="bi bi-pencil-square"></i> </a>

                                                <button type="button" title="Supprimer" class="btn btn-danger"><i
                                                    class="bi bi-x-circle"></i></button>

                                                 {{-- Model modifier etat de l'arrêté d'agrément --}}
                                            <div class="modal fade" id="signer{{ $object->uuid}}"
                                                data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bgcustom-gradient-light">
                                                        <div class="modal-header">
                                                            <img src="{{ asset('backend/assets/img/valide.png') }}" 
                                                                width="60" height="45" class="d-inline-block align-top"
                                                                alt="">
                                                            <h5 class="modal-title m-auto"> Modifier l'arrêté d'agrément </h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="btn-close"> </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" 
                                                                action="{{ route('agrement-update', ['uuid' =>$object->uuid]) }}">
                                                                @method('PUT')
                                                                @csrf

                                                                <div class="form-group">
                                                                    <div class="text-center">
                                                                        <label class="col-form-label">Année</label> <br />
                                                                        <input type="date" name="Annee" id="Annee" value="{{ $object->Annee }}">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <label class="col-form-label">Libellé</label> <br />
                                                                        <input type="text" name="libelle" id="libelle" value="{{ $object->libelle }}">
                                                                        </textarea>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <label class="col-form-label">Fichier</label> <br />
                                                                        <input type="file" name="chemin" id="chemin">

                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning"
                                                                        data-dismiss="modal">Non, Annuler</button>
                                                                    <button type="submit" class="btn btn-success">Oui, Modifier</button>
                                                                </div>
                                                                
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal Modifier plainte -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
        </div><!-- End Left side columns -->



    </div>
</section>
@endsection
