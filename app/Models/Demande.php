<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];protected $primaryKey = 'uuid';
    protected $with = ['demandePiece'];

    public function categorie(){
        return $this->belongsTo(CategorieDemande::class, 'categorie_id', 'uuid');
    }
    public function usager(){
        return $this->belongsTo(Usager::class, 'usager_id', 'uuid');
    }
    public function demandePiece()
    {
        return $this->hasMany(DemandePiece::class, 'demande_p002_id');
    }

    public function demandeCommentaire()
    {
        return $this->hasMany(Commentaire::class, 'demande_p002_id');
    }
    //   Function recuperation des status demandes
    public function statut()
    {
        return $this->belongsTo(StatutDemande::class, 'etat');
    }

    public function localite(){
        return $this->belongsTo(Commune::class, 'commune_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'last_agent_assign');
    }
   
    public function typeDemande(){
        return $this->belongsTo(TypeDemande::class, 'type_demande_id', 'uuid');
    }

    public function procedure(){
        return $this->belongsTo(Procedure::class, 'procedure_id', 'uuid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function demandeP001(){
        return $this->hasOne(DemandeP001::class);
    }

    public function demandeP002(){
        return $this->hasOne(DemandeP002::class);
    }

    public function scopeDemande($query)
    {
        return $query
                ->when($this->procedure->code === "P001",function($q){
                    return $q->with('demandeP001');
                },function($q){
                    return $q->with('demandeP002');
                });
    } 

}
