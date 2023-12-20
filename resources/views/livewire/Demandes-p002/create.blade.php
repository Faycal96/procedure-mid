 <style>
	 h1, p{
	   text-align:center;
	   margin-top: 20px;
	  }
	  .box{
	   text-align:center;
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
                    <h5><strong>Octroie d'agrement techniques en Eau et Assainissement</strong></h5>
                   <p> @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif</p>
                    <p>Les champs suivis d'etoile rouge sont obligatoires</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                                    <form id="msform" role="form" method="POST" action="{{route("demandesp002-store")}}"  enctype="multipart/form-data" >
                                        @csrf
                                  <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="personal"><strong>Fiche de renseignement administratif</strong></li>
                                    <li id="folder"><strong>Personne habilitée à representer l'entreprise</strong></li>
                                    <li id="personal"><strong>Pièces jointes</strong></li>
                                    <li id="personal"><strong>Participation effective du candidat à l'agrément</strong></li>
                                    <li id="engagement"><strong>Engagement </strong></li>
                                    <li id="paiement"><strong>Paiement </strong></li>

                                    {{-- <li id="confirm"><strong>Validation</strong></li> --}}
                                </ul>
                                <!-- fieldsets -->

                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Fiche de renseignement Administratif <span style="color:red">
                                            *</span></h4>
                                            <div class="row">
                                                    <label class="nom_societe fw-bold">Que voulez vous faire <span
                                                            style="color: red">*</span></label>
                                                <div class="col-4">
                                                    <input id="radio1" type="radio" value="Nouvel demande">
                                                    <label for="radio1">Nouvel demande</label>
                                                </div>
                                                <div class="col-4">
                                                    <input id="radio1" type="radio">
                                                    <label for="radio1">Renouvellement</label>
                                                </div>
                                                <div class="col-4">
                                                    <input id="radio1" type="radio">
                                                    <label for="radio1">Changement de catégorie</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 form-group">
                                                        <label>Type catégorie</label>
                                                        <select id="categorie" class="form-select border-success">
                                                            <option class="mb-3" value=""></option>
                                                            {{-- @foreach($procedures as $proc)
                                                                <option class="mb-3" value="{{$proc->libelle_court}}">{{$proc->libelle_long}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                </div>
                                            </div> <br>

                                            <div class="row">
                                                <div class="col-6 mb-3 form-group">
                                                    <label for="fullName" class="col-form-label">Nom de l'entreprise</label>
                                                    <input name="name" type="text" class="form-control border-success" id="fullName">
                                                </div>

                                                <div class="col-6 mb-3 form-group">
                                                    <label for="fullName" class="col-form-label">Raison sociale</label>
                                                    <input name="name" type="text" class="form-control border-success" id="fullName">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 mb-3 form-group">
                                                    <label for="fullName" class="col-form-label">Siège sociale</label>
                                                    <input name="name" type="text" class="form-control border-success" id="fullName">
                                                </div>

                                                <div class="col-6 mb-3 form-group">
                                                    <label for="fullName" class="col-form-label">Boîte Postale</label>
                                                    <input name="name" type="text" class="form-control border-success" id="fullName">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6 form-group">
                                                    <label class="col-form-label">Télephone<span style="color: red">*</span></label>
                                                    <input type="text" class="form-control border-success" />
                                                </div>

                                                <div class="col-6 form-group">
                                                    <label class="col-form-label">Fax<span style="color: red">*</span></label>
                                                    <input type="text" class="form-control border-success" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 form-group">
                                                    <label class="col-form-label">Email<span style="color: red">*</span></label>
                                                    <input type="email" class="form-control border-success" />
                                                </div>
                                                <div class="col-6 form-group">
                                                    <label class="col-form-label">Adresse Physique<span style="color: red">*</span></label>
                                                    <input type="text" class="form-control border-success" />
                                                </div>
                                            </div>

                                            {{-- <h4 class="fs-title">Beneficiaire <span style="color:red">
                                                *</span></h4>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="nom_societe fw-bold" >Moi Même</label>
                                                    <input type="radio" value="Moi même" class="checkbox"  name="beneficiaire" />
                                                </div>
                                                <div class="col-3">
                                                    <label class="siege_social fw-bold ">Autre Personne</label>
                                                    <input type="radio" value="Autre personne" name="beneficiaire"/>
                                                </div>
                                                  @if($errors->has('beneficiaire'))
                                                      <p class="alert alert-danger">{{ $errors->first('beneficiaire') }}</p>
                                                  @endif
                                            </div> --}}

                                    </div>
                                    <button type="button" name="next" class="next action-button btn btn-success"
                                         id="next_idetnite" >Suivant</button>
                                    <!-- Ajoutez ceci dans la première étape du formulaire -->
                                    <div class="error-message" style="color: red;"></div>

                                </fieldset>
                                <fieldset>
                                    <div class="form-card mb-3">
                                        <h2 class="fs-title">Personne habilitée à representer l'entreprise</h2>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Nom <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Prénom(s) <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Qualité <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Adresse <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">N° employeur (CNSS)<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                        </div>

                                    </div>
                                    <button type="button" name="previous" class="previous action-button-previous"
                                        >Retour</button>
                                    <button type="button"   name="make_payment" id="next_piece" class="next action-button"
                                        >Suivant</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Pièces jointes</h2>

                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="col-form-label fw-bold">Statut légalisée de la société<span style="color: red">*</span></label>
                                                <input type="file" class="form-control border-success" />
                                            </div>

                                            <div class="col-6 form-group">
                                                <label class="col-form-label fw-bold">RCCM / RSCPM<span style="color: red">*</span></label>
                                                <input type="file" class="form-control border-success" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="col-form-label fw-bold">IFU / Récipissé<span style="color: red">*</span></label>
                                                <input type="file" class="form-control border-success" />
                                            </div>

                                            <div class="col-6 form-group">
                                                <label class="col-form-label fw-bold">Document chiffre d'affaire<span style="color: red">*</span></label>
                                                <input type="file" class="form-control border-success" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Ancient agrément <span
                                                        style="color: red">*</span></label>
                                                <input type="file" class="border-success form-control" />
                                            </div>
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Liste matériel <span
                                                        style="color: red">*</span></label>
                                                <input type="file" class="border-success form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="adresse fw-bold">Liste personnel<span style="color: red">*</span></label>
                                                <input type="file" class="border-success form-control" />
                                            </div>
                                        </div>

                                         <hr>
                                        <h2 class="fs-title">Autres documents</h2>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table datatable table-bordered table-striped datatable-table" id="dt_cv">
                                                    <thead class="dst-form-thead">
                                                        <tr>
                                                            <th colspan="3" style="text-align: center">CV Personnel</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Sujet du document <span style="color:red">*</span></th>
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
                                                <table class="table datatable table-bordered table-striped datatable-table" id="dt_diplome">
                                                    <thead class="dst-form-thead">
                                                        <tr>
                                                            <th colspan="3" style="text-align: center">Diplôme du personnel</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Sujet du document <span style="color:red">*</span></th>
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
                                    <button type="button" name="previous" class="previous action-button-previous">Retour</button>
                                    <Button type="button" name="make_payment" id="next_domaine" class="next action-button">Suivant</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Participation effective du candidat à l'agrément</h2>

                                        <div class="row">
                                            <div class="col-4">
                                                <label for="domaine" class="siege_social">Localisation
                                                    <span style="color:red">*</span></label>
                                                    <select name="domaine" id="domaine" class="form-select border-success">
                                                        <option value="">Veuillez choisir la localisation</option>
                                                    </select>

                                            </div>
                                            <div class="col-4">
                                               <label for="categorie" class="siege_social">Désignation de travaux
                                                    <span style="color:red">*</span></label>
                                                <select name="categorie" id="categorie" class="form-select border-success">
                                                    <option value="">Veuillez choisir la désignation des travaux</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                               <label for="sousdomaine" class="nom_societe">Maitrise d'ouvrage
                                                    <span style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="col-form-label">Date début<span style="color: red">*</span></label>
                                                <input type="date" class="form-control border-success" />
                                            </div>

                                            <div class="col-6 mb-3 form-group">
                                                <label for="fullName" class="col-form-label">Date fin</label>
                                                <input type="date" class="form-control border-success" id="fullName">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Nature<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control" />
                                            </div>
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Pourcentage Montant total <span
                                                        style="color: red">*</span></label>
                                                <input type="number" class="border-success form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Condition <span
                                                        style="color: red">*</span></label>
                                                <textarea name="" id="" cols="30" rows="10" style="border: solid green 2px"></textarea>
                                                {{-- <input type="text" class="border-success form-control" /> --}}
                                            </div>
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Observation <span
                                                        style="color: red">*</span></label>
                                                <textarea name="" id="" cols="30" rows="10" style="border: solid green 2px"></textarea>
                                                {{-- <input type="text" class="border-success form-control" /> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="previous" class="previous action-button-previous">Retour</button>
                                    <Button type="button" name="make_payment" id="next_domaine" class="next action-button">Suivant</button>
                                </fieldset>

                                <fieldset>

                                    <div class="form-card">
                                        <h2 class="fs-title">Certification et engagement  </h2>

                                        <div class="row">
                                            <input type="checkbox" id="confirmationBox" name="confirmed"
                                                class="required-checkbox   checkbox" value="Valider">
                                            @if($errors->has('confirmed'))
                                                        <p class="alert alert-danger">{{ $errors->first('confirmed') }}</p>
                                                    @endif
                                            <label for="confirmationBox" class="checkbox-label ">
                                                En cochant cette case, je certifie sur mon honneur que les informations
                                                renseignées sont correctes.
                                            </label>
                                        </div>

                                    </div>

                                    {{-- <input type="button" name="previous" class="previous action-button-previous"
                                        value="Retour" />

                                     <button type="submit" class="action-button" id="btn_send">Valider</button> --}}
                                     <button type="button" name="previous" class="previous action-button-previous"
                                     >Retour</button>
                                 <button type="button"   name="make_payment" id="next_piece" class="next action-button"
                                     >Suivant</button>
                                </fieldset>


                                <fieldset>
                                    <form action="">
                                    <div class="form-card">
                                        <h4 class="fs-title">Paiement <span style="color:red">
                                            *</span></h4>
                                            <label for="demande timbre" class="fw-bold">Moyens de Paiement<span style="color:red">
                                                    *</span></label>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="nom_societe fw-bold" >ORANGE</label>
                                                <input id="radio1" type="radio" value="1" class="checkbox"  name="moyen" />
                                            </div>
                                            <div class="col-3">
                                                <label class="siege_social fw-bold ">MOOV</label>
                                                <input id="radio2" type="radio" value="0"  name="moyen"/>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div id="moyenP1">
                                                <label >  La somme à payer est de 1500Frs: Taper *144*4*6*1500# pour obtenir le OTP </label>

                                            </div>
                                            <div id="moyenP2">
                                                <label >  La somme à payer est de 1500Frs: Taper *555*4*6*1500# pour obtenir le OTP </label>

                                            </div>
                                        <div class="col-6">
                                                <label class="boite_postale fw-bold">Téléphone<span style="color:red">
                                                        *</span></label>
                                                <input type="number" name="numero" style="width: 50%;" class="border-success form-control"   placeholder="Telephone" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">OTP<span style="color:red">
                                                        *</span></label>
                                                <input type="number" name="otp"   style="width: 50%;" class="border-success form-control"   placeholder="otp" required />
                                            </div>
                                        </div>



                                    </div>
                                    {{-- <input type="button"  class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="submit"   class="next action-button"
                                        value="Valider" /> --}}

                                        <input type="button" name="previous" class="previous action-button-previous"
                                        value="Retour" />

                                     <button type="submit" class="action-button" id="btn_send">Valider</button>

                                    <!-- Ajoutez ceci dans la première étape du formulaire -->
                                    <div class="error-message" style="color: red;"></div>
                                    </form>
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
<script src="{{asset('js/sweetalert2.js') }}"></script>
<script type="text/javascript">
    //intitialisation du tableau des autres documents
    $(function () {
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

<script type='text/javascript'>
    $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function () {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // Vérifiez si tous les champs obligatoires dans le formulaire actuel sont remplis
        var isValid = true;
        current_fs.find('input[required]').each(function () {
            //if ($(this).val() === "") {
            if (!$(this).val().trim()) {
                isValid = false;
                $(this).addClass("error");
            } else {
                $(this).removeClass("error");
            }
        });

        // Vérifiez si la case de confirmation est cochée
        current_fs.find('checkbox[required]').each(function () {
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
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // pour faire apparaître l'animation du champ
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 600
            });
        }
    });


$(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$(".submit").click(function(){
    return false;
})

//conrol paiement
$("div#moyenP1").hide();
$("div#moyenP2").hide();

jQuery('input[name=moyen]:radio').click(function(){
		$("div#moyenP1").hide();
		$("div#moyenP2").hide();
		var divId = jQuery(this).val();
        if(divId * 1 == 1){
            $("div#moyenP1").show()
        }else{
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
            '<td class="rs">'+
               '<input type="text" name="libelle_document_CV[]" class="border-success form-control" />' +
             '</td>',
            '<td class="rs"><input type="file" class="border-success form-control requis" required name="fichier_document_CV[]"> </td>',
            '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
            '</tr>',
                ].join()
                );
    }

    function deleteRowCV(me) {
         $(me).closest('tr').remove();
    }
    
  function addRowDiplome() {
        $("#dt_diplome").append([
            '<tr class="">',
            '<td class="rs">'+
               '<input type="text" name="libelle_document_diplome[]" class="border-success form-control" />' +
             '</td>',
            '<td class="rs"><input type="file" class="border-success form-control requis" required name="fichier_document_diplome[]"> </td>',
            '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
            '</tr>',
                ].join()
                );
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
                        "Motopompe (5 m3/h minimum)"]; 
    var options = '<option value=""></option>';
    for(var i = 0; i < listeMaterielNonRoulant.length; i++) {
        var opt = listeMaterielNonRoulant[i];
        options += '<option value="' + opt + '">' + opt + '</option>';
    } 
        $("#dt_materiel_non_roulant").append([
            '<tr class="">',
            '<td class="rs">'+
               ' <select name="libelle_document_non_roulant[]" class="form-select border-success requis">' + options+
                  
               + '</select>'+
             '</td>',
            '<td class="rs"><input type="file" class="border-success form-control requis" required name="fichier_document_non_roulant[]"> </td>',
            '<td><a class="btn btn-xs" data-id="0" onclick="deleteRowCV(this)" title="Supprimer la ligne"> <i class="fa fa-trash text-danger"></i></a></td>',
            '</tr>',
                ].join()
                );
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
                    url: '/demandesp002-storen/'+id,
                    type: "post",
                    async: false,
                    data: new FormData(myform[0]),
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.status == 'success') {
                            (async () => {
                                alert("reclamation_modifiee_avec_succes", 'success');
                                fetch(window.location = '/demandes-lists');
                            })();

                        } else {
                            alert("La modification de la réclamation a échoué. Réessayer", 'warning');
                        }
                    },
                    error: function (data) {
                    }
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
                    success: function (data) {
                        if (data.status == 'success') {
                            alert("cest ok")
                            console.log(data.status);
                            (async () => {
                                await toast("Votre Demande à bien été Soumise et en cours de traitement !", 'success');
                                await sleep(1000);
                               //  window.location.replace("/demandes-lists");
                                fetch(window.location = '/demandes-lists');
                            })();
                           // window.location = '/demandes-lists';
                        }else {
                            toast("L'envoie de votre demande a échoué. Veuillez réessayer", type = 'warning')
                        }
                    },
                    error: function (data) {
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
        }
        else if(data && data.responseJSON && data.responseJSON.message){
            if(data.responseJSON.message =="Unauthenticated."){
			toast(__("votre_session_est_expiree_veuillez_vous_reconnecter"), 'error');
				return;
            }
            toast(data.responseJSON.message, 'error');
        }
        else if(data && data.errors){
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
    if( $('#domaine').val().length > 0 && $('#categorie').val().length>0){
        $.ajax({
        type: 'GET',
        url: '/get-sous-domaine-by-categorie',
        data: {
            domaine: $('#domaine').val(),
            categorie: $('#categorie').val()
        },
        dataType: 'json',
        cache: false,
        success: function (data) {
             let select = $('#sousdomaine');
             let options = get_values_from_select(data.sousDomaines, {key: 'id', value: 'libelle'});
             append_select_options(select, options);
             document.getElementById("sousdomaine").multiple = true; 
        },
        error: function () {
           showErrors(data);
        }
    });
    }else{
        
    }
    
}

  
function get_values_from_select(data, options, with_empty = true) {
    var options = options || {};
    var key = options.key || 'id';
    var value = options.value || 'valeur';
    var selected = options.selected || null;
    var returnValues = '';
    if (Array.isArray(data)) {
        $.each(data, function (i, item) {
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
        $.each(data[attr], function (i, item) {
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
    Array.from($select).forEach(function (the_select) {
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
