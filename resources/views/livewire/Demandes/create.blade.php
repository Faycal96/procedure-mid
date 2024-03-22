<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                <h5><strong>Demande d'étude de sols et de fondations</strong></h5>
                <div class="col-6 offset-3"> @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">

                        <h5 class="alert-heading">{{session('success')}}</h5>

                    </div>

                    <script>
                        setTimeout(function() {
                            document.querySelector('.alert.alert-success').style.display = 'none';
                        }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
                    </script>
                @endif</div>
                <p style="color: red">Les champs suivis d'étoile rouge sont obligatoires</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform"  method="POST" action="{{route('demandesp001-store')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="personal"><strong>Identité du demandeur</strong></li>
                                <li id="caracteristik"><strong>Pièces Jointes</strong></li>
                                <li id="personal"><strong>Information du terrain</strong></li>
                                <li id="engagement"><strong>Engagement </strong></li>
                                <li id="paiement"><strong>Récapitulatif </strong></li>
                                {{--<li id="confirm"><strong>Validation</strong></li>--}}
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    {{-- <h4 class="fs-title">Identité du demandeur <span style="color:red">
                                        *</span></h4> --}}

                                    <div class="row">
                                        <div class="col">
                                            <label class="nom_societe fw-bold"> <strong>NIP / Passeport</strong> <span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="border-success" id="nip" name="nip" value="{{ $nip }}"
                                                placeholder="Nom et prenom" readonly/>
                                        </div>
                                        <div class="col">
                                            <label class="siege_social fw-bold">Province de résidence<span style="color:red">
                                                    *</span></label>

                                            <select name="province_id" id="provinces" class="form-select border-success" required=true>
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
                                            <select name="commune_id"  id="communes" class="form-select border-success" required=true>
                                                <option value="">Veuillez choisir la commune</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="adresse fw-bold">Adresse email<span style="color: red">*</span></label>
                                            <input type="text" class="border-success" name="email" value="{{ $email }}"
                                                placeholder="Adresse postal" required id="email"/>
                                            {{-- <input type="email" class="border-success" name="email" value="{{ $email }}"
                                                placeholder="adresse email" required/> --}}
                                        </div>
                                        <div class="col-6">
                                            <label class="boite_postale fw-bold">Téléphone<span style="color:red">
                                                    *</span></label>
                                            <input type="text" name="telephone" class="border-success" id="telephone" placeholder="Téléphone" value="{{ $telephone}}" />
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
                                            <input type="file" name="cnib" id="cnib" class="form-control border-success" required >
                                        </div>
                                        <div class="col-6">
                                            <label for="demande timbre" class="fw-bold">PUH ou attestation d'attribution<span style="color:red">
                                                *</span></label>
                                            <input type="file" name="puh" id="puh" class="form-control border-success" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="demande timbre" class="fw-bold">Plan de masse ou d'implantion du batiment<span style="color:red">
                                                *</span></label>
                                            <input type="file" name="plan" id="plan" class="form-control border-success" required>
                                        </div>

                                        <div class="col-6">
                                            <label for="demande timbre" class="fw-bold">Vue en plan et coupe du batiment<span style="color:red">
                                                *</span></label>
                                            <input type="file" name="coupe" id="coupe" class="form-control border-success" required>
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
                                            <select name="type_construction_id" id="typeConstructions" class="form-select border-success" required=true>
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
                                                        <input type="radio" name="is_underground" id="is_underground" class="border-success" value="Oui" />
                                                    </div>
                                                    <div class="col">
                                                        <span>Non</span>
                                                        <input type="radio" name="is_underground" id="is_underground" class="border-success" value="Non" />
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="siege_social fw-bold">Superficie / m²<span style="color:red">
                                                    *</span></label>

                                            <input type="text" class="border-success" name="superficie" id="superficie" placeholder="Superficie en m²" required=true/>
                                        </div>
                                        <div class="col">
                                            <label class="adresse fw-bold">Secteur<span style="color: red">*</span></label>
                                            <input type="text" class="border-success" name="secteur" id="secteur" 
                                                placeholder="Secteur" required=true />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="boite_postale fw-bold">Numero de la Parcelle<span style="color:red">
                                                    *</span></label>
                                            <input type="text" name="numero_parcelle" id="numero_parcelle" class="border-success" placeholder="Numero de parcelle" required=true/>
                                        </div>
                                        <div class="col-6">
                                            <label class="adresse fw-bold">Numero du Lot<span style="color: red">*</span></label>
                                            <input type="text" class="border-success" name="lot" id="lot"
                                                placeholder="Lot de la parcelle" required=true />
                                            {{-- <input type="email" class="border-success" name="email" value="{{ $email }}"
                                                placeholder="adresse email" required/> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="boite_postale fw-bold">Numero de la section<span style="color:red">
                                                    *</span></label>
                                            <input type="text" name="section" id="section" class="border-success" placeholder="Numero de section" required=true/>
                                        </div>
                                        <div class="col-6">
                                            <label class="adresse fw-bold">Zone<span style="color: red">*</span></label>
                                            <input type="text" class="border-success" name="zone" id="zone"
                                                placeholder="Zone de la parcelle" required=true />
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
                                                        <input type="radio" name="is_build" id="is_build" class="border-success"   value="Oui" />
                                                    </div>
                                                    <div class="col">
                                                        <span>Non</span>
                                                        <input type="radio" name="is_build" id="is_build" class="border-success"   value="Non" />
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="siege_social fw-bold">Type d'usage<span style="color:red">
                                                    *</span></label>

                                            <select name="usage_construction" id="usage_construction" class="form-select border-success">
                                                {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                <option value="">Veuillez choisir le type d'usage</option>
                                                @foreach ( $usages as  $usage)
                                                 <option value="{{ $usage->uuid }}" required=true>{{ $usage->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        {{-- @if($name=='ZONGO Oliver') --}}
                                            <div class="col-6" id="autreUsage" style="display:none">
                                                <label class="siege_social fw-bold">Preciser l'usage<span style="color:red">
                                                        *</span></label>
                                                <input type="text" class="border-success" name="autre_usage_construction" id="autre_usage_construction" placeholder="autre usage a préciser"/>
                                            </div>
                                        {{-- @endif --}}
                                    </div>
                                </div>

                                <input type="button"   class="previous action-button-previous"
                                    value="Retour" />
                                <input type="button"   class="next action-button"
                                    value="Suivant" />

                            </fieldset>


                            <fieldset>

                                <div class="form-card">
                                    <h2 class="fs-title">  </h2>

                                    <div class="row">
                                        <input type="checkbox" id="confirmationBox" name="is_certified"
                                            class="required-checkbox   checkbox" value="1" required>
                                        <label for="confirmationBox" class="checkbox-label">
                                            En cochant cette case, je certifie sur mon honneur que les informations
                                            renseignées sont correctes.
                                        </label>
                                    </div>

                                </div>

                                <input type="button"  class="previous action-button-previous"
                                    value="Retour" />
                                    <input type="button" class="next action-button" id="recap"
                                    value="Suivant" />
                                    {{-- <input type="submit"   class="next action-button"
                                    value="Valider" /> --}}
                            </fieldset>

                            <fieldset>
                            <p style="color: red;"> Veuillez vérifier vos informations minitieusement avant la validation</p>
                                <div class="form-card">
                                    <h2 class="fs-title">Identité du Demandeur</h2>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Identité : </label>
                                            <input type="text" name="recapNom" id="recapNom" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Province : </label>
                                            <input type="text" name="recapProvince" id="recapProvince" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Commune : </label>
                                            <input type="text" name="recapCommune" id="recapCommune" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Email : </label>
                                            <input type="text" name="recapMail" id="recapMail" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Téléphone : </label>
                                            <input type="text" name="recapTel" id="recapTel" disabled/>
                                        </div>
                                        <div class="col-6">
                                            
                                            
                                        </div>
                                    </div>
                                    <hr>
                                    <h2 class="fs-title">Pièces jointes</h2>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">CNIB / Passeport : </label>
                                            <input type="text" name="recapCnib" id="recapCnib" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">PUH / Attestation d'attribution : </label>
                                            <input type="text" name="recapPuh" id="recapPuh" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Plan : </label>
                                            <input type="text" name="recapPlan" id="recapPlan" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Coupe : </label>
                                            <input type="text" name="recapCoupe" id="recapCoupe" disabled/>
                                        </div>
                                    </div>

                                    <hr>
                                    <h2 class="fs-title">Informations du terrain</h2>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Type Construction : </label>
                                            <input type="text" name="recapTypeConstruction" id="recapTypeConstruction" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Sous Sol : </label>
                                            <input type="text" name="recapSousSol" id="sousSol" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Usage : </label>
                                            <input type="text" name="recapUsageConstruction" id="recapUsageConstruction" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Autre type d'usage : </label>
                                            <input type="text" name="recapAutreUsage" id="recapAutreUsage" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Superficie : </label>
                                            <input type="text" name="recapSuperficie" id="recapSuperficie" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Secteur : </label>
                                            <input type="text" name="recapSecteur" id="recapSecteur" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Numéro parcelle : </label>
                                            <input type="text" name="recapNumeroParcelle" id="recapNumeroParcelle" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Lot : </label>
                                            <input type="text" name="recapLot" id="recapLot" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Section : </label>
                                            <input type="text" name="recapSection" id="recapSection" disabled/>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Zone : </label>
                                            <input type="text" name="recapZone" id="recapZone" disabled/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Y'a t-il un batiment : </label>
                                            <input type="text" name="recapIsBuild" id="recapIsBuild" disabled/>
                                        </div>
                                        
                                    </div>
                                </div>

                                <input type="button"  class="previous action-button-previous"
                                    value="Retour" />
                                <input type="submit"   class="next action-button"
                                    value="Valider" />
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section><!-- End About Section -->


{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" ;></script>

<script type="text/javascript">
$('#selectMultiple').select2();
</script>

<script>
    $(document).ready(function(){
      $("#recap").click(function(){
        var nom = $("#nip").val();
        var email = $("#email").val();
        var autre = $("#autre_usage_construction").val();
        var superficie = $("#superficie").val();
        var secteur = $("#secteur").val();
        var numeroParcelle = $("#numero_parcelle").val();
        var lot = $("#lot").val();
        var section = $("#section").val();
        var zone = $("#zone").val();
        var isBuild = $("#is_build").val();
        var telephone = $("#telephone").val();
        var province = $("#provinces").find('option:selected').text();
        var commune = $("#communes").find('option:selected').text();
        var typConstruction = $("#typeConstructions").find('option:selected').text();
        var usageConstruction = $("#usage_construction").find('option:selected').text();
        var sousSol = $("input[type=radio][name=is_underground]:checked").val();
        var cnib = $('#cnib')[0].files[0].name;
        var puh = $('#puh')[0].files[0].name;
        var plan = $('#plan')[0].files[0].name;
        var coupe = $('#coupe')[0].files[0].name;
        
        $('input[name=recapNom]').val(nom);
        $('input[name=recapProvince]').val(province);
        $('input[name=recapCommune]').val(commune);
        $('input[name=recapMail]').val(email);
        $('input[name=recapTel]').val(telephone);
        $('input[name=recapCnib]').val(cnib);
        $('input[name=recapPuh]').val(puh);
        $('input[name=recapPlan]').val(plan);
        $('input[name=recapCoupe]').val(coupe);
        $('input[name=recapSousSol]').val(sousSol);
        $('input[name=recapTypeConstruction]').val(typConstruction);
        $('input[name=recapUsageConstruction]').val(usageConstruction);
        $('input[name=recapAutreUsage]').val(autre);
        $('input[name=recapSuperficie]').val(superficie);
        $('input[name=recapSecteur]').val(secteur);
        $('input[name=recapNumeroParcelle]').val(numeroParcelle);
        $('input[name=recapLot]').val(lot);
        $('input[name=recapSection]').val(section);
        $('input[name=recapZone]').val(zone);
        $('input[name=recapIsBuild]').val(isBuild);
      });
    });
</script>

<script>
    $("select").change(function() {
    
    let option = '';
    
    $("select option:selected").each(function() {
      option = $( this ).text();
    });
    
    if(option == 'AUTRES'){
      $('#autreUsage').css('display','block')
    }else{
      $('#autreUsage').css('display','none')
    }
    
})
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

<script type='text/javascript'>
var myLink = document.querySelector('a[href="#"]');
myLink.addEventListener('click', function(e) {
  e.preventDefault();
});
</script>