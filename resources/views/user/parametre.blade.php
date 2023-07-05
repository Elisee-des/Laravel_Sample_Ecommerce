@extends('layouts.app')

@section('title', 'Paramètre')

@section("soustitre", "Paramètre - Editer votre compte")

@section('contents')
<br><br>
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
            <button class="text-center btn btn-primary">Editer mon profil</button>
        </div>
    </div>


  </form>
</div>
<br>

<div class="card p-3">

  
  <div class="row">
    <div class="col-6">
    <h4>Changer votre image de profil</h4>
    <div class="card p-3">
      <form action="" method="POST">
        @csrf
        @method('PUT')
    
            <div class="row">
              <div class="col-7 mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" placeholder="Changer votre image de profil" value="">
              </div>
            </div>

            <div class="row">
              <div class="d-gird text-left">
                  <button class=" text-left btn btn-primary">Editer l'image</button>
              </div>
          </div>
    
      </form>
    </div>
  </div>

  <div class="col-6">

  <h4>Changer votre mot de passe</h4>

    <div class="card p-3">
      <form action="" method="POST">
        @csrf
        @method('PUT')
    
            <div class="row">
              <div class="col-7 mb-3">
                <div class="mb-2">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Mot de passe" value="">
                </div>
  
                <div class="mb-2">
                  <label for="repeatPassword" class="form-label">Répétez Votre Mot de passe</label>
                  <input type="text" name="repeatPassword" id="repeatPassword" class="form-control" placeholder="Répétez Votre Mot de passe" value="">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="d-gird text-left">
                  <button class=" text-left btn btn-primary">Editer le mot de passe</button>
              </div>
          </div>
    
      </form>
    </div>
  </div>
 </div>
</div>
@endsection