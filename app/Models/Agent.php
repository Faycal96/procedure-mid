<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    use \App\Http\Traits\UsesUuid;
    protected $primaryKey = 'uuid';
    protected $guarded = [];



    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

}


