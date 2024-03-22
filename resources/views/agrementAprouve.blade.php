@extends('layouts/layoutW')
@section('faq')

<div class="container-fluid">
    <br />
    <h2>Liste des agréments approuvés</h2> <br />
    <table>
</div>

<table id="example1" class="table datatable table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Année</th>
            <th scope="col">Libellé</th>
            <th scope="col">Fichier</th>
        </tr>
    </thead>

    <body>
        @php
          $i = 1;
        @endphp

        @foreach ($listeAgrement as $agrement)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td> {{ $agrement->Annee }} </td>
                <td> {{ $agrement->libelle }} </td>
                <td> <a href="{{ Storage::url($agrement->chemin) }}" class="bi bi-file-earmark-pdf" style="color:blue;"> Télécharger </a> </td>
            </tr>
      @endforeach
    </body>
</table>

<br />
<br />
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
