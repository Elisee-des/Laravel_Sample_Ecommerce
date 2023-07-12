@extends('layouts.app')

@section('title', "detail du produit")

@section("soustitre", "detail du produit")

@section('contents')
<br><br>

<section style="background-color: ">
  <section class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("product.index") }}">Liste des produits</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3 mb-2">
      <div class="container ">
        <div class="row">
          <div class="col-md-6">
            <div class="card p-3">
            <img src="/images/{{ $product->image }}" alt="{{ $product->nom }}" class="img-fluid" style="width: 200px">
            </div>
          </div>
          <div class="col-md-6">
            <div class="card p-3">
              <h2>{{ $product->nom }}</h2>
              <p>{{ $product->description }}</p>
              <p>Prix : {{ $product->prix }}</p>
              <p>Catégorie : {{ $product->categorie->nom }}</p>
            </div>
            <!-- Autres détails du product -->
          </div>
          
          
        </div>
      </div>      
    </div>
    <div class="row">
      <div class="d-gird text-center">
           <a href="{{ route("products.edit.index", $product->id) }}" class="btn btn-primary"><i class="fa-sharp fa-pencil"></i> Editer l'article</a></button>
           <a href="{{ route("products.delete.index", $product->id) }}" class="btn btn-danger" onclick="return confirm('Etes vous sûr ?')"><i class="fa-sharp fa-trash" ></i> Supprimer l'article</a></button>
      </div>
    </div>
  </section>

  @endsection