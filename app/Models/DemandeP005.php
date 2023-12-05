<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeP005 extends Demande
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $guarded = [];protected $primaryKey = 'uuid';

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

      //   Function recuperation des status demandes
      public function statut()
      {
          return $this->belongsTo(StatutDemande::class, 'etat');
      }

        //recuperation de localite de demandeur
    public function localite()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }
    public function demandePiece()
    {
        return $this->hasMany(DemandePieceP005::class, 'demande_p005_id');
    }

    public function demandeCommentaire()
    {
        return $this->hasMany(CommentaireP005::class, 'demande_p005_id');
    }
}
