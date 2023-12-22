<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    use HasFactory;
    use \Wildside\Userstamps\Userstamps;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;

    protected $guarded = [];
    protected $primaryKey = 'uuid';

    public function user()
    {
        return $this->hasOne(User::class,'uuid','user_id');
    }


    public function usager(){
        return $this->belongsTo(Usager::class, 'usager_id', 'uuid');
    }
}
