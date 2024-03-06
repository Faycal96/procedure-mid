

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                <h5><strong>{{ $procedure->libelle_long }}</strong></h5>
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
                {{-- <p>Les champs suivis d'étoile rouge sont obligatoires</p> --}}
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform"  method="POST" action="{{route('demandesp0012-store')}}" enctype="multipart/form-data">
                            @csrf
                            <!-- progressbar -->
                            
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card" style="color:#443a3a">
                                    <h4>Chers usagers,</h4>
                                    <h4>Nous souhaitons vous informer que les demandes pour la saison en cours sont désormais closes.</h4>
                                    {{-- <h4>Nous avons reçu un nombre exceptionnel de demandes et sommes reconnaissants de l\'enthousiasme et du soutien de notre communauté.</h4>
                                    <h4>Nous tenons à exprimer notre gratitude envers tous ceux qui ont manifesté leur intérêt et nous espérons vous accueillir lors des prochaines saisons.</h4>
                                    <h4>Restez à l\'écoute pour les mises à jour futures et d'autres opportunités passionnantes.</h4> --}}
                                    <h4>Rendez-vous à la prochaines saison prévu pour 
                                        <span style="color:blue !important"> {{ date('M-Y',strtotime($procedure->session_fin.' +1 year')) }}.</span>
                                    </h4>
                                    <h4>Merci de votre compréhension.</h4>
                                    <h4>Cordialement,</h4>
                                    <h4>Le MID</h4>
                                </div>
                                <a href="/"  class="next action-button btn btn-success"> Retour </a>
                                {{-- <input type="button"  class="next action-button btn btn-success"
                                    value="Suivant" /> --}}
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
