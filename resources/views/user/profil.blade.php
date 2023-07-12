@extends('layouts.app')

@section('title', 'Mon profil')

@section("soustitre", "Paramètre")

@section('contents')
<section style="background-color:">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Mon Profile</li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              @if ( auth()->user()->image != '' )
              <img src="/images/{{ auth()->user()->image }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              @endif
              <h5 class="my-3">{{ auth()->user()->name }}</h5>
              <p class="text-muted mb-1">{{ auth()->user()->profession }}</p>
              <p class="text-muted mb-4">{{ auth()->user()->adress }}</p>
              
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
                    {{ auth()->user()->name }}
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  @if (auth()->user()->phone != "")
                  <p class="text-muted mb-0">{{ auth()->user()->phone }}</p>
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
                  @if (auth()->user()->role == 'admin')
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
                  @if (auth()->user()->adress != '')
                  <p class="text-muted mb-0">{{ auth()->user()->adress }}</p>
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
                  @if (auth()->user()->profession != "")
                  <p class="text-muted mb-0">{{ auth()->user()->profession }}</p>
                  @else
                  <p class="text-muted mb-0"><a href="{{ route("profil.parametre") }}">Veuillez mettre à jour</a></p>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center mb-2">
            <a href="{{ route("profil.parametre") }}" type="button" class="btn btn-outline-primary ms-1"><i class="fa-sharp fa-pencil"></i> Editer mon compte</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection