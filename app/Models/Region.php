<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    use HasUlids;
    use \Wildside\Userstamps\Userstamps;
    protected $primaryKey = 'uuid';
   
    public $fillable = ['libelle'];
 
    /**
     * Get all of the comments for the Region
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces()
    {
        return $this->hasMany(Province::class, 'region_id', 'uuid');
    }
}
