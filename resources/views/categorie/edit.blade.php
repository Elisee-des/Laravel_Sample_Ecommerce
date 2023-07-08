@extends('layouts.app')

@section('title', "Editer $categorie->name")

@section("soustitre", "Editer $categorie->name")

@section('contents')
<br><br>

<section style="background-color: #eee;">
  <section class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("user.index") }}">Liste</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edition de {{ $categorie->name }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">
      <form action="{{ route("categorie.update", $categorie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-3 mb-2">
            <div class="row">
              <div class="col-6">
                <input type="text" name="name" class="form-control" placeholder="Nom de la categorie à creé" value="{{ $categorie->name }}">
              </div>
              <div class="col-1">
                <button type="submit" class="form-control btn btn-outline-primary">Creer</button>
              </div>
            </div>
        </div>
      </form>
    </div>
  </section>

  @endsection