@extends('layout')

@section('content')
    <div class="container">
        <div class="card shadow-lg my-5 mx-auto" style="max-width: 900px;">
            <div class="card-body p-5">
                <h2 class="card-title text-center text-primary mb-3">Plateforme des Examens</h2>
                <p class="text-muted text-center mb-4">
                    Je suis Abdellah Agnaou, développeur de ce site. Passionné par la technologie et le développement web, j'ai créé cette plateforme pour faciliter l'accès aux informations et aux résultats des examens pour tous les étudiants.
                </p>
                <div class="d-flex justify-content-center mb-4">
                <img src="{{ asset('image/abdellah.jpg') }}" alt="Abdellah Agnaou" class="rounded-circle shadow" style="width: 150px; height: 150px;">

                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('exams.results.show') }}" class="btn btn-primary">Consulter votre résultat</a>
                </div>
            </div>
        </div>
    </div>
@endsection

