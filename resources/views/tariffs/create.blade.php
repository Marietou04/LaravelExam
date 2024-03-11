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
              

                <div class="card-body">
                <form method="POST" action="{{ route('tariffs.store') }}" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="form-group">
                            <label for="montant">Montant</label>
                            <input id="montant" type="text" class="form-control" name="montant" value="{{ old('montant') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="date_paiement">Date paiement</label>
                            <input id="date_paiement" type="date" class="form-control" name="date_paiement" value="{{ old('date_paiement') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="moyen_paiement">Moyen paiement</label>
                            <input id="moyen_paiement" type="text" class="form-control" name="moyen_paiement" value="{{ old('moyen_paiement') }}" required>
                        </div>
   
                        <div class="form-group">
                            <label for="facture">Facture</label>
                            <input id="facture" type="facture" class="form-control" name="facture" value="{{ old('facture') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Payer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
