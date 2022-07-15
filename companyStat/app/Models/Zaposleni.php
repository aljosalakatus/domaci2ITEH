<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaposleni extends Model
{   
    protected $table='zaposleni';
    protected $fillable=['ime', 'prezime', 'godinaRodjenja', 'kompanijaID','sektorID'];

    use HasFactory;
}
