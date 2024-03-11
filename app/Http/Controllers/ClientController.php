<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all(); 
        return view('clients.index', compact('clients')); 
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|integer',
          
        ]);
    
        // Créer une instance de Driver et la sauvegarder
        $client = new Client();
        $client->prenom = $validatedData['prenom'];
        $client->nom = $validatedData['nom'];
        $client->email = $validatedData['email'];
        $client->adresse = $validatedData['adresse'];
        $client->telephone = $validatedData['telephone'];
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'email' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|integer',
        ]);
        $client = Client::findOrFail($id);
        $client->prenom = $validatedData['prenom'];
        $client->nom = $validatedData['nom'];
        $client->email = $validatedData['email'];
        $client->adresse = $validatedData['adresse'];
        $client->telephone = $validatedData['telephone'];
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
         return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
