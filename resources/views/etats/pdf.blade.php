<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>html invoice email template - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 40px 30px !important;
			position: relative;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>

<body>
    
    <div class="col-md-12">   
        <div class="row">
               
               <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3 form-card">
                   <div class="row">
                       <div class="receipt-header">
                       </div>
                   </div>
                   
                   <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @if($demande->procedure->code == 'P001')
                                    <th colspan="2" style="text-align: center">IDENTITE DU DEMANDEUR</th>
                                @else
                                    <th colspan="2" style="text-align: center">FICHE DE RENSEIGNEMENT ADMINISTRATIF</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="col-md-12" style="background-color: #9f181c; color: #fff;text-align: center"><p>{{$demande->reference}}</td>
                            </tr>
                            
                            @if($demande->procedure->code == 'P002')
                                 <tr>
                                     <td class="col-md-9"><strong>Entreprise</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->raison_social }}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Email</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i>{{$demande->email_entreprise}}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Téléphone</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i>
                                        @if (!empty($demande->numero_telephone))
                                        {{ $demande->numero_telephone }}
                                        @endif
                                        @if (!empty($demande->tel_1))
                                            {{ $demande->tel_1 }}
                                        @endif
                                        @if (!empty($demande->tel_2))
                                            {{ $demande->tel_2 }}
                                        @endif
                                     </td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Boite Postale</td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i>{{ $demande->boite_postale }}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Adresse Postale</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->adresse_physique }}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Siege social</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i>{{ $demande->siege_social }}</td>
                                 </tr>
                            @else
                                 <tr>
                                     <td class="col-md-9"><strong>démandeur</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->usager->nom }} {{ $demande->usager->prenom }}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Email</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->email }}</td>
                                 </tr>
                                 <tr>
                                     <td class="col-md-9"><strong>Téléphone</strong></td>
                                     <td class="col-md-3"><i class="fa fa-inr"></i>
                                        @if (!empty($demande->numero_telephone))
                                        {{ $demande->numero_telephone }}
                                        @endif
                                        @if (!empty($demande->tel_1))
                                            {{ $demande->tel_1 }}
                                        @endif
                                        @if (!empty($demande->tel_2))
                                            {{ $demande->tel_2 }}
                                        @endif
                                     </td>
                                 </tr>
                                 <tr>
                                    <td class="col-md-9"><strong>Province</strong></td>
                                    <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->localite->provinces->libelle }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-9"><strong>Commune</strong></td>
                                    <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->localite->libelle }}</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div><br><br><br><br>
                   
                   <div class="row">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th colspan="2" style="text-align: center">AUTRES</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td class="col-md-9"><strong>Date de dépot</strong></td>
                                   <td class="col-md-3"><i class="fa fa-inr"></i> {{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/y') }}</td>
                               </tr>
                               @if($demande->procedure->code == 'P002')
                                    <tr>
                                        <td class="col-md-9"><strong>Objectif de la demande</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->objectif_demande }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-12" colspan="2" style="text-align: center"><b>
                                            Représentant de l'entreprise</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Nom du representant</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->nom_representant }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Prenom du representant</td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i>{{ $demande->prenom_representant }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Fonction du representant</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->fonction_representant }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Adresse du representant</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i>{{ $demande->adresse_representant }}</td>
                                    </tr>
                               @else
                                    <tr>
                                        <td class="col-md-9"><strong>Type de construction</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->typeConstruction->libelle }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Sous sol ?</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i>
                                             {{ $demande->demandeP001->is_underground == 0 ? "Non" : "Oui" }}
                                            </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Superficie</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->superficie}} m²</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Secteur</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->secteur}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Zone</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->zone}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Section</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->section}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Lot</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->lot}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Parcelle</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->numero_parcelle}}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-9"><strong>Usage construction</strong></td>
                                        <td class="col-md-3"><i class="fa fa-inr"></i> {{ $demande->demandeP001->usageConstruction->libelle}} {{ $demande->autre_usage_construction}}</td>
                                    </tr>
                               @endif
                               
                           </tbody>
                       </table>
                   </div>
                   
               </div>    
           </div>
       </div>
      </div>
    
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>