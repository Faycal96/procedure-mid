@extends('layouts/layoutW')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('contact')
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


                    


                    <div class="card-body">

                        <h3 class="card-title" >Liste de mes plaintes</h3>

                        <a class="btn btn-outline-secondary" href="{{ route('plainte.form') }}" style="width:200px;" title="Déposez une nouvelle plainte">Nouvelle plainte</a> 

                        <br />
                        <br />
                   
                         <!--
                        <p> @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="alert-heading">{{session('success')}}</h4>
                        </div>
                    --> 

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
                        <table class="table datatable table-bordered table-striped" id="example1">
                            <!--
                            <label>Filtrer les plaintes par procédure</label>
                            <select name="procedure" id="procedure" class="form-select border-success" onchange="changeTypePlainte()">
                            <option class="mb-3" value="Toutes">Toutes les plaintes</option>
                                @foreach($procedures as $proc)
                                    <option class="mb-3" {{($selectedProcedure == $proc->libelle_court ? 'selected': '')}} value="{{$proc->libelle_court}}">{{$proc->libelle_long}}</option>
                                @endforeach
                            </select><br><br>
                        -->

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date plainte</th>
                                    <th scope="col">Objet</th>
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
                                        <td>{{ \Carbon\Carbon::parse($plainte->created_at)->format('d/m/Y') }}</td>
                                        <td>{{  $plainte->subject }}</td>
                                        <td>{{ $plainte->procedure }}</td>
                                        <td><span class="badge {{ $statutColor }} "> @if($plainte->etat == "") nouveau @else {{ $plainte->etat }} @endif</span> </td>
                                        <td>
                                            <button title="Voir détail de la plainte" type="button" class="btn btn-primary" 
                                                data-bs-toggle="modal" data-bs-target="#largeModal{{ $plainte->uuid }}">
                                                <i class="bi bi-eye"></i> 
                                            </button>

                                            <!--
                                            <a data-toggle="modal" data-target="#signer{{ $plainte->uuid}}"
                                                type="button" title="Modifier l'etat de la plainte" class="btn btn-success"><i
                                                    class="bi bi-pencil-square"></i> </a>
                                            -->



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
                                                                    <b>Etat actuel de la plainte :</b>
                                                                    <span class="text-success">{{ $plainte->etat}}</span>
                                                                </div>
                                                            </div><br>



                                                            <div class="row"> 
                                                                <div class="col-6">
                                                                    <b>Identité du plaignant : </b>
                                                                    <span class="text-success"> {{ $plainte->usager->nom.' '.$plainte->usager->prenom}} </span>
                                                                </div>

                                                                <div class="col-6">
                                                                    <b>Téléphone du plaignant : </b>
                                                                    <span class="text-success">{{ $plainte->usager->telephone }}</span>
                                                                </div>

                                                            </div><br>


                                                            <div class="row">   
                                                                
                                                                <div class="col-6">
                                                                    <b>Procédure :</b>
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
                                                                    <b>Dernière modification </b> <br />
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

                        <br />
                        <br />

                    </div>

                </div>
            </div><!-- End Recent Sales -->

        </div>
    </div><!-- End Left side columns -->

</div>








<script>

    $(function() {
            $(document).ready(function() {
                $('#example1').DataTable({
  
                    dom: 'Blfrtip',
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "lengthMenu": [
                        [5, 10, 50, -1],
                        ["5", "10", "50", "All"]
                    ],
  
  
                    buttons: [{
                            extend: 'csv',
                            text: 'CSV',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'print',
                            text: 'Imprimer',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                    ],
                    select: true,
                    "pagingType": "full_numbers",
                    language: {
                        search: "Rechercher&nbsp;:",
                        lengthMenu: " _MENU_ ",
                        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                        infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                        infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                        infoPostFix: "",
                        loadingRecords: "Chargement en cours...",
                        zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                        emptyTable: "Aucune donnée disponible dans le tableau",
                        paginate: {
                            first: "Premier",
                            previous: "Pr&eacute;c&eacute;dent",
                            next: "Suivant",
                            last: "Dernier"
                        },
                        aria: {
                            sortAscending: ": activer pour trier la colonne par ordre croissant",
                            sortDescending: ": activer pour trier la colonne par ordre décroissant"
                        }
                    }
                });
            });
  
        });
  
  
  </script>
  
@endsection