<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{   
    protected $table='kompanija';
    protected $fillable=['nazivKompanije'];
    
    use HasFactory;
}
