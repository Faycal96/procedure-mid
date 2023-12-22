<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeP001 extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;

    protected $guarded = [];

    protected $primaryKey = 'uuid';

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'demande_id', 'uuid');
    }

    public function typeConstruction()
    {
        return $this->belongsTo(TypeConstruction::class, 'type_construction_id', 'uuid');
    }

    public function usageConstruction()
    {
        return $this->belongsTo(UsageConstruction::class, 'usage_construction_id', 'uuid');
    }
}
