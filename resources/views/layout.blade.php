<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Etudiants</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info text-white">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler text-white" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 text-white" href="{{ route('home') }}">
                    <img src="{{ asset('image/exam.png') }}" alt="Logo" style="height: 40px;">
                    <span style="display: block; color: white; font-size: 1.2rem;">ETUDE</span>
                </a>

                <!-- Left links -->
                @if (Route::has('login'))
    @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('students.index') }}">
                    <i class="fas fa-user-graduate"></i> Étudiants
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('filieres.index') }}">
                    <i class="fas fa-stream"></i> Filières
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('courses.index') }}">
                    <i class="fas fa-book-open"></i> Cours
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('exams.index') }}">
                    <i class="fas fa-pencil-alt"></i> Examens
                </a>
            </li>
            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('dashboard.index') }}">
                                    <i class="fas fa-chart-pie"></i> Dashboard
                                </a>
</li>
        </ul>

                    @else
                    <ul class="navbar-nav w-100 d-flex justify-content-end mb-2 mb-lg-0 " style="float: right">
    <li class="nav-item mx-4">
        <a class="nav-link text-success bg-light rounded" href="{{ route('exams.results.show') }}">
            <i class="fas fa-chart-line"></i> Résultats
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('login') }}" class="nav-link text-white">
            <i class="fas fa-sign-in-alt"></i> Connexion
        </a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a href="{{ route('register') }}" class="ml-4 nav-link text-white">
                <i class="fas fa-user-plus"></i> Inscrire
            </a>
        </li>
    @endif
</ul>

                    @endauth
                @endif
            </div>

            <!-- Right elements -->
            @auth
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Avatar -->
                    <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow position-relative" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
    @if(Auth::user()->profile_photo)
        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" class="rounded-circle" height="25" alt="Photo de profil" loading="lazy" />
    @else
        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Photo de profil par défaut" loading="lazy" />
    @endif
    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle">
        <span class="visually-hidden">Utilisateur connecté</span>
    </span>
</a>


                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
    <a class="dropdown-item" href="{{ route('profile.index') }}">
        <i class="fas fa-user"></i> My profile
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('settings.index') }}">
        <i class="fas fa-cog"></i> Settings
    </a>
</li>
<li>
    <a class="dropdown-item" href="{{ route('signout') }}">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</li>


                        </ul>
                    </div>
                </div>
            @endauth
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
<footer class="text-center text-white" style="background-color: #0a4275; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);">
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com" role="button"
               style="opacity: 0.85;">
                <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com" role="button"
               style="opacity: 0.85;">
                <i class="fab fa-instagram"></i>
            </a>

            <!-- LinkedIn -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com" role="button"
               style="opacity: 0.85;">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </section>
    </div>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.5); color: #FFFFFF; font-family: 'Roboto', sans-serif; line-height: 1.6;">
    <p>© 2024 ETUDE - Tous droits réservés.</p>
    <p>
        Pour plus d'informations, contactez-nous à 
        <a href="mailto:contact@etu.com" class="text-white" style="text-decoration: none; color: #29b6f6;">
            <i class="fas fa-envelope"></i> contact@etu.com
        </a>.
    </p>
    <div style="margin-bottom: 8px;">
        <a class="text-white" href="https://etu.com/terms" style="margin-right: 15px; text-decoration: none; color: #29b6f6;">
            <i class="fas fa-file-contract"></i> Conditions d'utilisation
        </a>
        <a class="text-white" href="https://etu.com/privacy" style="text-decoration: none; color: #29b6f6;">
            <i class="fas fa-shield-alt"></i> Politique de confidentialité
        </a>
    </div>
    <p>Explorez notre plateforme pour accéder aux ressources et outils pour réussir vos études.</p>
</div>



</footer>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>


