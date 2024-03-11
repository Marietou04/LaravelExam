<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        /* Styles CSS pour la facture */
    </style>
</head>
<body>
    <h1>Facture</h1>
    <p>Montant : {{ $tariff->montant }}</p>
    <p>Date de Paiement : {{ $tariff->date_paiement }}</p>
    <p>Moyen de Paiement : {{ $tariff->moyen_paiement }}</p>

    <!-- Autres détails de la facture -->
</body>
</html>
