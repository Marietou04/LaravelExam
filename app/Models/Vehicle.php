<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['date_achat', 'km_defaut','type', 'matricule', 'status',];

    public function driver() {
        return $this->belongsTo(Driver::class);
    }
}
