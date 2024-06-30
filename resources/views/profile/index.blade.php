@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Mon Profil</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">Informations Personnelles</div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="profile_photo" class="form-label">Photo de Profil</label>
                    <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
                    @if ($errors->has('profile_photo'))
                        <span class="text-danger">{{ $errors->first('profile_photo') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Photo de Profil" width="150">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">Changer le Mot de Passe</div>
        <div class="card-body">
            <form action="{{ route('profile.update_password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mot de Passe Actuel</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Nouveau Mot de Passe</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirmer le Nouveau Mot de Passe</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-primary">Changer le Mot de Passe</button>
            </form>
        </div>
    </div>
</div>
@endsection


