@extends('layouts.app')

@section('title', "Edition du produit")

@section("soustitre", "Edition du produit")

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
            <li class="breadcrumb-item active"><a href="">{{ $product->name }}</a></li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">
      <form action="{{ route("products.update.index", $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                <input type="text" name="name" @error('name')is-invalid @enderror class="form-control mb-2" placeholder="Nom du produit" value="{{ $product->name }}">
                    @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                <input type="text" name="prix" @error('prix')is-invalid @enderror class="form-control mb-2" placeholder="Prix du produit" value="{{ $product->prix }}">
                    @error('prix')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                <textarea type="text" name="description" @error('description')is-invalid @enderror class="form-control mb-2" placeholder="Description du produit" value="">{{ $product->description }}</textarea>
                    @error('description')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-6">
                <label for="" class="form-label">Choisir la categorie</label>
                <select class="form-select mb-3" aria-label="Default select example" name="categorie_id">
                  <option value="{{ $product->categorie->id }}" selected>{{ $product->categorie->name }}</option>
                  @foreach ($categories as $categorie)
                      <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                  @endforeach
                </select>
              
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
              <button class=" text-center btn btn-primary">Editer le produit</button>
            </div>
          </div>
      </form>
    </div>
  </section>

  @endsection