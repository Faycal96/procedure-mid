<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//class DemandeP002  extends Demande
class DemandeP002 extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;

    //protected $table = 'demandes';

    protected $guarded = [];

    protected $primaryKey = 'uuid';

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id', 'uuid');
    }

    public function usager()
    {
        return $this->belongsTo(Usager::class, 'usager_id', 'uuid');
    }

    public function activitesDemandeP002()
    {
        return $this->hasMany(activiteDemandeP002::class, 'demande_p002_id', 'uuid');
    }
}
