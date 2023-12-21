<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePieceP002 extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    use \Wildside\Userstamps\Userstamps;
    protected $guarded = [];
    protected $primaryKey = 'uuid';

    public function Demande(){
        return $this->belongsTo(DemandeP002::class, 'demande_p002_id', 'uuid');
        
    }

    public function pieceJointe(){
        return $this->belongsTo(PieceJointe::class, 'piece_jointe_id', 'uuid');
    }
    
}
