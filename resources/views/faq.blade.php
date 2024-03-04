@extends('layouts/layoutW')
@section('faq')

<div class="container" style="margin: 0 auto; padding: 0 auto; width: 60rem;">
  <h2>Questions frequemment posées</h2>
  <div class="accordion">
    <!-- Permis d'écotourisme ou de tourisme écologique -->
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">Comment obtenir mon agrément technique ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content" style="overflow: auto">
        <p>Pour obtenir un permis d'écotourisme, suivez les étapes suivantes... [Informations spécifiques aux permis d'écotourisme.]</p>
        <ol>
            <li>il Faut disposer des ces pieces</li>
            <li>Avoir le momtant (1500 F CFA) pour payer</li>
            <li>il Faut disposer des ces pieces</li>
            <li>il Faut disposer des ces pieces</li>
            <li>il Faut disposer des ces pieces</li>
        </ol>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Comment obtenir mon devis d'etude de sol et de fondation?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Les frais varient en fonction du type de permis et de la durée. Voici les tarifs actuels... [Informations sur les frais.]</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Combien de temps dure la validité d'un permis d'écotourisme?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>La validité du permis dépend du type de permis. En général, un permis standard est valable pour [durée]... [Informations sur la validité.]</p>
      </div>
    </div>

    <!-- Délivrance d'avis technique d'importation de produits chimiques -->
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Comment soumettre une demande d'avis technique pour l'importation de produits chimiques?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>La soumission de votre demande se fait en ligne. Assurez-vous de télécharger les documents requis et de remplir le formulaire... [Informations spécifiques à l'avis technique.]</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Quelles sont les exigences de sécurité pour l'importation de produits chimiques?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>La sécurité est une priorité. Assurez-vous de respecter les directives de manipulation sécuritaire des produits chimiques... [Informations sur la sécurité.]</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-6" aria-expanded="false"><span class="accordion-title">Quel est le délai de traitement habituel pour l'avis technique d'importation?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Le délai de traitement varie en fonction de la complexité de la demande, mais en général, nous visons à traiter les demandes dans un délai de [nombre de jours]... [Informations sur les délais de traitement.]</p>
      </div>
    </div>

    <!-- Autorisation donnant droit à mener la chasse -->
    <div class="accordion-item">
      <button id="accordion-button-7" aria-expanded="false"><span class="accordion-title">Quelles sont les conditions d'âge pour obtenir une autorisation de chasse?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Pour être éligible à une autorisation de chasse, vous devez avoir au moins [âge minimum] ans... [Informations sur l'âge minimum.]</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-8" aria-expanded="false"><span class="accordion-title">Quelles sont les zones de chasse autorisées?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>La chasse est autorisée dans des zones spécifiques. Vous pouvez consulter la carte des zones de chasse disponibles sur notre site web... [Informations sur les zones de chasse.]</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-9" aria-expanded="false"><span class="accordion-title">Dois-je passer un test de sécurité pour obtenir une autorisation de chasse?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Oui, pour obtenir une autorisation de chasse, vous devrez passer un test de sécurité de la chasse et obtenir un certificat... [Informations sur le test de sécurité.]</p>
      </div>
    </div>
  </div>
</div>



<script>

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
@endsection
