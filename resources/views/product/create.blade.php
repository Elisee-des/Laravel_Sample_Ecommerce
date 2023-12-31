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
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("categorie.index", $categorie->id) }}">Liste des products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edition de produit</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">
      <form action="{{ route("product.create", $categorie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>                                            
          @endif

        <div class="card p-3 mb-2">
            <div class="row">
              <div class="col-6">
                <input type="text" name="name" @error('name')is-invalid @enderror class="form-control mb-2" placeholder="Nom du produit" value="">
                    @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                <input type="text" name="prix" @error('prix')is-invalid @enderror class="form-control mb-2" placeholder="Prix du produit" value="">
                    @error('prix')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                <textarea type="text" name="description" @error('description')is-invalid @enderror class="form-control mb-2" placeholder="Description du produit" value=""></textarea>
                    @error('description')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-6">
                <input type="text" name="categorie_id" class="form-control mb-2" placeholder="" value="Categorie: {{ $categorie->name }}" readonly>
                <label for="" class="form-label">Associer une image a ce produit</label>
                <input type="file" name="image" @error('image')is-invalid @enderror class="form-control mb-2" placeholder="Image" value="">
                @error('image')
                      <span class="invalid-feedback">{{ $message }}</span>
                      @enderror

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