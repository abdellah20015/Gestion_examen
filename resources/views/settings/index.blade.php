@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Paramètres</h1>
    <div class="card mb-4">
        <div class="card-header">Préférences de Compte</div>
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST">
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
                <!-- Ajoutez d'autres paramètres ici -->
                <button type="submit" class="btn btn-primary">Mettre à Jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
