<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use HasFactory;

    protected $table = 'logements';
    protected $primaryKey = 'id';

    public function adresse()
    {
        return $this->hasOne(Adresse::class);
    }

    public function locataire()
    {
        return $this->hasOne(Locataire::class);
    }

}
