<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles);
    }

    public function create()
    {
        $drivers = Driver::all();
        $vehicle = new Vehicle(); // Créez une nouvelle instance de véhicule
        return view('vehicles.create', compact('drivers', 'vehicle'));
        
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'date_achat' => 'required|date',
        'km_defaut' => 'required|integer',
        'type' => 'required|in:taxi,mini_bus,camion,calando',
        'matricule' => 'required|string',
        'driver_id' => 'nullable|exists:drivers,id', // Vérifie si le driver_id existe dans la table drivers
        'status' => 'nullable|in:disponible,en panne,en service',
        
    ]);
  
    
    $vehicle = new Vehicle();
    $vehicle->date_achat = $validatedData['date_achat'];
    $vehicle->km_defaut = $validatedData['km_defaut'];
    $vehicle->type = $validatedData['type'];
    $vehicle->matricule = $validatedData['matricule'];
    $vehicle->driver_id = $validatedData['driver_id'];
    $vehicle->status = $validatedData['status'];
    $vehicle->save();
    return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully');
}



public function edit($id)
{
    $vehicle = Vehicle::findOrFail($id); // Récupérer le véhicule à éditer
    $drivers = Driver::all(); // Récupérer la liste des chauffeurs
    return view('vehicles.edit', compact('vehicle', 'drivers')); // Passer les données à la vue
}

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'date_achat' => 'required|date',
        'km_defaut' => 'required|integer',
        'type' => 'required|in:taxi,mini_bus,camion,calando',
        'matricule' => 'required|string|max:255',
        'status' => 'required|in:disponible,en panne,en service',
      
    ]);
    
    $vehicle = Vehicle::findOrFail($id);
    $vehicle->date_achat = $validatedData['date_achat'];
    $vehicle->km_defaut = $validatedData['km_defaut'];
    $vehicle->type = $validatedData['type'];
    $vehicle->matricule = $validatedData['matricule'];
    $vehicle->driver_id= $request->driver_id;
    $vehicle->status = $validatedData['status'];

    $vehicle->save();
    return redirect()->route('vehicles.index')->with('success', 'Véhicule mis à jour avec succès.');
}


    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Véhicule supprimé avec succès.');
    }
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:disponible,en panne,en service',
    ]);

    $vehicle = Vehicle::findOrFail($id);
    $vehicle->status = $request->status;
    $vehicle->save();

    return redirect()->back()->with('success', 'Statut du véhicule mis à jour avec succès.');
}
}
