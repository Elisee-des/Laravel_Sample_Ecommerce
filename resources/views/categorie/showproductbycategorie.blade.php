@extends('layouts.app')

@section('title', "Liste des produits de la categorie $categorie->name")

@section("soustitre", "Liste des produits de la categorie $categorie->name")

@section('contents')
<section style="background-color: #eee;">
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
        <h1 class="mb-0">Liste des produits</h1>
        <div>
          <a href="{{ route("products.index", $categorie->id) }}" class="btn btn-primary">Ajouter un produit</a>
        </div>
      </div>
      <hr>
      
      <div class="container">
      <br>
        <div class="card p-0">
          <div class="card-body">

          <div class="table-responsive">
            
            <br>
            @if (isset($products))
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Prix</th>
                            <th>Descriptions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($products->count() > 0)

                      @foreach ($products as $product )
                          <tr>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->prix }}</td>
                              <td>{{ $product->description }}</td>
                              <td>
                                  <div class="btn-group" role="group">
                                      <button class="btn btn-outline-dark"><a href="{{ route("product.edit", ["idCat" => $categorie->id, "id" => $product->id]) }}" class="btn">Editer</a></button>
                                      <form action="{{ route("product.delete", ["idCat" => $categorie->id, "id" => $product->id]  ) }}" method="POST" type="button" class="btn btn-danger" onclick="">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0" onclick="return confirm('Etes vous sûr ?')">Delete</button>
                                      </form>
                                      <button class="btn btn-outline-warning"><a href="{{ route("product.show", ["idCat" => $categorie->id, "id" => $product->id]) }}" class="btn">Detail</a></button>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
      
                      @else
                          <tr>
                              <td class="text-center" colspan="5">Aucune product trouvé</td>
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
