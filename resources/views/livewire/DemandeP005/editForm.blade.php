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
                    <h5><strong>Permis de circulation de bois et du charbon de bois</strong></h5>
                   <p> @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                   </p>
                    <p>Les champs suivis d'etoile rouge sont obligatoires</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" action="{{route('demandesp005-update')}}" enctype="multipart/form-data" >
                                        @csrf
                                <input type="hidden" class="border-success" name="uuid" value='{{$demande->uuid}}'/>


                                <!-- progressbar -->
                                <ul id="progressbar"  >
                                    <li class="active" id="personal"><strong>Identité du demandeur</strong></li>
                                    <li id="personal"><strong>Information sur le produit</strong></li>
                                    <li id="caracteristik"><strong>Informations relatives au transport</strong></li>
                                    <li id="engagement"><strong>Engagement </strong></li>

                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h4 class="fs-title">Identité du demandeur <span style="color:red">*</span></h4>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold"> <strong>Identité du demandeur</strong> <span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="form-control border-success" value="{{ $name }}"  name="identite"
                                                    placeholder="Identité du demandeur" />
                                            </div>
                                            <div class="col-6">
                                                <label class="siege_social fw-bold">Localité du demandeur<span style="color:red">
                                                        *</span></label>
                                                {{-- <input type="text" class="form-control border-success" name="adresse_demandeur" placeholder="Adresse du demandeur"> --}}
                                                <select name="commune_id" id="selectMultiple" class="form-select border-success"
                                                required>
                                                {{-- <input type="text" placeholder="filtrer ici"> --}}
                                                <option value="">Veuillez choisir une ville</option>
                                                @foreach ( $communes as $com)
                                                <option {{ $demande->commune_id == $com->uuid ? 'selected' : ''  }} value="{{ $com->uuid }}">{{ $com->libelle }}</option>
                                                @endforeach


                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button btn btn-success"
                                        value="Suivant" />
                                    <!-- Ajoutez ceci dans la première étape du formulaire -->
                                    <div class="error-message" style="color: red;"></div>

                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Information sur le produit</h2>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Nature du produit<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="form-control border-success" value="{{ $demande->nature_produit }}" name="nature_produit"
                                                    placeholder="Nature du produit" />
                                            </div>
                                            <div class="col-6">
                                                <label class="pays_residence fw-bold">Quantité du produit<span style="color:red">
                                                        *</span></label>
                                                <input type="text" class="form-control border-success" value="{{ $demande->quantite_produit }}" name="quantite_produit" placeholder="Quantite du produit" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Origine du produit<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="form-control border-success" value="{{ $demande->origine_produit }}" name="origine_produit"
                                                    placeholder="Origine du produit" />
                                            </div>
                                            <div class="col-6">
                                                <label class="pays_residence fw-bold">Destination du produit<span style="color:red">
                                                        *</span></label>
                                                <input type="text" class="form-control border-success" value="{{ $demande->destination_produit }}" name="destination_produit" placeholder="Destination du produit" />
                                            </div>
                                        </div>


                                    </div>
                                    <input type="button"   class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="button"    class="next action-button"
                                        value="Suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Informations relatives au transport</h2>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe  fw-bold">Moyen de transport<span
                                                        style="color: red">*</span></label>
                                                <input type="text" class="border-success" value="{{ $demande->moyen_transport }}" name="moyen_transport"
                                                    placeholder="Moyen de transport" />
                                            </div>
                                            <div class="col-6">
                                                <label class="pays_residence fw-bold">Immatriculation<span style="color:red">
                                                        *</span></label>
                                                <input type="text" name="immatriculation"  value="{{ $demande->immatriculation }}" class="form-control border-success" placeholder="Immantriculation du vehicule" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label class="nom_societe fw-bold">Duree du transport</label>
                                                <input type="text" class="form-control border-success" value="{{ $demande->duree_parcours }}" name="duree_parcours"
                                                    placeholder="Duree du transport" />
                                            </div>
                                            <div class="col-6"></div>
                                        </div>

                                    </div>
                                    <input type="button"   class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="button"   class="next action-button"
                                        value="Suivant" />
                                </fieldset>
                                <fieldset>

                                    <div class="form-card">
                                        <h2 class="fs-title"></h2>

                                        <div class="row">
                                            <input type="checkbox" id="confirmationBox" name="is_certified"
                                                class="required-checkbox checkbox" {{ intval($demande->is_certified==1) ? 'checked' : ''}} value="1">
                                            <label for="confirmationBox" class="checkbox-label">
                                                En cochant cette case, je certifie sur mon honneur que les informations
                                                renseignées sont correctes.
                                            </label>
                                        </div>

                                    </div>

                                    <input type="button"   class="previous action-button-previous"
                                        value="Retour" />
                                    <input type="submit"   class="next action-button"
                                        value="Suivant" />
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
