<!-- resources/views/vehicles/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des véhicules</title>
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
                        <a class="nav-link" href="clients">Clients</a>
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
                <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Ajouter un véhicule</a>
            </div>
            <div class="col-md-6 text-end">
                <!-- Autres éléments ici si nécessaire -->
            </div>
        </div>
        <div class="row justify-content-center">
    <div class="col-md-12"> <!-- Augmentation de la largeur à col-md-12 -->
        <div class="card">
            <div class="card-header">Liste des véhicules</div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Utilisation de la classe table-responsive pour permettre le défilement horizontal si nécessaire -->
                    <table class="table table-bordered"> <!-- Ajout de la classe table-bordered pour bordurer la table -->
                        <thead>
                            <tr>
                            <th>#</th>
                                <th scope="col">Date d'achat</th>
                                <th scope="col">Km/defaut</th>
                                <th scope="col">Type</th>
                                <th scope="col">Matricule</th>
                                <th scope="col">Conducteur</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->date_achat }}</td>
                                <td>{{ $vehicle->km_defaut }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->matricule }}</td>
                                <td>
                                <p>{{ $vehicle->driver->prenom }}
                                {{ $vehicle->driver->nom }}
                                 </p>
                              
                            </td>
                                
                            <td>
                            <!-- Formulaire pour mettre à jour l'état du véhicule -->
                            <form action="{{ route('vehicles.updateStatus', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="disponible" {{ $vehicle->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="en panne" {{ $vehicle->status == 'en panne' ? 'selected' : '' }}>En panne</option>
                                    <option value="en service" {{ $vehicle->status == 'en service' ? 'selected' : '' }}>En service</option>
                                </select>
                            </form>
                        </td>
                                <td>
                                    <div class="row gx-2 align-items-center">
                                        <div class="col-auto">
                                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="text-primary"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#vehicleModal{{ $vehicle->id }}"><i class="fas fa-eye"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="vehicleModal{{ $vehicle->id }}" tabindex="-1" aria-labelledby="vehicleModalLabel{{ $vehicle->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicleModalLabel{{ $vehicle->id }}">Détails du véhicule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <!-- Informations du véhicule -->
            <p>Date d'achat: {{ $vehicle->date_achat }}</p>
            <p>Kilométrage par défaut: {{ $vehicle->km_defaut }}</p>
            <p>Type: {{ $vehicle->type }}</p>
            <p>Matricule: {{ $vehicle->matricule }}</p>
            <p>Conducteur: {{ $vehicle->driver->prenom }} {{ $vehicle->driver->nom }}</p>
            <p>Statut: {{ $vehicle->status }}</p>
           
            <!-- Ajoutez d'autres informations si nécessaire -->
        </div>
        <div class="col-md-6">
            <!-- Image du véhicule -->
            <img src="{{asset('storage/images/OIP.jpg') }}" alt="image" class="img-fluid" >
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary">Réserver</button>
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
