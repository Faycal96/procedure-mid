<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <title>Invoice Template</title>
        <link href="{{ public_path('css/quittance/modern-normalize.css') }}" rel="stylesheet">
        <link href="{{ public_path('css/quittance/web-base.css') }}" rel="stylesheet">
        <link href="{{ public_path('css/quittance/invoice.css') }}" rel="stylesheet">

        <link href="{{ public_path('css/quittance/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="web-container">
      
            <div class="pdf-header">
              <div class="pdf-header-left">
                <div>Ministère des Infrastructures et du Désenclavement</div>
                <div style="margin-left: 100px">-------------</div>
                <div style="margin-left: 50px">Secrétariat Général</div>
                <div style="margin-left: 100px">-------------</div>
                <div>Direction Générale des Études et des Statistiques Sectorielles</div><br />
              </div>
      
              <div class="pdf-header-right">
                <div style="margin-left: 10">BURKINA FASO</div>
                <div style="margin-left: 30"></div>
                <div>Unité-Progrès-Justice</div>
              </div>
            </div><br><br><br><br>
      
            <!-- <div class="logo-container">
              
              <img
                style="height: 18px"
                src="https://app.useanvil.com/img/email-logo-black.png"
              />
            </div> -->
            <div class="center">
              <strong><u>Quittance de paiement</u></strong> <br><br> Pour la demande d'agrément technique de catégorie <strong>{{$demande->Categorie->code}}</strong><br/>   
            </div><br><br><br>
            <div>
            Quittance N° {{$demande->reference}} du {{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/y') }} <br><br>
              délivrée à <strong>{{ $demande->raison_social }}</strong>
            </div>
      
            <table class="line-items-container">
              <thead>
                <tr>
                  <th class="heading-description">Détails</th>
                  <th class="heading-price">Montant</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Frais de dossier</td>
                  <td class="bold">25000 F CFA</td>
                </tr>
                <tr>
                  <td>Frais de timbre</td>
                  <td class="bold">20000 F CFA</td>
                </tr>
                <tr>
                  <td>Frais d'examen de dossier</td>
                  <td class="bold">
                    @if($demande->Categorie->code == "TH") 50000 F CFA
                        @elseif($demande->Categorie->code == "TR1") 200000 F CFA
                        @elseif($demande->Categorie->code == "TR2") 300000 F CFA
                        @elseif($demande->Categorie->code == "TR3") 500000 F CFA
                        @elseif($demande->Categorie->code == "EC") 300000 FCFA
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
      
            <table class="line-items-container has-bottom-border">
              <thead>
                <tr>
                  <!-- <th>Payment Info</th>
                  <th>Due By</th>-->
                  <th>Total payé</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="large total"><b>{{$demande->montant}} F CFA</b></td>
                </tr>
              </tbody>
            </table><br>
            <span>Arreté la présente quittance à la somme de <b>{{$montant}} F CFA</b></span>
            <div class="footer">
              <div class="footer-info">
                {{-- <span>Arreté la présente quiittance a la somme de {{$montant}} F CFA</span> --}}
              </div>
              <!-- <div class="footer-thanks">
                <img
                  src="https://github.com/anvilco/html-pdf-invoice-template/raw/main/img/heart.png"
                  alt="heart"
                />
                <span>Thank you!</span>
              </div> -->
            </div>
          </div>
    </body>
</html>