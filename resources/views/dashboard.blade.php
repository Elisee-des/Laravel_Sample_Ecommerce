@extends('layouts.app')

@section('title', "Tableau de bord - Panneau d'administration")

@section("soustitre", "Tableau de bord")

@section('contents')
{{-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol> --}}
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Utilisateurs -({{ $nombreUtilisateur }})</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route("user.index") }}">Voir Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Total Admins - ({{ $nombreAdministrateurs }})</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route("user.index") }}">Voir Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Produits - ({{ $nombreProduit }})</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route("product.index") }}">Voir Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Categories - ({{ $nombreCategorie }})</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route("categorie.index") }}">Voir Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                10 dernier produits
            </div>

            @if (isset($products))
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Image</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($products->count() > 0)

                      @foreach ($products as $product )
                          <tr>
                              <td>{{ $product->name }}</td>
                              <td class="text-center"><img src="/images/{{ $product->image }}" style="width: 30px;" alt=""></td>
                              <td>{{ $product->prix }}</td>
                              <td>
                                <a href="{{ route("products.edit.index", $product->id) }}" class="btn btn-outline-primary"><i class="fa-sharp fa-pencil"></i> Editer</a>
                                <a href="{{ route("products.show.index", $product->id) }}" class="btn btn-outline-dark"><i class="fa-sharp fa-circle-info"></i> Detail</a>
                                  
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

            {{-- <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div> --}}
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                10 dernier categories
            </div>

            <table class="table table-bordered ">
                  <thead>
                    <tr>
                      <th scope="col">Noms</th>
                      <th scope="col" class="pull-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($categories->count() > 0)

                  @foreach ($categories as $categorie )

                    <!-- Modal d'édition de la catégorie -->
                    <div class="modal fade" id="modalEditerCategorie{{ $categorie->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditerCategorieLabel{{ $categorie->id }}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalEditerCategorieLabel{{ $categorie->id }}">Éditer la catégorie</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <!-- Formulaire d'édition de la catégorie -->
                                  <form method="POST" action="{{ route('categorie.update', $categorie->id) }}">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group">
                                          <label for="nom{{ $categorie->id }}">Nom de la catégorie</label>
                                          <input type="text" class="form-control" id="nom{{ $categorie->id }}" name="name" value="{{ $categorie->name }}" required>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                          <button type="submit" class="btn btn-primary">Enregistrer</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                      <tr>
                        <td>{{ $categorie->name }}</td>
                        <td class="pull-right">
                          {{-- <a href="{{ route("categorie.edit", $categorie->id) }}" class="btn btn-outline-primary" ata-toggle="modal" data-target="#modalEditionCategorie"><i class="fa-sharp fa-pencil"></i> Editer</a> --}}
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditerCategorie{{ $categorie->id }}">
                            <i class="fa-sharp fa-plus"></i> Éditer
                          </button>
                          <a href="{{ route("categorie.show.products", $categorie->id) }}" class="btn btn-outline-dark"><i class="fa-sharp fa-circle-info"></i> Detail</a>

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

            {{-- <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div> --}}
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-user me-1"></i>
        10 dernier client inscrit
    </div>

    <div class="table-responsive">

        <br>
        @if (isset($users))

        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Noms</th>
              <th>Images</th>
              <th>Emails</th>
              <th>Telephone</th>
              {{-- <th>Professions</th> --}}
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($users->count() > 0)

            @foreach ($users as $user )
            <tr>
              <td>{{ $user->name }}</td>
              <td class="text-center">

                @if ( $user->image != '' )
                <img src="/images/{{ $user->image }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 30px;">
                @else
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 30px;">
                @endif

              </td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->phone }}</td>
              <td>
                <div class="btn-group" role="group">
                  <a href="{{ route("user.show", $user->id) }}" class="btn btn-outline-dark"><i class="fa-sharp fa-circle-info"></i> Détail</a>
                 
                  <a href="{{ route("user.edit", $user->id) }}" class="btn btn-outline-primary"><i class="fa-sharp fa-pencil"></i> Editer</a>
                </div>
              </td>
            </tr>
            @endforeach

            @else
            <tr>
              <td class="text-center" colspan="5">Aucun utilisateur trouvé</td>
            </tr>
            @endif
          </tbody>
        </table>

        <div class="pagination-block">
          {{-- {{ $users->links('layouts.paginationlinks') }} --}}
          {{-- {{ $users->links() }} --}}
        </div>
        @endif

      </div>

    <div class="card-body">
        @yield('contents')
    </div>
</div>
@endsection