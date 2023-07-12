@extends('layouts.app')

@section('title', 'Editer votre compte')

@section("soustitre", "Editer votre compte")

@section('contents')
<br><br>

<section style="background-color: ">
  <section class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editer du compte</li>
          </ol>
        </nav>
      </div>
    </div>

<div class="card p-3">
  <form action="{{ route("profil.edition") }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ auth()->user()->name }}"
                >
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Telephone</label>
            <input type="text" name="phone" class="form-control" placeholder="Telephone" value="{{ auth()->user()->phone }}"
                >
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="" class="form-label">Adresse</label>
            <input type="text" name="adress" class="form-control" placeholder="Adress"
                value="{{ auth()->user()->adress }}" >
        </div>
        <div class="col mb-3">
            <label for="" class="form-label">Profession</label>
            <textarea type="text" name="profession" class="form-control" placeholder="Profession"
                value="{{ auth()->user()->profession }}" >{{ auth()->user()->profession }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="d-gird text-center">
            <button class="text-center btn btn-primary"><i class="fa-sharp fa-pencil"></i> Editer mon profil</button>
        </div>
    </div>


  </form>
</div>
<br>



<div class="card p-3">
  <div class="row">
    <div class="col-6">
    <h4>Changer votre image de profil</h4>
      <form action="{{ route("edition.image") }}" method="POST" enctype="multipart/form-data">
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
              <div class="col-12 mb-3">
                <label for="" class="form-label">Image</label>
                <input name="image" type="file" id="input-file" class="form-control m-2">

                @error('image')
                      <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
            </div>

            <div class="row">
              <div class="d-gird text-left">
                  <button class=" text-left btn btn-primary"><i class="fa-sharp fa-pencil"></i> Editer l'image</button>
              </div>
          </div>
    
      </form>
  </div>

  <div class="col-6">

  <h4>Changer votre mot de passe</h4>

    <div class="card p-3 mb-2">
      <form action="{{ route("edition.password") }}" method="POST">
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
    

              <div class="row">
                <div class="col-7 mb-3">
                  <div class="mb-2">
                      <label for="password" class="form-label">Mot de passe</label>
                      <input type="text" name="password" @error('password')is-invalid @enderror id="password" class="form-control" placeholder="Mot de passe" value="">
                      @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
    
                  <div class="mb-2">
                    <label for="repeatPassword" class="form-label">Répétez Votre Mot de passe</label>
                    <input type="text" name="repeatPassword" id="repeatPassword" @error('repeatPassword')is-invalid @enderror class="form-control" placeholder="Répétez Votre Mot de passe" value="">
                    @error('repeatPassword')
                            <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="d-gird text-left">
                  <button class=" text-left btn btn-primary"><i class="fa-sharp fa-pencil"></i> Editer le mot de passe</button>
              </div>
            </div>
    
      </form>
    </div>
 </div>
</div>
</section>

@endsection