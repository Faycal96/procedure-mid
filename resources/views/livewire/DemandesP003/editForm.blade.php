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
                    <h5><strong>Autorisation donnant droit à mener la chasse </strong></h5>
                    <p> @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif</p>
                    <p>Les champs suivis d'étoile rouge sont obligatoires</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" action="{{route("demandesp003-update")}}"
                                enctype="multipart/form-data">

                                <input type="hidden" class="border-success" name="uuid" value='{{$demande->uuid}}'/>
                                @csrf

                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="personal"><strong>Identité du demandeur</strong></li>
                                    <li id="caracteristik"><strong>Pièces Jointes</strong></li>
                                    <li id="engagement"><strong>Engagement </strong></li>
                                    {{-- <li id="paiement"><strong>Paiement </strong></li> --}}

                                    {{-- <li id="confirm"><strong>Validation</strong></li> --}}
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Identité du demandeur <span style="color:red">
                                                *</span></h4>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold"> <strong>identité</strong> <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-control"
                                                    value="{{ $name }}" name="identite" placeholder="Nom et prenom"
                                                    required  />
                                            </div>
                                            <div class="col-6">
                                                <label class="siege_social fw-bold">Lieu de résidence/siège<span
                                                        style="color:red">
                                                        *</span></label>

                                                <select name="commune_id" id="selectMultiple" class="form-select"
                                                    required>
                                                    {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                    <option value="">Veuillez choisir une ville</option>
                                                    @foreach ( $communes as $com)
                                                    <option {{ $demande->commune_id == $com->uuid ? 'selected' : '' }} value="{{ $com->uuid }}">{{ $com->libelle }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="adresse fw-bold">Adresse Postale<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success form-input"
                                                    name="adresse_beneficiaire"
                                                    placeholder="Adresse ou numero de telephone" value="{{ $demande->adresse_beneficiaire }}" required />
                                            </div>
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Téléphone<span style="color:red">
                                                        *</span></label>
                                                <input type="text" name="telephone" class="form-control border-success"
                                                    placeholder="Telephone" value="{{ $telephone}}"   />
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-12">
                                                <label class="activite">Activités ménées<span
                                                        style="color: red">*</span></label>
                                                <textarea class="border-success" name="activite"
                                                    placeholder="Activités ménées"></textarea>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <input type="button" name="next" class="next action-button btn btn-success"
                                        value="Suivant" />
                                    <!-- Ajoutez ceci dans la première étape du formulaire -->
                                    <div class="error-message" style="color: red;"></div>

                                </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Pièces à Fournir</h2>

                                        <?php
                                                    $pathArme ='';
                                                    $pathPhoto ='';
                                                    $pathCnib='';
                                                    $pathDocArme='';

                                                    foreach ( $documents as $doc){
                                                        if($doc->libelle =="Permis de port d'arme")
                                                            $pathArme = $doc->chemin;
                                                        elseif($doc->libelle == "Photo d'identite")
                                                            $pathPhoto = $doc->chemin;
                                                        elseif($doc->libelle == "CNIB/PASSEPORT")
                                                            $pathCnib = $doc->chemin;
                                                        elseif($doc->libelle == "Document de l'arme")
                                                            $pathDocArme = $doc->chemin;
                                                       ?>
                                                        <a  class="text-success" target="_blank" href="{{ Storage::url($doc->chemin) }}"><b><i class="bi bi-file-earmark-pdf"></i>  {{$doc->libelle}}</b></a>
                                                         <br>
                                                       <?php }?>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">Permis de port d'arme  </label>
                                                <input type="file" class="form-control border-success"
                                                    name="permis_arme">

                                                    <input type="hidden"  value="{{ $pathArme  }}" class="form-control border-success"
                                                    name="current_permis_arme">
                                            </div>
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">Photo d'identité  </label>
                                                <input type="file" class="form-control border-success" name="photo">
                                                <input type="hidden"  value="{{ $pathPhoto }}" class="form-control border-success" name="current_photo" >
                                            </div>


                                        </div><br>

                                        <div class="row">
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">CNIB ou passeport  </label>
                                                <input type="file" class="form-control border-success"
                                                    name="cnib_passport">
                                                    <input type="hidden" value="{{ $pathCnib  }}" class="form-control border-success"
                                                    name="current_cnib_passport">
                                            </div>
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">Document de l'arme  </label>
                                                <input type="file" class="form-control border-success"
                                                    name="document_arme"  >

                                                    <input type="hidden" value="{{ $pathDocArme }}" class="form-control border-success"
                                                    name="current_document_arme">
                                            </div>

                                        </div>



                                    </div>
                                    <input type="button" class="previous action-button-previous" value="Retour" />
                                    <input type="button" class="next action-button" value="Suivant" />
                                </fieldset>

                                <fieldset>

                                    <div class="form-card">
                                        <h2 class="fs-title"> </h2>

                                        <div class="row">
                                            <input type="checkbox" id="confirmationBox" name="is_certified"
                                                class="required-checkbox   checkbox" {{ intval($demande->is_certified==1) ? 'checked' : ''}} value="1">
                                            <label for="confirmationBox"   class="checkbox-label" required>
                                                En cochant cette case, je certifie sur mon honneur que les informations
                                                renseignées sont correctes.
                                            </label>
                                        </div>

                                    </div>

                                    <input type="button" class="previous action-button-previous" value="Retour" />
                                    <input type="submit" class="next action-button" value="Valider" />
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

<script type="text/javascript">
    $('#selectMultiple').select2();
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

</script>
