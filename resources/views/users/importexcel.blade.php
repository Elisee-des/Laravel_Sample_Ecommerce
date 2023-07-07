@extends('layouts.app')

@section('title', "Importer des Client a partir d'un fichier excel")

@section("soustitre", "Importer des Client a partir d'un fichier excel")

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
            <li class="breadcrumb-item active" aria-current="page">Importer des clients a partir d'un fichier excel</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">

    <div class="card-body">
      <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-primary">Importer</button>
    </form>
    </div>
    </div>
  </section>

  @endsection