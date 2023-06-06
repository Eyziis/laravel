<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;

    protected $table ='locataires';

    public function logement(){
        return $this->belongsTo(Logement::class);
    }

}
