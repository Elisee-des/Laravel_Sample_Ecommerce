@extends('layouts.app')

@section('title', "Liste des produits de la categorie $categorie->name")

@section("soustitre", "")

@section('contents')
<section style="">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadgitcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>/
            <li class="breadgitcrumb-item"><a href="{{ route("categorie.index") }}">Liste des products</a></li>/
            <li class="breadcrumb-item active" aria-current="page">Liste product</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0"></h1>
        <div>
          {{-- <a href="{{ route("products.index", $categorie->id) }}" class="btn btn-primary">Ajouter un produit</a> --}}
        </div>
      </div>

      
      <div class="container">
        <div class="row">
          <div class="col-7">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nom de la categorie</p>
                  </div>
                  <div class="col-sm-4">
                    <p class="text-muted mb-0">
                      {{ $categorie->name }}
                    </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Date de creation</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $categorie->created_at }}</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Action</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">
                      <a href="{{ route("categorie.destroy", $categorie->id) }}" class="btn btn-danger" onclick="return confirm('Etes vous sûr ?')">Supprimer cette categorie</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <h4>Produits associés</h4>
        <div class="card p-0">
          <div class="card-body">

            <form action="{{ route("product.search", ["idCat" => $categorie->id]) }}" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 mb-3">
              <div class="input-group">
                  <input class="form-control" type="text" placeholder="Search for..." name="query" value="" />
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>

          <div class="table-responsive">
            
            <br>
            @if (isset($products))
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Images</th>
                            <th>Prix</th>
                            <th>Descriptions</th>
                            <th>Date d'ajout</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                      @if ($products->count() > 0)

                      @foreach ($products as $product )
                          <tr>
                              <td>{{ $product->name }}</td>
                              <td><img src="/images/{{ $product->image }}" style="width:40px;" alt=""></td>
                              <td>{{ $product->prix }}</td>
                              <td>{{ $product->description }}</td>
                              <td>{{ $product->created_at }}</td>
                              {{-- <td>
                                  <div class="btn-group" role="group">
                                      <button class="btn btn-outline-dark"><a href="{{ route("product.edit", ["idCat" => $categorie->id, "id" => $product->id]) }}" class="btn">Editer</a></button>
                                      <form action="{{ route("product.delete", ["idCat" => $categorie->id, "id" => $product->id]  ) }}" method="POST" type="button" class="btn btn-danger" onclick="">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0" onclick="return confirm('Etes vous sûr ?')">Delete</button>
                                      </form>
                                      <button class="btn btn-outline-warning"><a href="{{ route("product.show", ["idCat" => $categorie->id, "id" => $product->id]) }}" class="btn">Detail</a></button>
                                  </div>
                              </td> --}}
                          </tr>
                      @endforeach
      
                      @else
                          <tr>
                              <td class="text-center" colspan="5">Aucune produit trouvé</td>
                          </tr>
                      @endif
                      </tbody>
                  </table>
                  
                  <div class="pagination-block">
                   {{-- {{  $products->links('layouts.paginationlinks')  }} --}}
                   {{-- {{  $products->links()  }} --}}
                  </div>
                  @endif
              
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
