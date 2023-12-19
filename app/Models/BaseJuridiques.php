<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseJuridiques extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $guarded = [];
    protected $primaryKey = 'uuid';

    public function procedure(){
        return $this->belongsToMany(Procedure::class, 'procedure_base_juridiques', 'base_juridique_id', 'procedure_id');
    }

}
