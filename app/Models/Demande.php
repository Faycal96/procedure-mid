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

    public function typeDemande(){
        return $this->belongsTo(TypeDemande::class, 'type_demande_id', 'uuid');
    }

    public function procedure(){
        return $this->belongsTo(Procedure::class, 'procedure_id', 'uuid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }


}
