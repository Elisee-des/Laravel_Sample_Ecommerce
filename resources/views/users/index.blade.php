@extends('layouts.app')

@section('title', 'Gestion des utilisateurs')

@section("soustitre", "Gestion des utilisateurs")

@section('contents')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadgitcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des clients</h1>
        <div>
          <a href="{{ route("users.import.index") }}" class="btn btn-warning">Importer</a>
          <a href="{{ route('users.export') }}" class="btn btn-dark">Exporter</a>
          <a href="{{ route("user.create") }}" class="btn btn-primary">Ajouter un client</a>
        </div>
      </div>
      <hr>
      
      <div class="container">
      <br>
        <div class="card p-0">
          <div class="card-body">

          <form action="{{ route("search.users") }}" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 mb-3">
              <div class="input-group">
                  <input class="form-control" type="text" placeholder="Search for..." name="query" value="" />
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
              </div>
          </form>
          
          <div class="table-responsive">
            
            <br>
            @if (isset($users))
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Noms</th>
                            <th>Emails</th>
                            <th>Telephone</th>
                            <th>Professions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if ($users->count() > 0)

                      @foreach ($users as $user )
                          <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->phone }}</td>
                              <td>{{ $user->profession }}</td>
                              <td>
                                  <div class="btn-group" role="group">
                                      <a href="{{ route("user.show", $user->id) }}" class="btn btn-outline-primary">Détail</a>
                                      <a href="{{ route("user.edit", $user->id) }}" class="btn btn-outline-dark">Editer</a>
                                      <a href="{{ route("user.delete", $user->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Supprimer</a>
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
                   {{-- {{  $users->links('layouts.paginationlinks')  }} --}}
                   {{-- {{  $users->links()  }} --}}
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






{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Import Export Excel & CSV File to Database Example - LaravelTuts.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card mt-3 mb-3">
        <div class="card-header text-center">
            <h4>Laravel 9 Import Export Excel & CSV File to Database Example - LaravelTuts.com</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-primary">Import User Data</button>
            </form>
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of Users
                        <a class="btn btn-danger float-end" href="{{ route('users.export') }}">Export User Data</a>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>
     
</body>
</html> --}}