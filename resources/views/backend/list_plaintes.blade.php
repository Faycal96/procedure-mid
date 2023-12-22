@extends('backend.layout.base')
@section('title')
<div class="pagetitle">
    <h1>Liste des plaintes </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Liste</a></li>
            <li class="breadcrumb-item active">plaintes</li>
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


                        <h5 class="card-title">Liste des plaintes   <span>| plaintes</span></h5>

                       

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
                                    }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
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
                                            {{-- <div class="btn-group">
                                                <button
                                                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                                    tabindex="0" aria-controls="example1" type="button"
                                                    aria-haspopup="true" aria-expanded="false"><span>Column
                                                        visibility</span></button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">

                                    <div style="float: right">
                                    <button title="Actualiser la Page"   type="button" onclick="refresh()" class="btn btn-success"><i
                                        class="bi bi-arrow-repeat"></i></button>
                                        <button  title="Ajouter" type="button" class="btn btn-success"><i
                                            class="bi bi-plus"></i></button>
                                    </div>
                                </div>
                            </div><br>


                            <!-- Table with stripped rows -->
                            <table class="table datatable table-bordered table-striped">
                                <label>Filtrer les plaintes par procédure</label>
                                <select name="procedure" id="procedure" class="form-select border-success" onchange="changeTypePlainte()">
                                <option class="mb-3" value="Toutes">Toutes les plaintes</option>
                                    @foreach($procedures as $proc)
                                        <option class="mb-3" {{($selectedProcedure == $proc->libelle_court ? 'selected': '')}} value="{{$proc->libelle_court}}">{{$proc->libelle_long}}</option>
                                    @endforeach
                                </select><br><br>

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date plainte</th>
                                        <th scope="col">Plaignant</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Procedure</th>
                                        <th scope="col">Etat</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                
                                @php
                                    $i = 1;
                                @endphp

                                
                                <tbody>
                                    @foreach ($listePlainte as $plainte)
                                    @php

                                        if($plainte->etat== "")		
                                            $statutColor = "bg-primary";
                                        elseif ($plainte->etat== "en cours") 
                                            $statutColor = "bg-warning";
                                        else
                                            $statutColor = "bg-success";
                                        
                                    @endphp

                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $plainte->created_at->format('d/m/Y H:i:s') }}</td>
                                            <td> {{ $plainte->usager->nom.' '.$plainte->usager->prenom}}</td>
                                            <td>{{  $plainte->usager->telephone }}</td>
                                            <td>{{ $plainte->procedure }}</td>
                                            <td><span class="badge {{ $statutColor }} "> @if($plainte->etat == "") nouveau @else {{ $plainte->etat }} @endif</span> </td>
                                            <td>
                                                <button title="Voir détail de la plainte" type="button" class="btn btn-primary" 
                                                    data-bs-toggle="modal" data-bs-target="#largeModal{{ $plainte->uuid }}">
                                                    <i class="bi bi-eye"></i> 
                                                </button>

                                            
                                                <a data-toggle="modal" data-target="#signer{{ $plainte->uuid}}"
                                                    type="button" title="Modifier l'etat de la plainte" class="btn btn-success"><i
                                                        class="bi bi-pencil-square"></i> </a>



                                                {{-- Voir detail Modal --}}
                                                <div class="modal fade" id="largeModal{{ $plainte->uuid }}" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content" style="height: 500px;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Information sur la plainte</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <b>Date de la plainte :</b>
                                                                        <span class="text-success">{{ $plainte->created_at}}</span>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <b>Etat actuelle de la plainte :</b>
                                                                        <span class="text-success">{{ $plainte->etat}}</span>
                                                                    </div>
                                                                </div><br>



                                                                <div class="row"> 
                                                                    <div class="col-6">
                                                                        <b>Identite du plaignant : </b>
                                                                        <span class="text-success"> {{ $plainte->usager->nom.' '.$plainte->usager->prenom}} </span>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <b>Telephone du plaignant : </b>
                                                                        <span class="text-success">{{ $plainte->usager->telephone }}</span>
                                                                    </div>

                                                                </div><br>


                                                                <div class="row">   
                                                                    
                                                                    <div class="col-6">
                                                                        <b>Procedure :</b>
                                                                        <span class="text-success">{{ $plainte->procedure}}</span>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <b>Objet : </b>
                                                                        <span class="text-success">{{ $plainte->subject }}</span>
                                                                    </div>
                                                                </div><br>


                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <b>Message :</b>
                                                                        <span class="text-success">{{ $plainte->message}}</span>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <b>Derniere modification </b> <br />
                                                                        <span class="text-success"> {{ !empty($plainte->user)? $plainte->user->name:""  }} le {{ $plainte->updated_at }}</span>
                                                                    </div>
                                                                </div>
                                                                <br /> 


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                                <!-- <button type="button" class="btn btn-primary">Valider</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Large Modal-->




                                                 {{-- Model modifier etat de la plainte --}}
                                            <div class="modal fade" id="signer{{ $plainte->uuid}}"
                                                data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bgcustom-gradient-light">
                                                        <div class="modal-header">
                                                            <img src="{{ asset('backend/assets/img/valide.png') }}" 
                                                                width="60" height="45" class="d-inline-block align-top"
                                                                alt="">
                                                            <h5 class="modal-title m-auto"> Modifier plainte </h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="btn-close"> </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data" 
                                                            action="{{ route('editPlainte', ['uuid' => $plainte->uuid]) }}"
                                                            >
                                                                @csrf

                                                                <div class="form-group">
                                                                    <div class="text-center">
                                                                        <label class="col-form-label">Modifier l'état de la plainte</label>
                                                                            <select class="form-select" name="etat" required>
                                                                                <option class=""> </option>
                                                                                @if ($plainte->etat == '')
                                                                                    <option value="en cours" @if ($plainte->etat == 'en cours') selected @endif> En cours de traitement</option> 
                                                                                @endif 

                                                                                @if ($plainte->etat == 'en cours')
                                                                                    <option value="fermer" @if ($plainte->etat == 'fermer') selected @endif> Fermer la plainte (traitée)</option> 
                                                                                @endif
                                                                            <select> <br />
                                                                            
                                                                            <label class="col-form-label">Commentaire</label> <br />
                                                                            <textarea class="form-control" name="commentaire"> {{ $plainte->commentaire }}
                                                                            </textarea>
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

@section('script')

<script>
    
    function changeTypePlainte() {
        procedureSelect = document.getElementById("procedure").value;
        let url = "{{ route('listePlainte', ['procedure'=>'procedureSelect']) }}";
        url = url.replace('procedureSelect', procedureSelect);
        // alert(url);
        document.location.href=url;
    }
</script>


@endsection
