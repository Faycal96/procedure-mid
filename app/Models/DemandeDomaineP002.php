<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class DemandeDomaineP002 extends Model
{
    use HasFactory;
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $guarded = [];
    protected $primaryKey = 'uuid';
}
