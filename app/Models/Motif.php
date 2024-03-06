<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
    protected $guarded = [];

    public function demande(){
        return $this->belongsToMany(Demande::class,  'motif_demandes',  'motif_id', 'demande_id',)->withPivot("commentaire");;
    }
}


