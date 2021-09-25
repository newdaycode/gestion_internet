<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\torre;

class Antena extends Model
{
    use HasFactory;

	protected $fillable = [
	        'modelo', 'tipo', 'polarizacion','ganancia','users_id',
	    ];

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos
    public function torre(){
        return $this->hasMany(Torre::class);
    }

}
