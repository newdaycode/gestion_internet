<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Antena;

class Torre extends Model
{
    use HasFactory;

    protected $fillable = [
	        'ssid', 'acceso', 'capacidad','frecuencia','lugar','observacion','ip','mac_address','antenas_id','users_id',
	    ];

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos inversa
    public function antena(){
    	return $this->belongsTo(Antena::class);
    }




}
