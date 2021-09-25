<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['tipo','modelo','frecuencia','descripcion','observacion','puerto','users_id'];

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }

}
