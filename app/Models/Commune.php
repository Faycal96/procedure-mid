<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
    public $fillable = ['libelle', 'province_id','statut'];

    public function provinces(){
        return $this->belongsTo(Province::class, "province_id", "uuid");
    }
}
