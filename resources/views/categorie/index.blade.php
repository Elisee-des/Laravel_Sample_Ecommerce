@extends('layouts.app')

@section('title', 'Gestion des categories')

@section("soustitre", "Gestion des categories")

@section('contents')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadgitcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste categorie</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des categories</h1>
        <div>
          <a href="{{ route("categorie.create") }}" class="btn btn-primary">Ajouter une categorie</a>
        </div>
      </div>
      <hr>
      
      <div class="container">
      <br>
        <div class="card p-0">
          <div class="card-body">

          <form action="" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 mb-3">
              <div class="input-group">
                  <input class="form-control" type="text" placeholder="Search for..." name="query" value="" />
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
          </form>
          
          <div class="table-responsive">
            
            <br>
            @if (isset($categories))
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($categories->count() > 0)

                      @foreach ($categories as $categorie )
                          <tr>
                              <td>{{ $categorie->name }}</td>
                              <td>
                                  <div class="btn-group" role="group">
                                      <a href="{{ route("categorie.edit", $categorie->id) }}" class="btn btn-outline-dark">Editer</a>
                                      <a href="" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Supprimer</a>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
      
                      @else
                          <tr>
                              <td class="text-center" colspan="5">Aucune categorie trouvé</td>
                          </tr>
                      @endif
                      </tbody>
                  </table>
                  
                  <div class="pagination-block">
                   {{-- {{  $categories->links('layouts.paginationlinks')  }} --}}
                   {{-- {{  $categories->links()  }} --}}
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
