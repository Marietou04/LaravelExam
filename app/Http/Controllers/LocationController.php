<?php

namespace App\Http\Controllers;

use id;
use App\Models\Client;
use App\Models\Vehicle;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        // Récupérer tous les types distincts de véhicules
        $types = Vehicle::distinct()->pluck('type');
    
        // Autres données nécessaires
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $clients = Client::all();
        return view('locations.create', compact('types', 'vehicles', 'drivers', 'clients'));
    }
   
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'lieu_depart' => 'required',
            'lieu_arrive' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'driver_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $driver = Driver::findOrFail($value);
                    if ($driver->date_expiration < now()) {
                        $fail('La date d\'expiration du permis de ce conducteur est dépassée.');
                    }
                },
            ],
        ]);
    
        // Vérification de la disponibilité des heures de début et de fin
        $conflictingLocation = Location::where(function($query) use ($request) {
            $query->where('heure_debut', '<', $request->heure_fin)
                  ->where('heure_fin', '>', $request->heure_debut);
        })->first();
    
        // Collecte de toutes les erreurs
        $errors = $validator->errors()->all();
    
        // Si une location conflictuelle est trouvée, ajoutez l'erreur à la liste des erreurs
        if ($conflictingLocation) {
            $errors[] = 'Les heures sélectionnées sont déjà attribuées à une autre location. Veuillez choisir des heures différentes.';
        }
    
        // Logique pour vérifier la correspondance entre la catégorie du conducteur et le type de véhicule
        $driver = Driver::findOrFail($request->driver_id);
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
    
        if (($driver->categorie != 'A' || !in_array($vehicle->type, ['taxi', 'mini_bus'])) &&
            ($driver->categorie != 'B' || !in_array($vehicle->type, ['camion', 'calando']))) {
            $errors[] = 'Le chauffeur sélectionné n\'est pas autorisé à conduire ce type de véhicule.';
        }
    
        // Si des erreurs ont été trouvées, retournez en arrière avec les erreurs
        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }
    
        // Création de la location
        Location::create($request->all());
    
        return redirect()->route('locations.index')->with('success', 'Location créée avec succès.');
    }
    
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'client_id' => 'required',
            'date' => 'required',
            'lieu_depart' => 'required',
            'lieu_arrive' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Location mise à jour avec succès.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Location supprimée avec succès.');
    }
}
