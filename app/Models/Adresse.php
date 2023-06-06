<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $table ='adresses';
    protected $primaryKey ='id';


    public function logement(){
        return $this->BelongsTo(Logement::class);
    }

    public function adresseComplete(){
        return $this->rue.', '.$this->numero.' '.$this->codePostal.' '.$this->ville;
    }

}
