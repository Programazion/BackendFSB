<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Converge extends Model
{
    use HasFactory;

    protected $table = "converges";
    protected $primaryKey = "id";
    protected $fillable =["Nombre","Rol","Edad"];
}