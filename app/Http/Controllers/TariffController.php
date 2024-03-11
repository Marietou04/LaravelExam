<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use App\Http\Requests\StoreTariffRequest;
use App\Http\Requests\UpdateTariffRequest;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;


class TariffController extends Controller
{
    
    public function index()
    {
    $tariffs = Tariff::all();
    return view('tariffs.index', ['tariffs' => $tariffs]);
    }

   
    public function create()
    {
        return view('tariffs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'montant' => 'required',
            'date_paiement' => 'required',
            'moyen_paiement' => 'required',
            'facture' => 'required',
           
        ]);

        $tariff = new Tariff();
        $tariff->montant = $validatedData['montant'];
        $tariff->date_paiement = $validatedData['date_paiement'];
        $tariff->moyen_paiement = $validatedData['moyen_paiement'];
        $tariff->facture = $validatedData['facture'];
        $tariff->save();
        return redirect()->route('tariffs.index')->with('success', 'Tariff créé avec succès');
    }

    public function edit(Tariff $tariff)
    {
        return view('tariffs.edit', compact('tariff'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'montant' => 'required',
            'date_paiement' => 'required',
            'moyen_paiement' => 'required',
            'facture' => 'required',
          
        ]);
    
        $tariff = Tariff::findOrFail($id);
        $tariff->montant = $validatedData['montant'];
        $tariff->date_paiement = $validatedData['date_paiement'];
        $tariff->moyen_paiement = $validatedData['moyen_paiement'];
        $tariff->facture = $validatedData['facture'];
        $tariff->save();
        return redirect()->route('tariffs.index')->with('success', 'Tariff mis à jour avec succès.');
    }

  
    public function destroy(Tariff $tariff)
    {
        $tariff->delete();

        return redirect()->route('tariffs.index')
            ->with('success', 'Tariff supprimé avec succès.');
    }

    public function generateInvoicePDF(Tariff $tariff)
{
    // Récupérer les données du tarif
    $data = [
        'tariff' => $tariff,
    ];

    // Créer une instance de Dompdf avec les options par défaut
    $dompdf = new Dompdf();

    // Charger la vue de la facture avec les données
    $html = view('tariffs.invoice', $data)->render();

    // Charger le HTML dans Dompdf
    $dompdf->loadHtml($html);

    // (Optionnel) Définir les options de Dompdf, par exemple la taille du papier
    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $dompdf->setOptions($options);

    // Rendre le PDF
    $dompdf->render();

    // Envoyer le PDF en réponse
    return $dompdf->stream('facture.pdf');
}
}
