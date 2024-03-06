 <style>
     h1,
     p {
         text-align: center;
         margin-top: 20px;
     }

     .box {
         text-align: center;
         margin: 20px;

     }
 </style>
 <section id="about" class="about">
     @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
     @endif

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

     <div class="container-fluid" id="grad1">
         <div class="row justify-content-center mt-0">
             <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
                 <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                     <h5><strong> Délivrance et suspension de l’agrément technique </strong></h5>
                     <p>
                         @if (session('success'))
                             <div class="alert alert-success">
                                 {{ session('success') }}
                             </div>
                         @endif
                     </p>
                     <p>Les champs suivis d'etoile rouge sont obligatoires</p>

                     <!-- tres important -->
                     <input type="number" id="nbrItem" hidden value=1>

                     <div class="row">
                         <div class="col-md-12 mx-0">
                             <form id="msform" role="form" method="POST"
                                 action="{{ route('demandesp002-store') }}" enctype="multipart/form-data">
                                 @csrf
                                 <!-- progressbar -->
                                 <ul id="progressbar">
                                     <li class="active" id="personal"><strong>Renseignement administratif</strong></li>
                                     <li id="folder"><strong>Representant</strong>
                                     </li>
                                     <li id="folder"><strong>Pièces jointes</strong></li>
                                     <li id="personal"><strong>Participation effective du candidat à l'agrément</strong></li>
                                     <li id="engagement"><strong>Engagement </strong></li>
                                     <li id="engagement"><strong>Récapitulatif </strong></li>
                                     <li id="paiement"><strong>Paiement </strong></li>

                                     {{-- <li id="confirm"><strong>Validation</strong></li> --}}
                                 </ul>
                                 <!-- fieldsets -->

                                 <fieldset>
                                     <div class="form-card">
                                         <h4 class="fs-title">Fiche de renseignement Administratif <span
                                                 style="color:red">
                                                 *</span></h4>
                                         <div class="row">

                                            <label class="fw-bold">Identité du demandeur <span style="color: red">*</span></label>
                                            <input type="text" class="border-success" name="identite" id="identite" required=true placeholder="identité" value="{{ $identite }}" /><br /><br />
                                       

                                             <label class="fw-bold">Que voulez vous faire <span
                                                     style="color: red">*</span></label>
                                             <div class="col-4">
                                                 <input id="type_Demende" type="radio" value="Nouvel demande" name="objectif_demande" checked>
                                                 <label for="typeDemende">Nouvel demande</label>
                                             </div>
                                             <div class="col-4">
                                                 <input id="type_Demende" type="radio" value="Renouvellement" name="objectif_demande">
                                                 <label for="typeDemende">Renouvellement</label>
                                             </div>
                                             <div class="col-4">
                                                 <input id="type_Demende" type="radio" value="Changement de catégorie" name="objectif_demande">
                                                 <label for="typeDemende">Changement de catégorie</label>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6 form-group">
                                                 <label>Type catégorie</label>
                                                 <select id="categorie" name="categorie" class="form-select border-success" required=true>
                                                    <option value="">Veuillez choisir la catégorie d'agrément</option>
                                                       @foreach ($categories as $cat)
                                                            <option class="mb-3" value="{{$cat->uuid}}">{{$cat->libelle}}</option>
                                                       @endforeach 
                                                 </select>
                                             </div>

                                             <div class="col-6 form-group">
                                                <label class="pays_residence fw-bold">Commune de Residence<span style="color:red"> *</span></label>
                                                <select name="commune_id" id="commune_id" class="form-select border-success">
                                                <option >Veuillez choisir la commune</option>
                                                @foreach($communes as $com)
                                                    <option value="{{$com->uuid }}">{{utf8_decode($com->libelle)}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                         </div> <br>

                                         <div class="row">
                                          

                                             <div class="col-6 mb-3 form-group">
                                                 <label for="fullName" class="col-form-label">Raison sociale <span style="color: red">*</span></label>
                                                 <input name="raison_social" type="text" placeholder="Raison sociale"
                                                     class="form-control border-success" id="raison_sociale" required=true>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6 mb-3 form-group">
                                                 <label for="fullName" class="col-form-label">Siège social</label>
                                                 <input name="siege_social" type="text" placeholder="Siege social"
                                                     class="form-control border-success" id="siege_social" required=true>
                                             </div>

                                             <div class="col-6 mb-3 form-group">
                                                 <label for="boite_postale" class="col-form-label">Boîte Postale</label>
                                                 <input name="boite_postale" type="text" placeholder="Boite postale"
                                                     class="form-control border-success" id="boite_postale" required=true>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6 form-group">
                                                 <label class="col-form-label">Télephone<span style="color: red">*</span></label>
                                                 <input type="text" id="telephone" name="tel_1" class="form-control border-success" placeholder="Téléphone" required=true />
                                             </div>

                                             <div class="col-6 form-group">
                                                 <label class="col-form-label">Fax<span style="color: red">*</span></label>
                                                 <input type="text" name="fax" id="fax" class="form-control border-success" placeholder="Fax" required=true />
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6 form-group">
                                                 <label class="col-form-label">Email<span style="color: red">*</span></label>
                                                 <input type="email" name="email_entreprise" id="email" class="form-control border-success" placeholder="Email" required=true />
                                             </div>
                                             <div class="col-6 form-group">
                                                 <label class="col-form-label">Localisation<span style="color: red">*</span></label>
                                                 <input type="text" name="adresse_physique" id="adresse_physique" class="form-control border-success" placeholder="Quartier ou secteur" required=true/>
                                             </div>
                                         </div>

                                     </div>
                                     <button type="button" name="next" class="next action-button btn btn-success"
                                         id="next_idetnite">Suivant</button>
                                     <!-- Ajoutez ceci dans la première étape du formulaire -->
                                     <div class="error-message" style="color: red;"></div>

                                 </fieldset>

                                 <fieldset>
                                     <div class="form-card mb-3">
                                         <h2 class="fs-title">Personne habilitée à representer l'entreprise</h2>

                                         <div class="row">
                                             <div class="col-6">
                                                 <label class="fw-bold">Nom <span
                                                         style="color: red">*</span></label>
                                                 <input type="text" name="nom_representant" id="nom_representant" placeholder="Nom" class="border-success form-control" required=true />
                                             </div>
                                             <div class="col-6">
                                                 <label class="fw-bold">Prénom(s) <span
                                                         style="color: red">*</span></label>
                                                 <input type="text" name="prenom_representant" id="prenom_representant" placeholder="Prénom" class="border-success form-control" required=true />
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6">
                                                 <label class="fw-bold">Qualité <span
                                                         style="color: red">*</span></label>
                                                 <input type="text" name="fonction_representant" id="fonction_representant" placeholder="Qualité de la personne" class="border-success form-control" required=true />
                                             </div>
                                             <div class="col-6">
                                                 <label class="fw-bold">Adresse <span
                                                         style="color: red">*</span></label>
                                                 <input type="text" name="adresse_representant" id="adresse_representant" placeholder="Adresse" class="border-success form-control" required=true/>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-6">
                                                 <label class="fw-bold" for="numero_cnss_entreprise">N° employeur (CNSS)<span
                                                         style="color: red">*</span></label>
                                                 <input type="text"  name="numero_cnss_entreprise" placeholder="N° CNSS de l'employeur" id="numero_cnss_entreprise" class="border-success form-control" required=true/>
                                             </div>
                                         </div>

                                     </div>
                                     <button type="button" name="previous"
                                         class="previous action-button-previous">Retour</button>
                                     <button type="button" name="make_payment" id="next_piece"
                                         class="next action-button">Suivant</button>
                                 </fieldset>

                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title">Pièces jointes</h2>

                                         <div class="row">
                                             <div class="col-6 form-group">
                                                 <label class="col-form-label fw-bold">Statut légalisée de la
                                                     société<span style="color: red">*</span></label>
                                                 <input type="file" name="statutSociete" id="statutSociete" placeholder="Statut légalisé de la société" class="form-control border-success" required=true/>
                                             </div>

                                             <div class="col-6 form-group">
                                                 <label class="col-form-label fw-bold">RCCM / RSCPM<span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="rccm" id="rccm" placeholder="RCCM / RSCPM" class="form-control border-success" required=true />
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6 form-group">
                                                 <label class="col-form-label fw-bold">IFU / Récipissé<span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="ifu" id="ifu" placeholder="IFU / Récipissé" class="form-control border-success" required=true />
                                             </div>

                                             <div class="col-6 form-group">
                                                 <label class="col-form-label fw-bold">Document chiffre d'affaire<span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="chiffreAffaire" id="chiffreAffaire" placeholder="Document chiffre d'affaire" class="form-control border-success" required=true/>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6">
                                                 <label class="fw-bold">Ancien agrément <span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="ancienAgrement" id="ancienAgrement" placeholder="Ancien agrément" class="border-success form-control" required=true />
                                             </div>
                                             <div class="col-6">
                                                 <label class="fw-bold">Liste matériel <span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="listeMateriel" id="listeMateriel" placeholder="Liste du matériel" class="border-success form-control" required=true />
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-6">
                                                 <label class="adresse fw-bold">Liste personnel<span
                                                         style="color: red">*</span></label>
                                                 <input type="file" name="listePersonnel" id="listePersonnel" placeholder="Liste du personnel" class="border-success form-control" required=true />
                                             </div>
                                         </div>

                                         <hr>
                                         <h2 class="fs-title">Autres documents</h2>
                                         <div class="row">
                                             <div class="col-12">
                                                 <table
                                                     class="table datatable table-bordered table-striped datatable-table"
                                                     id="dt_cv">
                                                     <thead class="dst-form-thead">
                                                         <tr>
                                                             <th colspan="3" style="text-align: center">CV
                                                                 Personnel</th>
                                                         </tr>
                                                         <tr>
                                                             <th>Sujet du document <span style="color:red">*</span>
                                                             </th>
                                                             <th>Fichier <span style="color:red">*</span></th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                     </tbody>
                                                     <tfoot>
                                                         <tr>
                                                             <td colspan="3" style="text-align: right;">
                                                                 <a class="btn btn-default" onclick="addRowCV()">
                                                                     <i class="fa fa-plus-circle text-success"></i>
                                                                     <span>Ajouter un CV </span>
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                     </tfoot>
                                                 </table>

                                             </div>
                                             <hr>

                                             <div class="col-12">
                                                 <table
                                                     class="table datatable table-bordered table-striped datatable-table"
                                                     id="dt_diplome">
                                                     <thead class="dst-form-thead">
                                                         <tr>
                                                             <th colspan="3" style="text-align: center">Diplôme du
                                                                 personnel</th>
                                                         </tr>
                                                         <tr>
                                                             <th>Sujet du document <span style="color:red">*</span>
                                                             </th>
                                                             <th>Fichier <span style="color:red">*</span></th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                     </tbody>
                                                     <tfoot>
                                                         <tr>
                                                             <td colspan="3" style="text-align: right;">
                                                                 <a class="btn btn-default" onclick="addRowDiplome()">
                                                                     <i class="fa fa-plus-circle text-success"></i>
                                                                     <span>Ajouter un diplôme </span>
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                     </tfoot>
                                                 </table>

                                             </div>
                                         </div>
                                     </div>
                                     <button type="button" name="previous"
                                         class="previous action-button-previous">Retour</button>
                                     <Button type="button" name="make_payment" id="next_domaine"
                                         class="next action-button">Suivant</button>
                                 </fieldset>
                                 <fieldset>
                                     <div class="form-card">
                                         <h2 class="fs-title">Participation effective du candidat à l'agrément</h2>

                                         <div class="accordion" id="accordionReferenceEntreprise">
                                             <div class="accordion-item">
                                                 <h2 class="accordion-header" id="heading1">
                                                     <button class="accordion-button" type="button"
                                                         data-bs-toggle="collapse" data-bs-target="#reference1"
                                                         aria-expanded="true" aria-controls="reference1">
                                                         Référence #1
                                                     </button>
                                                 </h2>

                                                 <div id="reference1" class="accordion-collapse collapse show"
                                                     aria-labelledby="heading1" data-bs-parent="#accordionReferenceEntreprise">
                                                     <div class="accordion-body">
                                                         <div class="row">
                                                             <div class="col-6">
                                                                 <label for="localisation">Localisation
                                                                     <span style="color:red">*</span></label>
                                                                 <input type="text" name="localisation[]" id="localisation" 
                                                                     class="border-success form-control" placeholder="Localité" required=true/>
                                                             </div>
                                                             <div class="col-6">
                                                                 <label for="designation">Désignation de travaux
                                                                     <span style="color:red">*</span></label>
                                                                 <input type="text" name="designation[]" id="designation"
                                                                     class="border-success form-control" placeholder="Désignation de travaux" required=true/>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-6">
                                                                <label for="maitre_ouvrage" >Maitrise d'ouvrage
                                                                    <span style="color: red">*</span></label>
                                                                <input type="text" name="maitre_ouvrage[]" id="maitre_ouvrage"
                                                                    class="border-success form-control" placeholder="Maitrise d'ouvrage" required=true/>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="montany_travaux" >Montant travaux
                                                                    <span style="color: red">*</span></label>
                                                                <input type="number" name="montany_travaux[]" id="montany_travaux"
                                                                    class="border-success form-control" placeholder="Montant travaux" required=true/>
                                                            </div>
                                                         </div>

                                                         <div class="row">
                                                             <div class="col-6 form-group">
                                                                 <label class="col-form-label" for="date_debut">Date début<span
                                                                         style="color: red">*</span></label>
                                                                 <input type="date" name="date_debut[]" id="date_debut"
                                                                     class="form-control border-success" placeholder="Date début" required=true/>
                                                             </div>

                                                             <div class="col-6 mb-3 form-group">
                                                                 <label for="date_fin" class="col-form-label">Date fin</label>
                                                                 <input type="date" name="date_fin[]" id="date_fin" placeholder="Date fin"
                                                                     class="form-control border-success" required=true>
                                                             </div>
                                                         </div>

                                                         <div class="row">
                                                             <div class="col-6">
                                                                 <label class="fw-bold" for="nature">Nature<span
                                                                         style="color: red">*</span></label>
                                                                 <input type="text" name="nature[]" id="nature"
                                                                     class="border-success form-control" placeholder="Nature" />
                                                             </div>
                                                             <div class="col-6">
                                                                 <label class="fw-bold" for="pourcentage_montant_total">Pourcentage Montant total (%)
                                                                     <span style="color: red">*</span></label>
                                                                 <input type="number" name="pourcentage_montant_total[]" id="pourcentage_montant_total"
                                                                     class="border-success form-control" placeholder="Pourcentage Montant total" required=true/>
                                                             </div>
                                                         </div>
                                                         <div class="row">
                                                             <div class="col-6">
                                                                 <label class="fw-bold" for="condition">Condition
                                                                     <span style="color: red">*</span></label>
                                                                 <textarea cols="30" rows="10" style="border: solid green 2px"
                                                                     name="condition[]" id="condition" placeholder="Condition" required=true ></textarea>
                                                             </div>
                                                             <div class="col-6">
                                                                 <label class="fw-bold" for="observations">Observation <span
                                                                         style="color: red">*</span></label>
                                                                 <textarea cols="30" rows="10" style="border: solid green 2px"
                                                                        name="observations[]" id="observation" placeholder="Observation" required=true></textarea>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <a class="btn btn-default" onclick="addCollapseAccordion()">
                                         <i class="fa fa-plus-circle text-success"></i>
                                         <span>Ajouter Réferences de l'entreprise </span>
                                     </a>
                                     <button type="button" name="previous"
                                         class="previous action-button-previous">Retour</button>
                                     <Button type="button" name="make_payment" id="next_domaine"
                                         class="next action-button">Suivant</button> 
                                 </fieldset>

                                 <fieldset>

                                     <div class="form-card">
                                         <h2 class="fs-title">Certification et engagement </h2>

                                         <div class="row">
                                             <input type="checkbox" id="confirmationBox" name="confirmed"
                                                 class="required-checkbox   checkbox" value="Valider">
                                             @if ($errors->has('confirmed'))
                                                 <p class="alert alert-danger">{{ $errors->first('confirmed') }}</p>
                                             @endif
                                             <label for="confirmationBox" class="checkbox-label ">
                                                 En cochant cette case, je certifie sur mon honneur que les informations
                                                 renseignées sont correctes.
                                             </label>
                                         </div>

                                     </div>

                                     <button type="button" name="previous"
                                         class="previous action-button-previous">Retour</button>
                                         <input type="button" class="next action-button" id="recap"
                                    value="Suivant" />
                                 </fieldset>

                                 <fieldset>
                                    <p style="color: red;"> Veuillez vérifier vos informations minitieusement avant la validation</p>
                                    <div class="form-card">
                                        <h2 class="fs-title">Fiche de renseignement administratif</h2>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Identité : </label>
                                                <input type="text" name="recapNom" id="recapNom" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Type demande : </label>
                                                <input type="text" name="recapTypeDemande" id="recapTypeDemande" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Catégorie : </label>
                                                <input type="text" name="recapCategorie" id="recapCategorie" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Commune : </label>
                                                <input type="text" name="recapCommune" id="recapCommune" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Raison Sociale :  </label>
                                                <input type="text" name="recapRaisonSociale" id="recapRaisonSociale" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Siege Sociale : </label>
                                                <input type="text" name="recapSiegeSocial" id="recapSiegeSocial" disabled/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Boite postale : </label>
                                                <input type="text" name="recapBP" id="recapBP" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Téléphone : </label>
                                                <input type="text" name="recapTelephone" id="recapTelephone" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">FAX : </label>
                                                <input type="text" name="recapFax" id="recapFax" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Email : </label>
                                                <input type="text" name="recapEmail" id="recapEmail" disabled/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Localisation : </label>
                                                <input type="text" name="recapAdressePhysique" id="recapAdressePhysique" disabled/>
                                            </div>
                                        </div>
                                        <hr>
                                        <h2 class="fs-title">Personne habilitée à representer l'entreprise</h2>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Nom : </label>
                                                <input type="text" name="recapNomRepresentant" id="recapNomRepresentant" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Prenom : </label>
                                                <input type="text" name="recapPrenomRepresentant" id="recapPrenomRepresentant" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Qualité : </label>
                                                <input type="text" name="recapFonctionRepresentant" id="recapFonctionRepresentant" disabled/>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Adresse : </label>
                                                <input type="text" name="recapAdresseRepresentant" id="recapAdresseRepresentant" disabled/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">N° CNSS Employeur : </label>
                                                <input type="text" name="recapNumero_cnss_entreprise" id="recapNumero_cnss_entreprise" disabled/>
                                            </div>
                                        </div>
    
                                        <hr>
                                        <h2 class="fs-title">Pieces Jointes</h2>
                                        <div class="row">
                                            <div class="col-12">
                                                <table
                                                     class="table datatable table-bordered table-striped datatable-table"
                                                     id="dt_diplome">
                                                     <thead class="dst-form-thead">
                                                         <tr>
                                                             <th colspan="3" style="text-align: center">Liste des pieces jointes</th>
                                                         </tr>
                                                         <tr>
                                                             <th>Sujet du document <span style="color:red">*</span>
                                                             </th>
                                                             <th>Fichier <span style="color:red">*</span></th>
                                                             <th></th>
                                                         </tr>
                                                         
                                                     </thead>
                                                     <tbody>
                                                        <tr>
                                                            <td><label for="">Statut de la société : </label></td>
                                                            <td><input id="" disabled name="recapStatut" class="border-success form-control" ></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">RCCM : </label></td>
                                                            <td><input id="" disabled name="recapRccm" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">IFU : </label></td>
                                                            <td><input id="" disabled name="recapIfu" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">Chiffre d'affaire : </label></td>
                                                            <td><input id="" disabled name="recapChiffre" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">Ancien agrément : </label></td>
                                                            <td><input id="" disabled name="recapAgrement" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">Liste matériel : </label></td>
                                                            <td><input id="" disabled name="recapMateriel" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">Liste personnel : </label></td>
                                                            <td><input id="" disabled name="recapPersonnel" class="border-success form-control"></td>
                                                            <td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="bi bi-eye text-primary"></i></a></td>
                                                        </tr>
                                                     </tbody>
                                                     <tfoot>
                                                         
                                                     </tfoot>
                                                 </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <table
                                                     class="table datatable table-bordered table-striped datatable-table"
                                                     id="recap_cv">
                                                     <thead class="dst-form-thead">
                                                         <tr>
                                                             <th colspan="3" style="text-align: center">CV du
                                                                 Personnel</th>
                                                         </tr>
                                                         <tr>
                                                             <th>Sujet du document <span style="color:red">*</span>
                                                             </th>
                                                             <th>Fichier <span style="color:red">*</span></th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                     </tbody>
                                                     <tfoot>  
                                                     </tfoot>
                                                 </table>
                                            </div>
                                        </div>

                                        
                                    </div>
    
                                    <input type="button"  class="previous action-button-previous"
                                        value="Retour" />
                                    <button type="button" name="make_payment" id="next_piece"
                                        class="next action-button">Suivant</button>
                                 </fieldset>

                                 <fieldset>
                                    <div class="form-card">
                                             <h4 class="fs-title">Paiement <span style="color:red">
                                                     *</span></h4>
                                             <label for="demande timbre" class="fw-bold">Moyens de Paiement<span
                                                     style="color:red">
                                                     *</span></label>
                                             <div class="row">
                                                 <div class="col-3">
                                                     <label class="fw-bold">ORANGE</label>
                                                     <input id="radio1" type="radio" value="1"
                                                         class="checkbox" name="moyen" />
                                                 </div>
                                                 <div class="col-3">
                                                     <label class="siege_social fw-bold ">MOOV</label>
                                                     <input id="radio2" type="radio" value="0"
                                                         name="moyen" />
                                                 </div>

                                             </div>
                                             <br>
                                             <div class="row">
                                                 <div id="moyenP1">
                                                     <label> La somme à payer est de 1500Frs: Taper *144*4*6*1500# pour
                                                         obtenir le OTP </label>

                                                 </div>
                                                 <div id="moyenP2">
                                                     <label> La somme à payer est de 1500Frs: Taper *555*4*6*1500# pour
                                                         obtenir le OTP </label>

                                                 </div>
                                                 <div class="col-6">
                                                     <label class="boite_postale fw-bold">Téléphone<span
                                                             style="color:red">
                                                             *</span></label>
                                                     <input type="number" name="numero" style="width: 50%;"
                                                         class="border-success form-control" placeholder="Telephone"
                                                         required />
                                                 </div>
                                                 <div class="col-6">
                                                     <label class="boite_postale fw-bold">OTP<span style="color:red">
                                                             *</span></label>
                                                     <input type="number" name="otp" style="width: 50%;"
                                                         class="border-success form-control" placeholder="otp"
                                                         required />
                                                 </div>
                                             </div>
                                         </div>
                                         

                                         <input type="button" name="previous"
                                             class="previous action-button-previous" value="Retour" />
                                         <input type="submit" class="next action-button" value="Valider" />

                                         <!-- Ajoutez ceci dans la première étape du formulaire -->
                                         <div class="error-message" style="color: red;"></div>
                                 </fieldset>

                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section><!-- End About Section -->


 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" ;></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 <!--<script src="{{ asset('js/jToast.min.js') }}"></script>-->
 <script src="{{ asset('js/sweetalert2.js') }}"></script>
 <script type="text/javascript">
     //intitialisation du tableau des autres documents
     $(function() {
         for (var i = 0; i < 1; i++) {
             addRowCV();
         }
     })
     /*  $(function () {
          $('#msform').submit(function (e) {
              e.preventDefault();
          });
       })*/
 </script>

<script>
    $(document).ready(function() {
      $("#recap").click(function(){
        var beneficiaire = $("#beneficiaire").val();
        var typeDemande = $("input[type=radio][name=objectif_demande]:checked").val();
        var categorie = $("#categorie").find('option:selected').text();
        var commune = $("#commune_id").find('option:selected').text();
        var raisonSociale = $("#raison_sociale").val();
        var siegeSocial = $("#siege_social").val();
        var boitePostale = $("#boite_postale").val();
        var telephone = $("#telephone").val();
        var fax = $("#fax").val();
        var email = $("#email").val();
        var adressePhysique = $("#adresse_physique").val();

        var nomRepresentant = $("#nom_representant").val();
        var prenomRepresentant = $("#prenom_representant").val();
        var fonctionRepresentant = $("#fonction_representant").val();
        var adresseRepresentant = $("#adresse_representant").val();
        var numeroCnssEntreprise = $("#numero_cnss_entreprise").val();
        
        var statut = $('#statutSociete')[0].files[0].name;
        var rccm = $('#rccm')[0].files[0].name;
        var ifu = $('#ifu')[0].files[0].name;
        var chiffreAffaire = $('#chiffreAffaire')[0].files[0].name;
        var agrement = $('#ancienAgrement')[0].files[0].name;
        var materiel = $('#listeMateriel')[0].files[0].name;
        var personnel = $('#listePersonnel')[0].files[0].name;
        
        $('input[name=recapNom]').val(beneficiaire);
        $('input[name=recapTypeDemande]').val(typeDemande);
        $('input[name=recapCommune]').val(commune);
        $('input[name=recapCategorie]').val(categorie);
        $('input[name=recapRaisonSociale]').val(raisonSociale);
        $('input[name=recapSiegeSocial]').val(siegeSocial);
        $('input[name=recapBP]').val(boitePostale);
        $('input[name=recapTelephone]').val(telephone);
        $('input[name=recapFax]').val(fax);
        $('input[name=recapEmail]').val(email);
        $('input[name=recapAdressePhysique]').val(adressePhysique);

        $('input[name=recapNomRepresentant]').val(nomRepresentant);
        $('input[name=recapPrenomRepresentant]').val(prenomRepresentant);
        $('input[name=recapFonctionRepresentant]').val(fonctionRepresentant);
        $('input[name=recapAdresseRepresentant]').val(adresseRepresentant);
        $('input[name=recapNumero_cnss_entreprise]').val(numeroCnssEntreprise);
        
        $('input[name=recapStatut]').val(statut);
        $('input[name=recapRccm]').val(rccm);
        $('input[name=recapIfu]').val(ifu);
        $('input[name=recapChiffre]').val(chiffreAffaire);
        $('input[name=recapAgrement]').val(agrement);
        $('input[name=recapMateriel]').val(materiel);
        $('input[name=recapPersonnel]').val(personnel);

        /* var inputId = '#libelle_document_CV\\[\\]';
        var libelleCv = $(inputId).val(); */
        //alert(libelleCv);
        /* $('input[name=recapLibelleCv[]]').val(libelleCv);
        $('input[name=recapdocCv[]]').val(listeCv);

        var file = $('#fichier_document_CV\\[\\]')[0].files[0].name; */
        /* for (var i = 0; i < files.length; i++) {
            alert((files[i].name);)
            console.log("Nom du fichier:", files[i].name);
        } */
        

        /* $("#recap_cv").append([
             '<tr class="">',
             '<td class="rs">' +
             '<input type="text" name="recapLibelleCv[]" id="recapLibelleCv[]" class="border-success form-control" />' +
             '</td>',
             '<td class="rs"><input type="file" id="recapdocCv[]" class="border-success form-control required name="recapdocCv[]"> </td>',
             '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
             '</tr>',
         ].join()); */
        })   
    });

</script>
    

 <script type='text/javascript'>
     $(document).ready(function() {

         var current_fs, next_fs, previous_fs; //fieldsets
         var opacity;

         $(".next").click(function() {
             current_fs = $(this).parent();
             next_fs = $(this).parent().next();

             // Vérifiez si tous les champs obligatoires dans le formulaire actuel sont remplis
             var isValid = true;
             current_fs.find('input[required]').each(function() {
                 //if ($(this).val() === "") {
                 if (!$(this).val().trim()) {
                     isValid = false;
                     $(this).addClass("error");
                 } else {
                     $(this).removeClass("error");
                 }
             });

             // Vérifiez si la case de confirmation est cochée
             current_fs.find('checkbox[required]').each(function() {
                 //if ($(this).val() === "") {
                 if (!$(this).is(":checked")) {
                     isValid = false;
                     $(this).addClass("error");
                 } else {
                     $(this).removeClass("error");
                 }
             });

             if (isValid) {
                 // Ajoutez la classe Active
                 $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                 // Affichez le champ suivant
                 next_fs.show();
                 // Masquez le champ actuel avec un style
                 current_fs.animate({
                     opacity: 0
                 }, {
                     step: function(now) {
                         // pour faire apparaître l'animation du champ
                         opacity = 1 - now;
                         current_fs.css({
                             'display': 'none',
                             'position': 'relative'
                         });
                         next_fs.css({
                             'opacity': opacity
                         });
                     },
                     duration: 600
                 });
             }
         });


         $(".previous").click(function() {

             current_fs = $(this).parent();
             previous_fs = $(this).parent().prev();

             //Remove class active
             $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

             //show the previous fieldset
             previous_fs.show();

             //hide the current fieldset with style
             current_fs.animate({
                 opacity: 0
             }, {
                 step: function(now) {
                     // for making fielset appear animation
                     opacity = 1 - now;

                     current_fs.css({
                         'display': 'none',
                         'position': 'relative'
                     });
                     previous_fs.css({
                         'opacity': opacity
                     });
                 },
                 duration: 600
             });
         });

         $('.radio-group .radio').click(function() {
             $(this).parent().find('.radio').removeClass('selected');
             $(this).addClass('selected');
         });

         $(".submit").click(function() {
             return false;
         })

         //conrol paiement
         $("div#moyenP1").hide();
         $("div#moyenP2").hide();

         jQuery('input[name=moyen]:radio').click(function() {
             $("div#moyenP1").hide();
             $("div#moyenP2").hide();
             var divId = jQuery(this).val();
             if (divId * 1 == 1) {
                 $("div#moyenP1").show()
             } else {
                 $("div#moyenP2").show()
             }
         });

     });
 </script>
 <script type='text/javascript'>
     var myLink = document.querySelector('a[href="#"]');
     myLink.addEventListener('click', function(e) {
         e.preventDefault();
     });

     function addRowCV() {
         $("#dt_cv").append([
             '<tr class="">',
             '<td class="rs">' +
             '<input type="text" name="libelle_document_CV[]" id="libelle_document_CV[]" class="border-success form-control" />' +
             '</td>',
             '<td class="rs"><input type="file" id="fichier_document_CV[]" class="border-success form-control required name="fichier_document_CV[]"> </td>',
             '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
             '</tr>',
         ].join());
     }
        
     function deleteRowCV(me) {
         $(me).closest('tr').remove();
     }

     function addRowDiplome() {
         $("#dt_diplome").append([
             '<tr class="">',
             '<td class="rs">' +
             '<input type="text" name="libelle_document_diplome[]" class="border-success form-control" />' +
             '</td>',
             '<td class="rs"><input type="file" class="border-success form-control required name="fichier_document_diplome[]"> </td>',
             '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
             '</tr>',
         ].join());
     }


     function addCollapseAccordion() {
        
        nbrItem = document.getElementById("nbrItem");
        nbrItemValue = nbrItem.value;
        nbrItemValue = parseInt(nbrItemValue) + 1;
        
        nbrItem.value = nbrItemValue;

        // Now you can use the accordionItemHTML variable as needed.
        let innerHTML = "" +
        "<div class=\"accordion-item\">" +
            "<h2 class=\"accordion-header\" id=\"heading"+nbrItemValue+"\">" +
                "<button class=\"accordion-button\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#reference"+nbrItemValue+"\" aria-expanded=\"true\" aria-controls=\"reference"+nbrItemValue+"\">" +
                    "Référence #" + nbrItemValue +
                "<\/button>" +
            "<\/h2>" +
            "<div id=\"reference"+nbrItemValue+"\" class=\"accordion-collapse collapse show\" aria-labelledby=\"heading"+nbrItemValue+"\" data-bs-parent=\"#accordionReferenceEntreprise\">" +
                "<div class=\"accordion-body\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-6\">" +
                            "<label for=\"localisation\">Localisation<span style=\"color:red\">*<\/span><\/label>" +
                            "<input type=\"text\" name=\"localisation[]\" id=\"localisation\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                        "<div class=\"col-6\">" +
                            "<label for=\"designation\">Désignation de travaux<span style=\"color:red\">*<\/span><\/label>" +
                            "<input type=\"text\" name=\"designation[]\" id=\"designation\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                    "<\/div>" +
                    "<div class=\"row\">" +
                        "<div class=\"col-6\">" +
                            "<label for=\"maitre_ouvrage\">Maitrise d'ouvrage<span style=\"color: red\">*<\/span><\/label>" +
                            "<input type=\"text\" name=\"maitre_ouvrage[]\" id=\"maitre_ouvrage\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                        "<div class=\"col-6\">" +
                            "<label for=\"montany_travaux\">Montant travaux" +
                                "<span style=\"color: red\">*<\/span><\/label>" +
                            "<input type=\"number\" name=\"montany_travaux[]\" id=\"montany_travaux\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                    "<\/div>" +
                    "<div class=\"row\">" +
                        "<div class=\"col-6 form-group\">" +
                            "<label class=\"col-form-label\" for=\"date_debut\">Date début<span style=\"color: red\">*<\/span><\/label>" +
                            "<input type=\"date\" name=\"date_debut[]\" id=\"date_debut\" class=\"form-control border-success\" \/>" +
                        "<\/div>" +
                        "<div class=\"col-6 mb-3 form-group\">" +
                            "<label for=\"date_fin\" class=\"col-form-label\">Date fin<\/label>" +
                            "<input type=\"date\" name=\"date_fin[]\" id=\"date_fin\" class=\"form-control border-success\">" +
                        "<\/div>" +
                    "<\/div>" +
                    "<div class=\"row\">" +
                        "<div class=\"col-6\">" +
                            "<label class=\"fw-bold\" for=\"nature\">Nature<span style=\"color: red\">*<\/span><\/label>" +
                            "<input type=\"text\" name=\"nature[]\" id=\"nature\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                        "<div class=\"col-6\">" +
                            "<label class=\"fw-bold\" for=\"pourcentage_montant_total\">Pourcentage Montant total<span style=\"color: red\">*<\/span><\/label>" +
                            "<input type=\"number\" name=\"pourcentage_montant_total[]\" id=\"pourcentage_montant_total\" class=\"border-success form-control\" \/>" +
                        "<\/div>" +
                    "<\/div>" +
                    "<div class=\"row\">" +
                        "<div class=\"col-6\">" +
                            "<label class=\"fw-bold\" for=\"condition\">Condition<span style=\"color: red\">*<\/span><\/label>" +
                            "<textarea cols=\"30\" rows=\"10\" style=\"border: solid green 2px\" name=\"condition[]\" id=\"condition\"><\/textarea>" +
                        "<\/div>" +
                        "<div class=\"col-6\">" +
                            "<label class=\"fw-bold\" for=\"observations\">Observation <span style=\"color: red\">*<\/span><\/label>" +
                            "<textarea cols=\"30\" rows=\"10\" style=\"border: solid green 2px\" name=\"observations[]\" id=\"observations\"><\/textarea>" +
                        "<\/div>" +
                    "<\/div>" +
                "<\/div>" +
                "<div class=\"accordion-footer text-end\">" +
                    "<a class=\"btn btn-xs\" data-id=\"0\" onclick=\"deleteCollapseAccordion(this)\" title=\"Supprimer la ligne\"> <i class=\"fa fa-trash text-danger\"><\/i><\/a>" +
                "<\/div>" +
            "<\/div>" +
        "<\/div>";
        
        // document.write("<div class=\"accordion-item\">\r\n                                                 <h2 class=\"accordion-header\" id=\"headingTwo\">\r\n                                                     <button class=\"accordion-button\" type=\"button\"\r\n                                                         data-bs-toggle=\"collapse\" data-bs-target=\"#collapseOne\"\r\n                                                         aria-expanded=\"true\" aria-controls=\"collapseOne\">\r\n                                                         Accordion Item #1\r\n                                                     <\/button>\r\n                                                 <\/h2>\r\n                                                 <div id=\"collapseOne\" class=\"accordion-collapse collapse show\"\r\n                                                     aria-labelledby=\"headingTwo\" data-bs-parent=\"#accordionExample\">\r\n                                                     <div class=\"accordion-body\">\r\n                                                         <div class=\"row\">\r\n                                                             <div class=\"col-4\">\r\n                                                                 <label for=\"domaine\"\r\n                                                                     class=\"siege_social\">Localisation\r\n                                                                     <span style=\"color:red\">*<\/span><\/label>\r\n                                                                 <select name=\"domaine\" id=\"domaine\"\r\n                                                                     class=\"form-select border-success\">\r\n                                                                     <option value=\"\">Veuillez choisir la\r\n                                                                         localisation<\/option>\r\n                                                                 <\/select>\r\n\r\n                                                             <\/div>\r\n                                                             <div class=\"col-4\">\r\n                                                                 <label for=\"categorie\"\r\n                                                                     class=\"siege_social\">D\u00e9signation de travaux\r\n                                                                     <span style=\"color:red\">*<\/span><\/label>\r\n                                                                 <select name=\"categorie\" id=\"categorie\"\r\n                                                                     class=\"form-select border-success\">\r\n                                                                     <option value=\"\">Veuillez choisir la\r\n                                                                         d\u00e9signation des travaux<\/option>\r\n                                                                 <\/select>\r\n                                                             <\/div>\r\n                                                             <div class=\"col-4\">\r\n                                                                 <label for=\"sousdomaine\" class=\"nom_societe\">Maitrise\r\n                                                                     d'ouvrage\r\n                                                                     <span style=\"color: red\">*<\/span><\/label>\r\n                                                                 <input type=\"text\"\r\n                                                                     class=\"border-success form-control\" \/>\r\n                                                             <\/div>\r\n                                                         <\/div>\r\n\r\n                                                         <div class=\"row\">\r\n                                                             <div class=\"col-6 form-group\">\r\n                                                                 <label class=\"col-form-label\">Date d\u00e9but<span\r\n                                                                         style=\"color: red\">*<\/span><\/label>\r\n                                                                 <input type=\"date\"\r\n                                                                     class=\"form-control border-success\" \/>\r\n                                                             <\/div>\r\n\r\n                                                             <div class=\"col-6 mb-3 form-group\">\r\n                                                                 <label for=\"fullName\" class=\"col-form-label\">Date\r\n                                                                     fin<\/label>\r\n                                                                 <input type=\"date\"\r\n                                                                     class=\"form-control border-success\"\r\n                                                                     id=\"fullName\">\r\n                                                             <\/div>\r\n                                                         <\/div>\r\n\r\n                                                         <div class=\"row\">\r\n                                                             <div class=\"col-6\">\r\n                                                                 <label class=\"fw-bold\">Nature<span\r\n                                                                         style=\"color: red\">*<\/span><\/label>\r\n                                                                 <input type=\"text\"\r\n                                                                     class=\"border-success form-control\" \/>\r\n                                                             <\/div>\r\n                                                             <div class=\"col-6\">\r\n                                                                 <label class=\"fw-bold\">Pourcentage Montant\r\n                                                                     total <span style=\"color: red\">*<\/span><\/label>\r\n                                                                 <input type=\"number\"\r\n                                                                     class=\"border-success form-control\" \/>\r\n                                                             <\/div>\r\n                                                         <\/div>\r\n                                                         <div class=\"row\">\r\n                                                             <div class=\"col-6\">\r\n                                                                 <label class=\"fw-bold\">Condition <span\r\n                                                                         style=\"color: red\">*<\/span><\/label>\r\n                                                                 <textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\" style=\"border: solid green 2px\"><\/textarea>\r\n                                                                 {{-- <input type=\"text\" class=\"border-success form-control\" \/> --}}\r\n                                                             <\/div>\r\n                                                             <div class=\"col-6\">\r\n                                                                 <label class=\"fw-bold\">Observation <span\r\n                                                                         style=\"color: red\">*<\/span><\/label>\r\n                                                                 <textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\" style=\"border: solid green 2px\"><\/textarea>\r\n                                                                 {{-- <input type=\"text\" class=\"border-success form-control\" \/> --}}\r\n                                                             <\/div>\r\n                                                         <\/div>\r\n                                                     <\/div>\r\n                                                 <\/div>\r\n                                             <\/div>");
         $("#accordionReferenceEntreprise").append( innerHTML );
     }
     function deleteCollapseAccordion(me) {
         $(me).closest('.accordion-item').remove();
     }

     function addRowMaterielNonRoulant() {
         var listeMaterielNonRoulant = ["Groupe électrogène",
             "Matériel audio-visuel",
             "Matériel de sonorisation",
             "Matériel topographique",
             "Matériel géotechnique",
             "Vibreur",
             "Outillage pose pompe",
             "Sonde",
             "Matériel de levage",
             "GPS",
             "Groupe électrogène 5 KVA minimum",
             "Compresseur 8 bars minimum",
             "Pompe immergée + accessoires",
             "Sonde de niveau élect",
             "Débitmètre (compteur, bac jaugé)",
             "Matériel de mesure in situ",
             "Appareil géophysique et accessoires",
             "Lot de tige de forage",
             "Masse de tige",
             "Lot de casing ou tubage perdu (PVC)",
             "Matériel de sécurité (lot)",
             "Atelier mécanique",
             "Matériel de cimentation",
             "Matériel de maçonnerie",
             "Bétonnière",
             "Marteau piqueur",
             "Marteau perforateur",
             "Jeux de moules",
             "Cuffat",
             "Pelle mécanique de moins de 60 cv",
             "Mini pelle sur chenille empâtement 0,90 à 1,20 m",
             "Matériel de plomberie",
             "Petit outillage de chantier (lots)",
             "Compacteur manuel",
             "Lot de matériel topographique (niveau de chantier, théodolite, + accessoires)",
             "Motopompe",
             "Compacteur pied de mouton au moins 130 cv",
             "Compacteur pied de mouton type JV 100",
             "Compresseur (7 bars)",
             "Groupe électrogène (15 KVA)",
             "Lot de matériel géotechnique de chantier et de densité",
             "Pompe d’épreuve",
             "Palan + chèvre ",
             "Manomètre sup 15 bars",
             "Etau",
             "Boite à filière complète",
             "Petit matériel de chantier (caisse à outils plombier. Lots)",
             "Aiguille vibrante",
             "Matériel de signalisation (lots)",
             "Clé à griffe (lot)",
             "Boite à filière complète",
             "Boite à filière complète",
             "Tir fort",
             "Central à béton",
             "Motopompe (5 m3/h minimum)"
         ];
         var options = '<option value=""></option>';
         for (var i = 0; i < listeMaterielNonRoulant.length; i++) {
             var opt = listeMaterielNonRoulant[i];
             options += '<option value="' + opt + '">' + opt + '</option>';
         }
         $("#dt_materiel_non_roulant").append([
             '<tr class="">',
             '<td class="rs">' +
             ' <select name="libelle_document_non_roulant[]" class="form-select border-success requis">' +
             options +

             +'</select>' +
             '</td>',
             '<td class="rs"><input type="file" disabled required name="fichier_document_non_roulant[]"> </td>',
             '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
             '</tr>',
         ].join());
     }

     /*
     $("#msform").validate({
             rules: {
                 identite: "required",
                 beneficiaire: "required",
                 pays: "required",
                 domaine: "required",
                 categorie: "required",
                 sous_domaine: "required",
                 confirmed: "required",
             },
             messages: {
                 identite: "Identité : est obligatoire.",
                 beneficiaire: "Bénéficiaire : est obligatoire",
                 pays: "Pays : est obligatoire.",
                 domaine: "Domaine : est obligatoireeeee",
                 categorie:"Catégorie : est obligatoireeee.",
                 sous_domaine: "Sous domaine : est obligatoire",
                 confirmed: "Votre confirmation : est requise.",

             },
             submitHandler: function( event, validator ) {
                 var btn_id = validator.originalEvent.submitter.id
                     save(btn_id)
             }
         });*/
     function save(btn_id) {
         var myform = $("#msform");

         // window.location=url;
         var id = $('#id').val() * 1;
         if (id > 0) {
             $.ajax({
                 url: '/demandesp002-storen/' + id,
                 type: "post",
                 async: false,
                 data: new FormData(myform[0]),
                 processData: false,
                 contentType: false,
                 dataType: "json",
                 success: function(data) {
                     if (data.status == 'success') {
                         (async () => {
                             alert("reclamation_modifiee_avec_succes", 'success');
                             fetch(window.location = '/demandes-lists');
                         })();

                     } else {
                         alert("La modification de la réclamation a échoué. Réessayer", 'warning');
                     }
                 },
                 error: function(data) {}
             });
         } else {
             // let url='/demandes-lists?procedure='+$('#procedure').val();
             $.ajax({
                 url: '/demandesp002-store',
                 type: "post",
                 async: false,
                 data: new FormData(myform[0]),
                 processData: false,
                 contentType: false,
                 dataType: "json",
                 success: function(data) {
                     if (data.status == 'success') {
                         alert("cest ok")
                         console.log(data.status);
                         (async () => {
                             await toast(
                                 "Votre Demande à bien été Soumise et en cours de traitement !",
                                 'success');
                             await sleep(1000);
                             //  window.location.replace("/demandes-lists");
                             fetch(window.location = '/demandes-lists');
                         })();
                         // window.location = '/demandes-lists';
                     } else {
                         toast("L'envoie de votre demande a échoué. Veuillez réessayer", type = 'warning')
                     }
                 },
                 error: function(data) {
                     showErrors(data);
                 }

             });
         }
     }

     function showErrors(data) {
         if (data && data.responseJSON && data.responseJSON.errors) {
             let errors = data.responseJSON.errors;
             for (let key in errors) {
                 if (errors[key] && Array.isArray(errors[key])) {
                     let error = errors[key][0];
                     toast(error, 'error');
                     return;
                 }
             }
         } else if (data && data.responseJSON && data.responseJSON.message) {
             if (data.responseJSON.message == "Unauthenticated.") {
                 toast(__("votre_session_est_expiree_veuillez_vous_reconnecter"), 'error');
                 return;
             }
             toast(data.responseJSON.message, 'error');
         } else if (data && data.errors) {
             let errors = data.errors;
             for (let key in errors) {
                 if (errors[key] && Array.isArray(errors[key])) {
                     let error = errors[key][0];
                     toast(error, 'error');
                     return;
                 }
             }

         }
     }

     function toast(message, type = 'info') {
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 5000,
             timerProgressBar: true,
             onOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
         });

         return Toast.fire({
             icon: type,
             title: message
         });
     }

     function sleep(ms) {
         return new Promise(resolve => setTimeout(resolve, ms));
     }

     function getSousDomaine() {
         if ($('#domaine').val().length > 0 && $('#categorie').val().length > 0) {
             $.ajax({
                 type: 'GET',
                 url: '/get-sous-domaine-by-categorie',
                 data: {
                     domaine: $('#domaine').val(),
                     categorie: $('#categorie').val()
                 },
                 dataType: 'json',
                 cache: false,
                 success: function(data) {
                     let select = $('#sousdomaine');
                     let options = get_values_from_select(data.sousDomaines, {
                         key: 'id',
                         value: 'libelle'
                     });
                     append_select_options(select, options);
                     document.getElementById("sousdomaine").multiple = true;
                 },
                 error: function() {
                     showErrors(data);
                 }
             });
         } else {

         }

     }


     function get_values_from_select(data, options, with_empty = true) {
         var options = options || {};
         var key = options.key || 'id';
         var value = options.value || 'valeur';
         var selected = options.selected || null;
         var returnValues = '';
         if (Array.isArray(data)) {
             $.each(data, function(i, item) {
                 returnValues += '<option value="' + item[key] + '"';
                 if (selected == item[key]) {
                     returnValues += ' selected >';
                 } else {
                     returnValues += ' > ';
                 }
                 returnValues += item[value] + '</option>';
             });
         } else {
             var attr = options.attr || 'values';
             $.each(data[attr], function(i, item) {
                 returnValues += '<option value="' + item[key] + '"';
                 if (selected == item[key]) {
                     returnValues += ' selected >';
                 } else {
                     returnValues += ' > ';
                 }
                 returnValues += item[value] + '</option>';
             });
         }
         if (with_empty) {
             return "<option></option>" + returnValues;
         }
         return returnValues;
     }

     function append_select_options($select, options, set_old_value = true) {
         Array.from($select).forEach(function(the_select) {
             var $the_select = $(the_select);
             var value = $the_select.val();
             $the_select.empty().append(options);
             setTimeout(() => {
                 if (set_old_value && value) {
                     $the_select.val(value);
                 }
             }, 300);
         });
     }
 </script>
