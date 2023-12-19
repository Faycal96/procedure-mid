<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usager extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    // protected $guarded = [];

    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $primaryKey = 'uuid';
    // ...


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'nom_entreprise',
        'ifu',
        'rccm',
        'boite_postale',
        'siege_social'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    // protected $keyType = 'string';
    // public $incrementing = false;
    // protected $primaryKey = 'uuid';
    // ...

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    public function communeResidence(){
        return $this->belongsTo(Commune::class, 'commune_residence', 'uuid');
    }

    public function typeUsager(){
        return $this->belongsTo(TypeUsager::class, 'type_usager_id', 'uuid');
    }

    public function typeIdentite(){
        return $this->belongsTo(TypeIdentite::class, 'type_identite_id', 'uuid');
    }

    public function communeOrigine(){
        return $this->belongsTo(Commune::class, 'commune_origine', 'uuid');
    }

    public function demande()
    {
        return $this->hasMany(DemandeP001::class, 'demande_p001_id');
    }



    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }

}
