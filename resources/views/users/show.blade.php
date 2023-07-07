@extends('layouts.app')

@section('title', "Detail de $user->name")

@section("soustitre", "Detail de $user->name")

@section('contents')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route("user.index") }}">Liste</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail du profil de {{ $user->name }}</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              @if ( $user->image != '' )
              <img src="/images/{{ $user->image }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              @endif
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1">{{ $user->profession }}</p>
              <p class="text-muted mb-4">{{ $user->adress }}</p>
              <div class="d-flex justify-content-center mb-2">
                <a href="{{ route("user.edit", $user->id) }}" class="btn btn-outline-primary ms-1">Faire une modificaion</a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nom</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    {{ $user->name }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  @if ($user->phone != "")
                  <p class="text-muted mb-0">{{ $user->phone }}</p>
                  @else
                  <p class="text-muted mb-0"><a href="{{ route("profil.parametre") }}">Veuillez mettre à jour</a></p>
                  @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Role</p>
                </div>
                <div class="col-sm-9">
                  @if ($user->role == 'admin')
                  <p class="text-muted mb-0">Administrateur</p>
                  @else
                  <p class="text-muted mb-0">Client</p>
                  @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  @if ($user->adress != '')
                  <p class="text-muted mb-0">{{ $user->adress }}</p>
                  @else
                  <p class="text-muted mb-0"><a href="{{ route("profil.parametre") }}">Veuillez mettre à jour</a></p>
                  @endif
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Profession</p>
                </div>
                <div class="col-sm-9">
                  @if ($user->profession != "")
                  <p class="text-muted mb-0">{{ $user->profession }}</p>
                  @else
                  <p class="text-muted mb-0"><a href="{{ route("profil.parametre") }}">Veuillez mettre à jour</a></p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection