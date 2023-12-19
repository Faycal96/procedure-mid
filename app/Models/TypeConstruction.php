<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class TypeConstruction extends Model
{
    use HasFactory;
    use UsesUuid;
    use Userstamps;
}
