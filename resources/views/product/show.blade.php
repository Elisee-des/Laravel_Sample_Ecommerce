@extends('layouts.app')

@section('title', "Detail du produit $product->name")

@section("soustitre", "Detail du produit $product->name")

@section('contents')
<br><br>

<section style="background-color: #eee;">
  <section class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route("categorie.show.products", $categorie->id) }}">Liste des products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edition de produit</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card p-3">
      <form action="{{ route("product.update", ["idCat" => $categorie->id, "id" => $product->id]) }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="name"  class="form-control mb-2" placeholder="Nom du produit" value="{{ $product->name }}" readonly>
                    
                <input type="text" name="prix"  class="form-control mb-2" placeholder="Prix du produit" value="{{ $product->prix }}" readonly>
                    
                <textarea type="text" name="description"  class="form-control mb-2" placeholder="Description du produit" value="{{ $product->description }}" readonly>{{ $product->description }}</textarea>
                   
            </div>
            <div class="col-6">
                <input type="text" name="categorie_id" class="form-control mb-2" placeholder="" value="Categorie: {{ $categorie->name }}" readonly>
                <label for="" class="form-label">Image du produit</label>
                <td><img src="/images/{{ $product->image }}" class="img-responsive" style="max-height:150px; max-width:150px" alt=""></td>
                {{-- <input type="file" name="image"  class="form-control mb-2" placeholder="Image" value=""> --}}
              </div>
            </div>
        </div>
        <div class="row">
            <div class="d-gird text-center">
              <a href="{{ route("categorie.show.products", $categorie->id) }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
      </form>
    </div>
  </section>

  @endsection