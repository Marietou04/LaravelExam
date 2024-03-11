<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
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
        .welcome-section {
            background-image: url('https://www.actualites-fr.com/wp-content/uploads/2019/11/flotte.jpg');
            background-size: cover;
            background-position: center;
            height: calc(100vh - 56px); /* Soustraire la hauteur de la navbar */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff; /* Texte en blanc */
            padding: 20px;
        }
        .content {
            margin-top: 56px; /* Hauteur de la navbar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar vertical -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
        
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column"><br><br><br><br>
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
    <div class="welcome-section">
        <div class="container text-center">
            <h2 style="color:white;font-size:50px;font-family:Times New Roman">Bienvenue dans notre parc automobile</h2>
            <p style="color:white;font-size:20px;font-family:Times New Roman">Découvrez notre large sélection de véhicules disponibles.</p>
        </div>
    </div>

    <div class="content">
        <!-- Votre contenu principal ici -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


</x-app-layout>
