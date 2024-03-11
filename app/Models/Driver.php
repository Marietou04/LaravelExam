<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['prenom', 'nom', 'telephone', 'date_emission', 'date_expiration', 'experience','categorie'];
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
   }
    //public function assignVehicle(Request $request, $driverId) {
       // $driver = Driver::find($driverId);
       // if ($driver->hasValidLicense()) {
            // Attribuer un véhicule au chauffeur
       // } else {
        //    return redirect()->back()->with('error', 'Le permis de ce chauffeur est expiré.');
        //}
    //}
}
