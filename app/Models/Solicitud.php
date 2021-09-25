<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Solicitud extends Model
{
    use HasFactory;

	protected $fillable = [
	        'cd_rif', 'nombre_solicitante', 'movil','fijo','email','slug','ubicacion','observaciones','antena','estado','users_id',
	    ];

	//Constante para los estados
    const PENDIENTE = 'pendiente';
    const FACTIBLE = 'factible';
    const NO_FACTIBLE = 'no_factible';

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'cd_rif', 'cd_rif');
    }

}
