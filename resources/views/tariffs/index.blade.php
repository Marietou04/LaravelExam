<!-- resources/views/vehicles/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des tariffs</title>
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
                        <a class="nav-link" href="/tariffs">Tarification</a>
                    </li><br>
                    <li class="nav-item">
                        <a class="nav-link" href="/clients">Clients</a>
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
                <a href="{{ route('tariffs.create') }}" class="btn btn-primary">Ajouter une tariff</a>
            </div>
            <div class="col-md-6 text-end">
                <!-- Autres éléments ici si nécessaire -->
            </div>
        </div>
        <div class="row justify-content-center">
    <div class="col-md-12"> <!-- Augmentation de la largeur à col-md-12 -->
        <div class="card">
            <div class="card-header">Liste des tariffs</div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Utilisation de la classe table-responsive pour permettre le défilement horizontal si nécessaire -->
                    <table class="table table-bordered"> <!-- Ajout de la classe table-bordered pour bordurer la table -->
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Montant</th>
                            <th>Date_paiement</th>
                            <th>Moyen_paiement</th>
                            <th>Facture</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tariffs as $tariff)
                            <tr>
                            <td>{{ $tariff->id }}</td>
                            <td>{{ $tariff->montant }}</td>
                            <td>{{ $tariff->date_paiement }}</td>
                            <td>{{ $tariff->moyen_paiement}}</td>
                            <td> 
                             <a href="{{ route('tariffs.invoice', $tariff->id) }}" class="btn btn-link">Facture</a>
                           </td>
                                <td>
                                    <div class="row gx-2 align-items-center">
                                        <div class="col-auto">
                                            <a href="{{ route('tariffs.edit', $tariff->id) }}" class="text-primary"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-auto">
                                            <form action="{{ route('tariffs.destroy', $tariff->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tariff ?')" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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
