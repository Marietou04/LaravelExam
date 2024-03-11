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
                <div class="card-header">Ajouter un chauffeur</div>

                <div class="card-body">
                <form method="POST" action="{{ route('drivers.store') }}" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required>
                        </div>

                       

                        
                        <div class="form-group">
                            <label for="date_emission">Date Emission</label>
                            <input id="date_emission" type="date" class="form-control" name="date_emission" value="{{ old('date_emission') }}" required>
                        </div>


                        <div class="form-group">
                            <label for="date_expiration">Date Expiration</label>
                            <input id="date_expiration" type="date" class="form-control" name="date_expiration" value="{{ old('date_expiration') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input id="experience" type="text" class="form-control" name="experience" value="{{ old('experience') }}" required>
                        </div>
                
                        <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <select id="categorie" class="form-control" name="categorie" required>
                            <option value="A" {{ old('categorie') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('categorie') == 'B' ? 'selected' : '' }}>B</option>
                         
                        </select>
                    </div>

                        <!-- Ajoutez d'autres champs selon vos besoins -->

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
