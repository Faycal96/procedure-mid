<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ActiviteDemandeP002 extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use Userstamps;
    protected $primaryKey = 'uuid';
    protected $guarded = [];
}
