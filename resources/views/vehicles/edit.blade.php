<!-- resources/views/vehicles/edit.blade.php -->
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le véhicule</div>

                <div class="card-body">
                <form method="POST" action="{{ route('vehicles.update', ['vehicle' => $vehicle->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="date_achat">Date d'achat</label>
                            <input id="date_achat" type="date" class="form-control" name="date_achat" value="{{ $vehicle->date_achat }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="km_defaut">Kilométrage par défaut</label>
                            <input id="km_defaut" type="number" class="form-control" name="km_defaut" value="{{ $vehicle->km_defaut }}" required>
                        </div>

                        <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" class="form-control" name="type" required>
                            <option value="taxi" {{ old('type') == 'taxi' ? 'selected' : '' }}>Taxi</option>
                            <option value="mini_bus" {{ old('type') == 'mini_bus' ? 'selected' : '' }}>Mini Bus</option>
                            <option value="camion" {{ old('type') == 'camion' ? 'selected' : '' }}>Camion</option>
                            <option value="calando" {{ old('type') == 'calando' ? 'selected' : '' }}>Calando</option>
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="matricule">Matricule</label>
                            <input id="matricule" type="text" class="form-control" name="matricule" value="{{ $vehicle->matricule }}" required>
                        </div>

                        <div class="form-group">
                    <label for="driver_id">Choisir un Chauffeur</label>
                    <select class="form-control" id="driver_id" name="driver_id">
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->prenom }} {{ $driver->nom }}</option>
                        @endforeach
                    </select>
                </div><br>

                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select id="status" class="form-control" name="status" required>
                                <option value="disponible" {{ $vehicle->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="en panne" {{ $vehicle->status == 'en panne' ? 'selected' : '' }}>En panne</option>
                                <option value="en service" {{ $vehicle->status == 'en service' ? 'selected' : '' }}>En service</option>
                            </select>
                        </div>

                       <br>

                        <!-- Ajoutez d'autres champs selon vos besoins -->

                        <button type="submit" class="btn btn-primary">
                            Enregistrer les modifications
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
