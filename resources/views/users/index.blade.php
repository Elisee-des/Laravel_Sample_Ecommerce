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
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
          </ol>
        </nav>
      </div>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}</div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
      {{ Session::get('error') }}</div>
    @endif

    <div class="row">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des utilisateurs</h1>
        <a href="" class="btn btn-primary">Ajouter un client</a>
      </div>
      <hr>
      
      <div class="container">
      <br>
        <div class="card p-3">
          <div class="card-body">
            <div class="table-responsive">
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
                                      <a href="" class="btn btn-outline-primary">Détail</a>
                                      <a href="" class="btn btn-outline-dark">Editer</a>
                                      <a href="" class="btn btn-outline-danger">Supprimer</a>
                                  </div>
                              </td>
                          </tr>
                      @endforeach
      
                      @else
                          <tr>
                              <td class="text-center" colspan="5">user not found</td>
                          </tr>
                      
                  @endif
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection