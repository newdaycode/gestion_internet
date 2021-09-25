<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Enlace extends Model
{
    use HasFactory;

    protected $fillable = ['ssid','equipo','frecuencia','ip','mac_address','lugar','observacion','modo','users_id'];

    //Relacion de uno a muchos inversa
    public function user(){
    	return $this->belongsTo(User::class);
    }


}
