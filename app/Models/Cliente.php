<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Servicio;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cd_rif', 'nombre_cliente', 'usuario','movil','fijo','email','ubicacion','observaciones','servicios_id','fecha_i', 'fecha_c', 'vencido','costo', 'torres_id', 'costo_equi','equipos_id', 'otros_equi','costo_otro_equi','ip','mac_address', 'users_id'];

    //Relacion de uno a muchos inversa
    public function users(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicios_id');
    }



}
