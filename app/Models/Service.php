<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
    protected $guarded = [];

    public function structure(){
        return $this->belongsTo(Structure::class, 'structure_id','uuid',);
    }



}
