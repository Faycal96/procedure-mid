@extends('backend.layout.base')
@section('title')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section profile">
      <div class="row">
        {{-- <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->name }}</h2>
              <h3>{{ Auth::user()->role->libelle }}</h3>

            </div>
          </div>

        </div> --}}

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">General</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer Mot de passe</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  {{-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}

                  <h5 class="card-title">Détails Profile</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom Complet</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Matricule</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->agent->matricule }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Service</div>
                    <div class="col-lg-9 col-md-8"> {{ Auth::user()->agent->service->libelle_long }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Fonction</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->agent->fonction.'/MID' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Profil</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->agent->role->libelle }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date Affectation</div>
                    <div class="col-lg-9 col-md-8"> {{ Auth::user()->agent->date_affectation }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de Prise de service</div>
                    <div class="col-lg-9 col-md-8"> {{ Auth::user()->agent->date_prise_service  }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de Naissance</div>
                    <div class="col-lg-9 col-md-8"> {{ Auth::user()->agent->date_naissance }}</div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Province de résidence</div>
                    @if (isset(Auth::user()->agent->province))

                    <div class="col-lg-9 col-md-8">{{ Auth::user()->agent->province->libelle }}</div>
                    @else
                    <div class="col-lg-9 col-md-8">-</div>

                    @endif
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telephone</div>
                    <div class="col-lg-9 col-md-8">  {{ Auth::user()->agent->telephone }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('update-profile') }}" method="post">

                    @csrf
                    <input type="hidden" name="uuid" value="{{ Auth::user()->agent->uuid }}">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom Complet</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control border-success" id="fullName" value="{{ Auth::user()->agent->prenom.' '.Auth::user()->agent->nom }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Matricule</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="matricule" type="text" class="form-control border-success" id="fullName" value="{{ Auth::user()->agent->matricule }}">
                        </div>
                      </div>


                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Date affectation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date_affectation" type="date" class="form-control border-success" id="Country" value="{{ Auth::user()->agent->date_affectation }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Date de Prise de service</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date_prise_service" type="date" class="form-control border-success" id="Country" value="{{ Auth::user()->agent->date_prise_service }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Date de Naissance</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="date_naissance" type="date" class="form-control border-success" id="Country" value="{{ Auth::user()->agent->date_naissance }}">
                        </div>
                      </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Service</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control border-success" id="Address" value=" {{ Auth::user()->agent->service->libelle_long }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telephone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telephone" type="text" class="form-control border-success" id="Phone" value="{{ Auth::user()->agent->telephone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control border-success" id="Email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>



                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de Passe actuel</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control border-success" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau Mot de Passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control border-success" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label border-success">Confirmer nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control border-success" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Changer le mot de Passe</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



  @section('script')
