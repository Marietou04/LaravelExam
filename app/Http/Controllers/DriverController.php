<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all(); // Récupérer tous les chauffeurs depuis le modèle Driver
        return view('drivers.index', compact('drivers')); // Passer les chauffeurs à la vue
    }
    

    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'telephone' => 'required|integer',
            'date_emission' => 'required|date',
            'date_expiration' => 'required|date',
            'experience' => 'required|string',
            'categorie' => 'required|in:A,B',
           
        ]);

        $driver = new Driver();
        $driver->prenom = $validatedData['prenom'];
        $driver->nom = $validatedData['nom'];
        $driver->telephone = $validatedData['telephone'];
      
        $driver->date_emission = $validatedData['date_emission'];
        $driver->date_expiration = $validatedData['date_expiration'];
        $driver->experience = $validatedData['experience'];
        $driver->categorie = $validatedData['categorie'];
        $driver->save();
        return redirect()->route('drivers.index')->with('success', 'Chauffeur créé avec succès');
    }
    

    
    
    
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }
    
    
        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'prenom' => 'required|string',
                'nom' => 'required|string',
                'telephone' => 'required|integer',
                'num_permis' => 'required|integer',
                'date_emission' => 'required|date',
                'date_expiration' => 'required|date',
                'experience' => 'required|string',
                'categorie' => 'required|in:A,B',
                 // Rendre l'image facultative lors de la mise à jour
            ]);
        
            $driver = Driver::findOrFail($id);
            $driver->prenom = $validatedData['prenom'];
            $driver->nom = $validatedData['nom'];
            $driver->telephone = $validatedData['telephone'];
       
            $driver->date_emission = $validatedData['date_emission'];
            $driver->date_expiration = $validatedData['date_expiration'];
            $driver->experience= $validatedData['experience'];
            $driver->categorie = $validatedData['categorie'];
        
                    
        
            $driver->save();
        
            return redirect()->route('drivers.index')->with('success', 'Chauffeur mis à jour avec succès.');
        }
        
        
    
    
        public function destroy(Driver $driver)
        {
            $driver->delete();
    
            return redirect()->route('drivers.index')->with('success', 'Chauffeur supprimé avec succès.');
        }
        public function assignVehicle(Request $request, $driverId) {
            $driver = Driver::find($driverId);
            if ($driver->hasValidLicense()) {
                // Attribuer un véhicule au chauffeur
            } else {
                return redirect()->back()->with('error', 'Le permis de ce chauffeur est expiré.');
            }
        }
        
}
