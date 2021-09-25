<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Solicitud;
use App\Models\Servicio;
use App\Models\Antena;
use App\Models\Torre;
use App\Models\Equipo;
use App\Models\Enlace;
use App\Models\Cliente;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];



    public function adminlte_image(){
        return Auth::user()->profile_photo_url;
    }    


    public function adminlte_desc(){
        return 'Administrador';
    }    

    public function adminlte_profile_url(){
        return 'user/profile';
    }

    //Relacion uno a muchos
    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }
    
    //Relacion uno a muchos
    public function servicio(){
        return $this->hasMany(Servicio::class);
    }

    //Relacion uno a muchos
    public function antena(){
        return $this->hasMany(Antena::class);
    }

    //Relacion uno a muchos
    public function torre(){
        return $this->hasMany(Torre::class);
    }

    //Relacion uno a muchos
    public function equipo(){
        return $this->hasMany(Equipo::class);
    }
    //Relacion uno a muchos
    public function enlace(){
        return $this->hasMany(Enlace::class);
    }

    //Relacion uno a muchos
    public function clientes(){
        return $this->hasMany(Cliente::class, 'users_id');
    }



}
