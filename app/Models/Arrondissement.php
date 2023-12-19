<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'commune_id'];
    public function commune(){
        return $this->belongsTo(Commune::class, 'commune_id', 'uuid');
    }
}
