@extends('layouts.app')

@section('title', 'Gestion des Produits')

@section("soustitre", "Gestion des Produits")

@section('contents')
<section style="background-color: ">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadgitcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>/
            <li class="breadcrumb-item active" aria-current="page">Liste des produits</li>/
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0"></h1>
        <div>
          {{-- <a href="{{ route("products.create.index") }}" class="btn btn-primary">Ajouter un produit</a> --}}
        </div>
      </div>
      <hr>
      
      <div class="container">
      <br>
        <div class="card p-0">
          <div class="card-body">

          <form action="{{ route("products.create.index") }}" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 mb-3">
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
                            <th>Image</th>
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
                              <td><img src="/images/{{ $product->image }}" style="width: 80px;" alt=""></td>
                              <td>{{ $product->prix }}</td>
                              <td>{{ $product->description }}</td>
                              <td>
                                {{-- <div class="btn-group" role="group">
                                  <button class="btn btn-outline-dark"><a href="" class="btn">Editer</a></button>
                                  <form action="" method="POST" type="button" class="btn btn-danger" onclick="">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-danger m-0" onclick="return confirm('Etes vous sûr ?')">Supprimer</button>
                                  </form>
                                  <button class="btn btn-outline-primary"><a href="" class="btn">Produits</a></button>
                              </div> --}}
                              </td>
                          </tr>
                      @endforeach
      
                      @else
                          <tr>
                              <td class="text-center" colspan="5">Aucun produit trouvé</td>
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
