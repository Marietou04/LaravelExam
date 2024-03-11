<!-- resources/views/drivers/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des chauffeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #003366; /* Fond bleu de nuit */
        }
        .navbar-nav {
            width: 200px; /* Largeur du navbar vertical */
            background-color: #003366; /* Fond bleu de nuit */
            height: 100vh; /* Hauteur plein écran */
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto; /* Pour permettre le défilement vertical si nécessaire */
        }
        .navbar-nav .nav-link {
            padding: 15px 20px;
            color: #fff; /* Texte blanc */
            border-bottom: 1px solid #ddd; /* Bordure entre les liens */
            font-size: 18px; /* Taille de police augmentée */
            font-family: "Times New Roman", Times, serif; /* Police Times New Roman */
        }
        .navbar-nav .nav-link:hover {
            background-color: #191970; /* Couleur de fond au survol */
        }
        .content {
            margin-left: 220px; /* Marge à gauche pour laisser de l'espace au navbar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar vertical -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="navbar-logo text-center">
                <!-- Ajoutez votre code de logo ici -->
               
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    style="color:white;font-size:30px;font-family:Times New Roman;text-decoration: none">
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    &ensp;&ensp;{{ __('GESTION DE PARC AUTOMOBILE') }}
                    </x-nav-link>
                </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-2x text-white"></i> <!-- Icône du bouton du toggle -->
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav flex-column"><br><br><br><br> <!-- Ajout de la classe flex-column -->
                    <li class="nav-item">
                        <a class="nav-link" href="/vehicles">Cars</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link" href="/drivers">Drivers</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link" href="/locations">Locations</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tarification</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Contenu principal -->
<div class="content">
    <div class="container">
        <div class="row justify-content-between mb-3">
            <div class="col-md-6">
                <!-- Bouton "Ajouter" -->
                <a href="{{ route('drivers.create') }}" class="btn btn-primary">Ajouter un chauffeur</a>
            </div>
            <div class="col-md-6 text-end">
                <!-- Autres éléments ici si nécessaire -->
            </div>
        </div>
        <div class="row justify-content-center">
    <div class="col-md-12"> <!-- Augmentation de la largeur à col-md-12 -->
        <div class="card">
            <div class="card-header">Liste des chauffeurs</div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Utilisation de la classe table-responsive pour permettre le défilement horizontal si nécessaire -->
                    <table class="table table-bordered"> <!-- Ajout de la classe table-bordered pour bordurer la table -->
                        <thead>
                            <tr>
                            <th>#</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Date_Emission</th>
                                <th scope="col">Date_Expiration</th>
                                <th scope="col">Experience</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $driver)
                            <tr>
                            <td>{{ $driver->id }}</td>
                                <td>{{ $driver->prenom }}</td>
                                <td>{{ $driver->nom }}</td>
                                <td>{{ $driver->telephone }}</td>                       
                                <td>{{ $driver->date_emission }}</td>
                                <td>{{ $driver->date_expiration }}</td>
                                <td>{{ $driver->experience }}</td>
                                <td>{{ $driver->categorie }}</td>

                                <td>
                                    <div class="row gx-2 align-items-center">
                                        <div class="col-auto">
                                            <a href="{{ route('drivers.edit', $driver->id) }}" class="text-primary"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chauffeur ?')" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#driverModal{{ $driver->id }}"><i class="fas fa-eye"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="driverModal{{ $driver->id }}" tabindex="-1" aria-labelledby="driverModalLabel{{ $driver->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="driverModalLabel{{ $driver->id }}">Détails du chauffeur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Contenu du modal avec les détails du chauffeur -->
                                                            <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- Informations du chauffeur -->
                                                                <p>Prénom: {{ $driver->prenom }}</p>
                                                                <p>Nom: {{ $driver->nom }}</p>
                                                                <p>Téléphone: {{ $driver->telephone }}</p>
                                                                <p>Date d'émission: {{ $driver->date_emission }}</p>
                                                                <p>Date d'expiration: {{ $driver->date_expiration }}</p>
                                                                <p>Expérience: {{ $driver->experience }}</p>
                                                                <p>Categorie: {{ $driver->categorie}}</p>
                                                                <!-- Ajoutez d'autres informations si nécessaire -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <!-- Image du chauffeur -->
                                                                <img src="{{asset('storage/images/conducteur.jpg') }}" alt="image" class="img-fluid">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary">Choisir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
