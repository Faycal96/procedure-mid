<section id="about" class="about">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif



    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
                <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                    <h5><strong>Demande d'étude de sols et de fondations </strong></h5>
                   <p> @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif</p>
                    <p> Les champs suivis d'étoile rouge sont obligatoires    </p>
                    <div class="row">

                        <div class="col-md-12 mx-0">
                                    <form id="msform" method="POST" action="{{ route('demandesp001-update') }}" enctype="multipart/form-data" >
                                        <input type="hidden" class="border-success" name="uuid" value="{{ $demande }}"/>
                                        @csrf

                                <!-- progressbar -->
                                <ul id="progressbar" >
                                    <li class="active" id="personal"><strong>Identité du demandeur</strong></li>
                                <li id="caracteristik"><strong>Pièces Jointes</strong></li>
                                <li id="personal"><strong>Information du terrain</strong></li>
                                <li id="engagement"><strong>Engagement </strong></li>
                                <li id="paiement"><strong>Paiement </strong></li>
                                    {{-- <li id="paiement"><strong>Paiement </strong></li> --}}
                                    {{-- <li id="confirm"><strong>Validation</strong></li> --}}
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        {{-- <h4 class="fs-title">Identité du demandeur <span style="color:red">
                                            *</span></h4> --}}
    
                                        <div class="row">
                                            <div class="col">
                                                <label class="nom_societe fw-bold"> <strong>identité</strong> <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success" name="name" value="{{ $name }}"
                                                    placeholder="Nom et prenom" />
                                            </div>
                                            <div class="col">
                                                <label class="siege_social fw-bold">Province de résidence<span style="color:red">
                                                        *</span></label>
    
                                                <select name="province_id" id="provinces" class="form-select border-success" required>
                                                    {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                    <option value="">Veuillez choisir une Province</option>
                                                    @foreach ( $provinces as  $prov)
                                                     <option value="{{ $prov->uuid }}" >{{ $prov->libelle }}</option>
    
                                                    @endforeach
                                                </select>
    
    
                                            </div>
    
                                            <div class="col">
                                                <label class="siege_social fw-bold">Commune de résidence/siège<span style="color:red">
                                                        *</span></label>
    
                                                <select name="commune_id"  id="communes" class="form-select border-success" required>
                                                    {{-- <input type="text" placeholder="filtrer ici"> --}}
    
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="adresse fw-bold">Adresse email<span style="color: red">*</span></label>
                                                <input type="text" class="border-success" name="email" value="{{ $email }}"
                                                    placeholder="Adresse postal" required />
                                                {{-- <input type="email" class="border-success" name="email" value="{{ $email }}"
                                                    placeholder="adresse email" required/> --}}
                                            </div>
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Téléphone<span style="color:red">
                                                        *</span></label>
                                                <input type="text" name="telephone" class="border-success"   placeholder="Telephone" value="{{ $telephone}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button"  class="next action-button btn btn-success"
                                        value="Suivant" />
                                    <!-- Ajoutez ceci dans la première étape du formulaire -->
                                    <div class="error-message" style="color: red;"></div>
    
                                </fieldset>
    
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Pièces à Fournir</h2>
                                        <div class="row">
    
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">CNIB ou Passport<span style="color:red">
                                                    *</span></label>
                                                <input type="file" name="cnib" class="form-control border-success" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">PUH ou attestation d'attribution<span style="color:red">
                                                    *</span></label>
                                                <input type="file" name="puh" class="form-control border-success" required>
                                            </div>
                                        </div>
                                        <br>
    
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">Plan de masse ou d'implantion du batiment<span style="color:red">
                                                    *</span></label>
                                                <input type="file" name="plan" class="form-control border-success" required>
                                            </div>
    
                                            <div class="col-6">
                                                <label for="demande timbre" class="fw-bold">Vue en plan et coupe du batiment<span style="color:red">
                                                    *</span></label>
                                                <input type="file" name="coupe" class="form-control border-success" required>
                                            </div>
                                        </div>
    
                                    </div>
                                    <input type="button"   class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="button"   class="next action-button"
                                        value="Suivant" />
                                </fieldset>
    
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
    
                                        <div class="row">
                                            <div class="col">
                                                <label class="siege_social fw-bold">Type de construction<span style="color:red">
                                                        *</span></label>
                                                <select name="type_construction_id" id="typeConstructions" class="form-select border-success" required>
                                                    {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                    <option value="">Veuillez choisir le type de construction</option>
                                                    @foreach ( $typeConstructions as  $type)
                                                     <option value="{{ $type->uuid }}" >{{ $type->libelle }}</option>
    
                                                    @endforeach
                                                </select>
                                            </div>
    
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Y'a-t-il un sous sol ?<span style="color:red">
                                                        *</span></label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <span>Oui</span>
                                                            <input type="radio" name="is_underground" class="border-success"   value="Oui" />
                                                        </div>
                                                        <div class="col">
                                                            <span>Non</span>
                                                            <input type="radio" name="is_underground" class="border-success"   value="Non" />
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col">
                                                <label class="siege_social fw-bold">Usage<span style="color:red">
                                                        *</span></label>
    
                                                <select name="autre_usage_construction" class="form-select border-success" required>
                                                    {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                    <option value="">Veuillez choisir le type d'usage'</option>
                                                    @foreach ( $usages as  $usage)
                                                     <option value="{{ $usage->uuid }}" >{{ $usage->libelle }}</option>
    
                                                    @endforeach
                                                </select>
                                            </div>
    
                                            {{-- @if($name=='ZONGO Oliver') --}}
                                                <div class="col">
                                                    <label class="siege_social fw-bold">Preciser l'usage<span style="color:red">
                                                            *</span></label>
    
                                                    <input type="text" class="border-success" name="autre_usage_construction" placeholder="autre usage a préciser" />
                                                </div>
                                            {{-- @endif --}}
                                        </div>
    
                                        <div class="row">
                                            <div class="col">
                                                <label class="siege_social fw-bold">Superficie<span style="color:red">
                                                        *</span></label>
    
                                                <input type="text" class="border-success" name="superficie" placeholder="Superficie" />
                                            </div>
                                            <div class="col">
                                                <label class="adresse fw-bold">Secteur<span style="color: red">*</span></label>
                                                <input type="text" class="border-success" name="secteur" 
                                                    placeholder="Secteur" required />
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Numero de la Parcelle<span style="color:red">
                                                        *</span></label>
                                                <input type="text" name="numero_parcelle" class="border-success"   placeholder="Numero de parcelle"/>
                                            </div>
                                            <div class="col-6">
                                                <label class="adresse fw-bold">Numero du Lot<span style="color: red">*</span></label>
                                                <input type="text" class="border-success" name="lot" 
                                                    placeholder="Lot de la parcelle" required />
                                                {{-- <input type="email" class="border-success" name="email" value="{{ $email }}"
                                                    placeholder="adresse email" required/> --}}
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Numero de la section<span style="color:red">
                                                        *</span></label>
                                                <input type="text" name="section" class="border-success"  placeholder="Numero de section" />
                                            </div>
                                            <div class="col-6">
                                                <label class="adresse fw-bold">Zone<span style="color: red">*</span></label>
                                                <input type="text" class="border-success" name="zone" 
                                                    placeholder="Zone de la parcelle" required />
                                                {{-- <input type="email" class="border-success" name="email" value="{{ $email }}"
                                                    placeholder="adresse email" required/> --}}
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="boite_postale fw-bold">Batiment deja construit ?<span style="color:red">
                                                        *</span></label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <span>Oui</span>
                                                            <input type="radio" name="is_build" class="border-success"   value="Oui" />
                                                        </div>
                                                        <div class="col">
                                                            <span>Non</span>
                                                            <input type="radio" name="is_build" class="border-success"   value="Non" />
                                                        </div>
                                                    </div>
                                            </div>
    
                                            
                                        </div>
                                    </div>
    
                                    <input type="button"   class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="button"   class="next action-button"
                                        value="Suivant" />
    
                                </fieldset>
    
    
                                <fieldset>

                                    <div class="form-card">
                                        <h2 class="fs-title"> </h2>

                                        <div class="row">
                                            <input type="checkbox" id="confirmationBox" name="is_certified"
                                                class="required-checkbox  checkbox" {{ intval($demande->is_certified==1) ? 'checked' : ''}}  value="1" required>
                                            <label for="confirmationBox" class="checkbox-label">
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


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" ;></script> --}}

<script type="text/javascript">
    $('#selectMultiple').select2();
    $('#selectMultiplePays').select2();

</script>

<script type='text/javascript'>
    $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;


        // verification des checkbox
var verifyCheckboxDemandeur = function () {
  var checkboxes = $('.wish_payment_type .checkbox');
  var inputs = checkboxes.find('input');
  var first = inputs.first()[0];

  inputs.on('change', function () {
    this.setCustomValidity('');
  });

  first.setCustomValidity(checkboxes.find('input:checked').length === 0 ? 'Choose one' : '');
}
    // deuxieme liee aux dangers
var verifyCheckboxDemandeurDanger = function () {
  var checkboxes2 = $('.wish_payment_typeD .checkboxD');
  var inputs2 = checkboxes2.find('input');
  var first2 = inputs2.first()[0];

  inputs2.on('change', function () {
    this.setCustomValidity('');
  });

  first2.setCustomValidity(checkboxes2.find('input:checked').length === 0 ? 'Choose one' : '');
}

$('#submit1').click(verifyCheckboxDemandeur);
$('#submit2').click(verifyCheckboxDemandeurDanger);


$(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        $('#submit1').click();
        $('#submit2').click();

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
<script>
    $(document).ready(function () {
        $('#provinces').change(function () {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/get-communes/' + provinceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#communes').empty();
                        $.each(data, function (key, value) {
                            $('#communes').append('<option value="' + value.uuid + '">' + value.libelle + '</option>');
                        });
                    }
                });
            } else {
                $('#communes').empty();
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
