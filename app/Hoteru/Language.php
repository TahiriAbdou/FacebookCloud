<?php 

namespace Hoteru;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['name', 'locale', 'native'];
    
    public $timestamps = false;

    public function scopeActiveLanguages($query)
    {
        return $query->where('is_active', true);
    }
}
