<!-- resources/views/vehicles/create.blade.php -->
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body><br><br>
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un client</div>

                <div class="card-body">
                <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input id="adresse" type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required>
                        </div>

                        
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required>
                        </div><br>


                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
