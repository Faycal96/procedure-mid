@extends('layouts/layoutW')
@section('faq')

<div class="container" style="margin: 0 auto; padding: 0 auto; width: 60rem;">
  <h2>Comment faire ma demande d'agrément technique</h2>
  <br><br>

  <h2>Comment faire ma demande d'étude de sol et de fondation</h2>
  
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
