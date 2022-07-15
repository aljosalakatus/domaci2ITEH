<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    protected $table='sektor';
    protected $fillable=['nazivSektora'];
    use HasFactory;
}
