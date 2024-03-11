<!-- resources/views/locations/create.blade.php -->
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
// Supposons que vous ayez une liste déroulante avec l'ID "driver_id"
var driverSelect = document.getElementById('driver_id');

// Récupérez la valeur sélectionnée dans la liste déroulante
var selectedDriver = driverSelect.value;

// Parcourez les conducteurs et désactivez l'option si le permis est expiré
drivers.forEach(function(driver) {
    if (driver.id == selectedDriver && driver.date_expiration < currentDate) {
        // Trouvez l'option correspondant à ce conducteur et désactivez-la
        var option = driverSelect.querySelector('option[value="' + driver.id + '"]');
        option.disabled = true;
    }
});


    </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter une location</div>

                <div class="card-body">
                       

                        <form method="POST" action="{{ route('locations.store') }}" >

                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->has('driver_id'))
                            <span class="text-danger">
                                {{ $errors->first('driver_id') }}
                            </span>
                        @endif

                        
                        <div class="form-group">
    
                            <div class="form-group">
                            <label for="vehicle_type">Véhicule</label>
                            <select class="form-control" id="vehicle_type" name="vehicle_id">
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->type }}</option>
                                @endforeach
                            </select>
                        </div>




                                <label for="driver_id">Chauffeur</label>
                                <select class="form-control" id="driver_id" name="driver_id">
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->prenom }} {{ $driver->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="client_id">Client</label>
                                <select class="form-control" id="client_id" name="client_id">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="form-group">
                                <label for="lieu_depart">Lieu de départ</label>
                                <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" required>
                            </div>

                            <div class="form-group">
                                <label for="lieu_arrive">Lieu d'arrivée</label>
                                <input type="text" class="form-control" id="lieu_arrive" name="lieu_arrive" required>
                            </div>

                            <div class="form-group">
                                <label for="heure_debut">Heure de début</label>
                                <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
                            </div>

                            <div class="form-group">
                                <label for="heure_fin">Heure de fin</label>
                                <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
                            </div>

                            <!-- Ajoutez d'autres champs nécessaires pour la création de la location -->

                            <button type="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
