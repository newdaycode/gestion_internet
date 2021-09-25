<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cliente;

class Servicio extends Model
{
    use HasFactory;

	protected $fillable = [
	        'plan', 'megas', 'descripcion','monto','users_id',
	    ];

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos
    public function cliente(){
        return $this->hasMany(Cliente::class, 'servicios_id');
    }

}
