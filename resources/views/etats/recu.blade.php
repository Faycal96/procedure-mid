<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <title>Invoice Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="./modern-normalize.css" />
    <link rel="stylesheet" href="./web-base.css" />
    <link rel="stylesheet" href="./invoice.css" />
    <link rel="stylesheet" href="./invoice-pdf.css" />
    <link rel="stylesheet" href="./custom.css" />
    <!-- <script type="text/javascript" src="./web/scripts.js"></script>  -->
  </head>
  <body>
    <div class="web-container">
      
      <div class="pdf-header">
        <div class="pdf-header-left">
          <div>Ministère des Infrastructure et du Développement</div>
          <div class="center">-------------</div>
          <div class="center">Direction Général des Études Statistiques</div><br />
          <div class="center">DGESS</div>

        </div>

        <div class="pdf-header-right">
          <div>BURKINA FASO</div>
          <div style="margin-right: 10px">--------</div>
          <div>Unité-Progrès-Justice</div>
        </div>
      </div>

      <!-- <div class="logo-container">
        
        <img
          style="height: 18px"
          src="https://app.useanvil.com/img/email-logo-black.png"
        />
      </div> -->
      <div class="center">
        <strong>Quittance de paiement</strong> <br/> pour la demande d'aggrément de catégorie <strong>AP01</strong><br/>   
      </div><br/>
      <div>
      Quittance N° 0000001 du 25/03/2024 <br/>
        délivré à <strong>OUÉDRAOGO Ibrahim</strong>
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
            <td>Blue large widgets</td>
            <td class="bold">$15.00</td>
          </tr>
          <tr>
            <td>Green medium widgets</td>
            <td class="bold">$10.00</td>
          </tr>
          <tr>
            <td>Red small widgets with logo</td>
            <td class="bold">$35.00</td>
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
            <td class="large total">$105.00</td>
          </tr>
        </tbody>
      </table> <br>

      <div class="footer">
        <div class="footer-info">
          <span>Arreté la présente quiittance a la somme de 105 F CFA</span>
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


    <!-- <script type="text/javascript">
      load(document.querySelector(".web-container"), "./invoice.html");
    </script> -->

  </body>
</html>
