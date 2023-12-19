<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DemandeP002  extends Demande
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $guarded = [];
    protected $primaryKey = 'uuid';
    protected $with = ['demandePiece'];

    function genererRandomString($longueur = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $longueur; $i++) {
            $index = mt_rand(0, strlen($caracteres) - 1);
            $randomString .= $caracteres[$index];
        }

        return $randomString;
    }

   public function usager(){
        return $this->belongsTo(Usager::class, 'usager_id', 'uuid');
    }
    public function demandePiece()
    {
        return $this->hasMany(DemandePieceP002::class, 'demande_p002_id');
    }

    public function demandeCommentaire()
    {
        return $this->hasMany(CommentaireP002::class, 'demande_p002_id');
    }
    //   Function recuperation des status demandes
    public function statut()
    {
        return $this->belongsTo(StatutDemande::class, 'etat');
    }
        //recuperation de localite de demandeur
        //recuperation de localite de demandeur
    public function localite(){
        return $this->belongsTo(Commune::class, 'commune_id');
    }

    // recuperation de l'agent affecté sur le dossier
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'last_agent_assign');
    }
}
