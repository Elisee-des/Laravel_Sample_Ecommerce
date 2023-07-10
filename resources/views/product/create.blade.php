@extends('layouts.app')

@section('title', "Ajout de produit pour la categorie $categorie->name")

@section("soustitre", "Ajout de produit pour la categorie $categorie->name")

@section('contents')
<br><br>

<section style="background-color: #eee;">
  <section class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>/
            <li class="breadcrumb-item"><a href="{{ route("categorie.index", $categorie->id) }}">Liste des products</a></li>/
            <li class="breadcrumb-item active" aria-current="page">Edition de produit</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">
      <form action="{{ route("product.create", $categorie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="card p-3 mb-2">
            <div class="row">
              <div class="col-6">
                <input type="text" name="name" class="form-control mb-2" placeholder="Nom du produit" value="">
                <input type="text" name="prix" class="form-control mb-2" placeholder="Prix du produit" value="">
                <textarea type="text" name="description" class="form-control mb-2" placeholder="Description du produit" value=""></textarea>
            </div>
            <div class="col-6">
                  <input type="text" name="categorie_id" class="form-control mb-2" placeholder="" value="{{ $categorie->name }}" readonly>
                <label for="" class="form-label">Associer une image a ce produit</label>
                <input type="file" name="image" class="form-control mb-2" placeholder="Image" value="">

              </div>
            </div>
        </div>
        <div class="row">
            <div class="d-gird text-center">
              <button class=" text-center btn btn-primary">Creér le produit</button>
            </div>
          </div>
      </form>
    </div>
  </section>

  @endsection