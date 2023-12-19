<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use \Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class TypeConstruction extends Model
{
    use HasFactory;
    //use UsesUuid;
    use HasUlids;
    use Userstamps;
    protected $guarded = [];
    protected $primaryKey = 'uuid';
}
