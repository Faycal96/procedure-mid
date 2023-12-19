<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
    protected $guarded = [];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function province(){
        return $this->belongsTo(Province::class, 'province_id');
    }
}


